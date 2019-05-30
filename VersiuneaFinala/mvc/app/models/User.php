<?php


class User {
	public $username;
	public $password;
	public $email;
	public $birthday;
	public $passwordCode;

	private $pdo;



    private $submitted = false;


        public function __construct($pdo, $username=null, $password=null, $email=null, $birthday=null) {
        $this->pdo=$pdo;  
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
        $this->birthday=$birthday;

    }



    public function verifyLogin()
    {


    	$username=$this->username;

    	$password=$this->password;

    	$stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE user_name = :username AND user_password= :password');
        $stmt->execute(['username' => $username, 'password' => $password]);
        $record = $stmt->fetch();

        return $record['COUNT(*)'];
    }

    public function executeRegister()
    {

       $username=$this->username;
       $password=$this->password;
       $email=$this->email;

       $time = strtotime($this->birthday);

       $newformat = date('Y-m-d',$time);

       echo $newformat;
       echo '<br>';

       try
       {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE user_name = :username OR user_mail = :user_mail ');
        $stmt->execute(['username' => $this->username,'user_mail' => $this->email]);
        $record = $stmt->fetch();
        $confirmation = $record['COUNT(*)'];
        if($confirmation > 0)
          return 0;


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

        $generatedCode = User::generateRandomString();


        $generatedCode = wordwrap($generatedCode,70);

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


?>