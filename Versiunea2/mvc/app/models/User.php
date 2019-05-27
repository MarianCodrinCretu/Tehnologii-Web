<?php


class User {
	public $username;
	public $password;
	public $email;
	public $birthday;
	public $passwordCode;

	private $pdo;


    /* $submitted: Whether or not the form has been submitted */
    private $submitted = false;


        public function __construct($pdo, $username=null, $password=null, $email=null, $birthday=null) {
        $this->pdo=$pdo;  
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
        $this->birthday=$birthday;

    }

    /*

    public function initiatePDO()
    {
        $this->pdo=new Pdo('mysql:host=localhost;dbname=' . DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    */

    public function verifyLogin()
    {

       // $this->initiatePDO();
    	$username=$this->username;
       //echo $username;
    	$password=$this->password;
        //echo $password;
    	$stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE user_name = :username AND user_password= :password');
        $stmt->execute(['username' => $username, 'password' => $password]);
        $record = $stmt->fetch();
        echo $record['COUNT(*)'];
        //return new Movie($this->pdo, $this->submitted, $record);
        return $record['COUNT(*)'];
    }

    public function executeRegister()
    {
       //$this->initiatePDO();
       $username=$this->username;
       $password=$this->password;
       $email=$this->email;

       $time = strtotime($this->birthday);

       $newformat = date('Y-m-d',$time);

       echo $newformat;
       echo '<br>';

       try
       {
        $stmt = $this->pdo->prepare('INSERT INTO users (user_name, user_mail, user_password, user_birthdate) VALUES (:username, :email, :password,:newformat)');
        $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email , 'newformat' => $newformat ]);
        return 1;
       }
       catch (Exception $e)
       {
         echo($e->getMessage());
         return 0;
       }
       

    }

    public function passwordForgotOK()
    {
 
      // $this->initiatePDO();
      echo $this->username;
      echo $this->email;

        try
       {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE user_name = :username and user_mail = :user_mail ');
        $stmt->execute(['username' => $this->username,'user_mail' => $this->email]);
        $record = $stmt->fetch();
        $confirmation = $record['COUNT(*)'];
       return $confirmation;


       }
       catch (Exception $e)
       {
        die($e->getMessage());
        return 0;
       }
       

    }


    public static function generateRandomString($length = 10) 
    {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) 
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

    public function generateEmailCode()
    {
       // $this->initiatePDO();
        $generatedCode = User::generateRandomString();

        // use wordwrap() if lines are longer than 70 characters
        $generatedCode = wordwrap($generatedCode,70);

        // send email
        mail($this->email,"YoMovie Reset Password Code","Your YoMovie generated code is: ".$generatedCode);
        try
       {
        $stmt = $this->pdo->prepare('UPDATE users SET passwordCode= :generatedCode WHERE user_name = :username and user_mail = :user_mail ');
        $stmt->execute(['generatedCode' => $generatedCode, 'username' => $this->username,'user_mail' => $this->email]);

       }
       catch (Exception $e)
       {
        die($e->getMessage());
       }


    }

    public function getPassword($generatedCode)
    {
        //$this->initiatePDO();

         try
       {
           $stmt2 = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE passwordCode=:generatedCode');
        $stmt2->execute(['generatedCode' => $generatedCode]);
          $recordCount = $stmt2->fetch();
           $confirmation = $recordCount['COUNT(*)'];

        if($confirmation==1)
        {

        $stmt = $this->pdo->prepare('UPDATE users SET user_password= :password WHERE passwordCode = :generatedCode ');
        $stmt->execute(['password' => $this->password, 'generatedCode' => $generatedCode]);

       }
      
       
      
       return $confirmation;


       }
       catch (Exception $e)
       {
        die($e->getMessage());
        return 0;
       }
       

    }
}


/*
$utilizator = new User('marian2500', 'cevaparolamare');
echo($utilizator->verifyLogin());
*/
/*

$utilizator2 = new User('marian2500', 'cevaparolamare', 'cretu.marian.5000@gmail.com', '13-08-1998');
$utilizator2->executeRegister();
*/

/*
$util=new User();
//$util->passwordForgotOK('marian2500', 'cretu.marian.5000@gmail.com');
$util->generateEmailCode('marian2500', 'cretu.marian.5000@gmail.com');

*/

?>