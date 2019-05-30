<?php

class ForgotPasswordController extends Controller
{
	public function alpha($pdo, $name='')
	{

        $user=$this->model('User', $pdo);

        $this->view('ForgotPasswordView');
	       $viewObject = new ForgotPasswordView();
	       $viewObject->output($user); 



        if((isset($_REQUEST["username"]))&&(isset($_REQUEST["email"])))
        {

        $user->username=$_REQUEST["username"];
        $user->email=$_REQUEST["email"];

        if($user->passwordForgotOK()==1)


        {

        $user->generateEmailCode();

	        header("Location: http://localhost/mvc/public/changePassword.php?url=ChangePasswordController/alpha/");
            die();

        }
        else echo "<script>alert('Invalid credentials!!')</script>";


	}
    

        
}

}



?>

	