<?php

class RegisterController extends Controller
{



	public function alpha($pdo, $name='')
	{


        $user=$this->model('User', $pdo);

        $this->view('RegisterView');
	       $viewObject = new RegisterView();

	       $viewObject->output($user); 

        if((isset($_REQUEST["username"]))&&(isset($_REQUEST["password"]))&&(isset($_REQUEST["passwordConfirm"]))&&(isset($_REQUEST["birthday"]))&&(isset($_REQUEST["email"])))
        {

        $user->username=$_REQUEST["username"];

        $user->password=$_REQUEST["password"];


        if($user->password != $_REQUEST["passwordConfirm"])

        {
            echo "<script>alert('Passwords do not match!!')</script>";
            
        }

        else
        { 

        $user->email=$_REQUEST["email"];
        $user->birthday=$_REQUEST["birthday"];

        if($user->executeRegister()==1)
        {
	        header("Location: http://localhost/mvc/public/");
            die();

        }

        else
        {
            echo "<script>alert('Username or email already exist!')</script>";
        }
    }

	   
	}
}

}



?>

	