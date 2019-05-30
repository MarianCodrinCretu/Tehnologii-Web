<?php

class ChangePasswordController extends Controller
{

	public function alpha($pdo, $name='')
	{


        $user=$this->model('User', $pdo);

        $this->view('ChangePasswordView');
	       $viewObject = new ChangePasswordView();
	       $viewObject->output($user); 



        if((isset($_REQUEST["generatedCode"]))&&(isset($_REQUEST["password"]))&&(isset($_REQUEST["confirmPassword"])))
        {
          
        $user->password=$_REQUEST["password"];

        if($_REQUEST["confirmPassword"]!=$user->password)


        {


          echo "<script>alert('Passwords do not match!!')</script>";


        }

       else if($user->getPassword($_REQUEST["generatedCode"])==0)
        {
          echo $user->getPassword($_REQUEST["generatedCode"]);
          echo "<script>alert('Generated code is incorrect!!')</script>";
        }

        else


        {
          header("Location: http://localhost/mvc/public/index.php");
          die();
        }


	}
        
}

}



?>

	