<?php

class LoginController extends Controller
{

	public function alpha($pdo, $name='')
	{


        $user=$this->model('User', $pdo);

        $this->view('LoginView');
	       $viewObject = new LoginView();
	       $viewObject->output($user); 

        if(isset($_REQUEST["username"])&&isset($_REQUEST["password"]))
        {
        $user->username=$_REQUEST["username"];
        $user->password=$_REQUEST["password"];
        if($user->verifyLogin()==1)


        {

            session_start();

            $_SESSION["cretulino"]=$user->username;
	        header("Location: http://localhost/mvc/public/");
            die();

        }

        else echo "<script>alert('Invalid credentials!')</script>";


	   

	}
}

}

?>

	