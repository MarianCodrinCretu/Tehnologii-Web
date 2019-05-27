<?php

//require_once('../models/User.php');

//session_start();

class ChangePasswordController extends Controller
{
	//public $model;
	//public function __construct()



	public function alpha($pdo, $name='')
	{
         //$this->view('LoginView');

         //echo 'aici!'; 


        $user=$this->model('User', $pdo);

        $this->view('ChangePasswordView');
	       $viewObject = new ChangePasswordView();
	       //echo 'a';
	       $viewObject->output($user); 



        if((isset($_REQUEST["generatedCode"]))&&(isset($_REQUEST["password"]))&&(isset($_REQUEST["confirmPassword"])))
        {
          
        $user->password=$_REQUEST["password"];

        if($_REQUEST["confirmPassword"]!=$user->password)


        {


          echo 'NU!';
          //echo '1';
          header("Location: http://localhost/mvc/public/changePassword.php?url=ChangePasswordController/alpha/");
             /*
             header("Location: http://localhost/mvc/public/forgotPassword.php?url=ForgotPasswordController/alpha/");
             */
          die();


        }

       else if($user->getPassword($_REQUEST["generatedCode"])==0)
        {
          echo 'NU!';
          header("Location: http://localhost/mvc/public/changePassword.php?url=ChangePasswordController/alpha/");
          die();
        }

        else


        {
          echo 'DA!';
          header("Location: http://localhost/mvc/public/index.php");
          die();
        }


	}
    
	else
		echo 'Nesetat!';
        
}

}



?>

	