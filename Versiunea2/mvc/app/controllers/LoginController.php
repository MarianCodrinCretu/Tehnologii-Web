<?php

//require_once('../models/User.php');

//session_start();

class LoginController extends Controller
{
	//public $model;
	//public function __construct()


	public function alpha($pdo, $name='')
	{
         //$this->view('LoginView'); 



        $user=$this->model('User', $pdo);

        $this->view('LoginView');
	       $viewObject = new LoginView();
	       //echo 'a';
	       $viewObject->output($user); 

        if(isset($_REQUEST["username"])&&isset($_REQUEST["password"]))
        {
        $user->username=$_REQUEST["username"];
       // echo $_REQUEST["username"];
       // echo $user->name;
        $user->password=$_REQUEST["password"];
        //echo $user->password;
        //echo $_REQUEST["password"];
        if($user->verifyLogin()==1)


        {
        	//echo 'DA, ESTE!';

            session_start();
            //if(!isset($_SESSION['username']))
            //{
            $_SESSION['username']=$user->username;
            //}
	        header("Location: http://localhost/mvc/public/");
            die();

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
}

}

/*
	{
	$this->model=new User($_REQUEST['username'], $_REQUEST['password']);
	}

	public function invoke()
	{
	 include 'views/LoginView.php';
	 $result = $this->model->verifyLogin();

	 if(isset($_REQUEST['username'])&&isset($_REQUEST['password']))
	 {

	 if($result==1)
	 {
       
	   $_SESSION['username']=$_REQUEST['username'];
	   $_SESSION['password']=$_REQUEST['password'];
	   include 'views/MovieListView.php';
	 }

	 else
	 {
	 	include 'views/LoginView.php';
	 }
	}
}

}

*/

?>

	