<?php

//require_once('../models/User.php');

//session_start();

class ForgotPasswordController extends Controller
{
	//public $model;
	//public function __construct()



	public function alpha($pdo, $name='')
	{
         //$this->view('LoginView');

         //echo 'aici!'; 

          echo 'aici!';

        $user=$this->model('User', $pdo);

        $this->view('ForgotPasswordView');
	       $viewObject = new ForgotPasswordView();
	       //echo 'a';
	       $viewObject->output($user); 



        if((isset($_REQUEST["username"]))&&(isset($_REQUEST["email"])))
        {

              echo 'aici!';

        $user->username=$_REQUEST["username"];
       // echo $_REQUEST["username"];
       // echo $user->name;
        $user->email=$_REQUEST["email"];

        if($user->passwordForgotOK()==1)


        {

        echo 'DA!';
        	//echo '1';

        $user->generateEmailCode();

	        header("Location: http://localhost/mvc/public/changePassword.php?url=ChangePasswordController/alpha/");


           
           /*
             header("Location: http://localhost/mvc/public/forgotPassword.php?url=ForgotPasswordController/alpha/");
             */
             
             echo '1';
           

            die();

        }


	}
    
	else
		echo 'Nesetat!';
        
}

}



?>

	