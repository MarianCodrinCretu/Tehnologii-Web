<?php

//require_once('../models/User.php');

//session_start();

class RegisterController extends Controller
{
	//public $model;
	//public function __construct()



	public function alpha($pdo, $name='')
	{
         //$this->view('LoginView');

         //echo 'aici!'; 

        $user=$this->model('User', $pdo);

        $this->view('RegisterView');
	       $viewObject = new RegisterView();
	       //echo 'a';
	       $viewObject->output($user); 

        if((isset($_REQUEST["username"]))&&(isset($_REQUEST["password"]))&&(isset($_REQUEST["passwordConfirm"]))&&(isset($_REQUEST["birthday"]))&&(isset($_REQUEST["email"])))
        {

        $user->username=$_REQUEST["username"];
       // echo $_REQUEST["username"];
       // echo $user->name;
        $user->password=$_REQUEST["password"];
        //$user->password=$_REQUEST["passwordConfirm"];

        if($user->password != $_REQUEST["passwordConfirm"])

        {
            echo "<script>alert('Passwords do not match!!')</script>";
        	//header("Location: http://localhost/mvc/public/register.php");

            //die();
            
        }

        else
        { 

        $user->email=$_REQUEST["email"];
        $user->birthday=$_REQUEST["birthday"];

        if($user->executeRegister()==1)


        {
        	//echo '1';
	        header("Location: http://localhost/mvc/public/");
            die();

        }

        else
        {
            echo "<script>alert('Username or email already exist!')</script>";
        }
    }

        /*

        else
        {
        	echo '0';
	       $this->view('LoginView');
	       $viewObject = new LoginView();
	       //echo 'a';
	       $viewObject->output($user); 
        }
        */

	   

	}
	//else
		//echo 'Nesetat!';
}

}



?>

	