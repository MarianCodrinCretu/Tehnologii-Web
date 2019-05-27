<?php

//require_once('../models/User.php');

//session_start();

class UploadController extends Controller
{
	//public $model;
	//public function __construct()


	public function alpha($pdo, $name='')
	{
         //$this->view('LoginView'); 



        $movie=$this->model('Movie', $pdo);

        $this->view('UploadView');
	       $viewObject = new UploadView();
	       //echo 'a';
	       $viewObject->output($movie); 

	       

	       if(isset($_REQUEST["titlu"]))
	       {
	       	$movieName=$_REQUEST["titlu"];
	       }

	       if(isset($_REQUEST["descriere"]))
	       {
	       	$description=$_REQUEST["descriere"];
	       }

	       if(isset($_REQUEST["categorie"]))
	       {
	       	$genre=$_REQUEST["categorie"];
	       }

	       if(isset($_REQUEST["actori"]))
	       {
	       	$actors=$_REQUEST["actori"];
	       }



	       $id = $movie->insertMovie($movieName, $description);

	       if($id==0)
	       {
	       	echo 'EROARE LA INSERAREA FILMULUI';
	       	die();
	       }


	       $movie->insertGenre($id, $description);
	       /*$movie->insertDirector($id, $director);*/
	       $movie->insertActors($id, $actors);



           $urls=[];
           $questions=[];
           $answers=[];
           $parts=[];

           $pozUrls=0;
           $pozQuestions=0;
           $pozAnswers=0;
           $pozParts=0;

	       for($contor=1; $contor<=10; $contor++)
	       {

	       	$url='url'.$contor;


	       	if(isset($_REQUEST[$url]))
	       	{
	       	$urls[$pozUrls]=$_REQUEST[$url];
	       	$pozUrls++;
	       	$question='intrebare'.$contor;
	       	$scenary1='scenariu_'.$contor.'_1'; $part1='movie_parts_'.$contor.'_1';
	       	$scenary2='scenariu_'.$contor.'_2'; $part2='movie_parts_'.$contor.'_2';
	       	$scenary3='scenariu_'.$contor.'_3'; $part3='movie_parts_'.$contor.'_3';
	       	$scenary4='scenariu_'.$contor.'_4'; $part4='movie_parts_'.$contor.'_4';

	       	if(isset($_REQUEST[$question])&&isset($_REQUEST[$scenary1])&&isset($_REQUEST[$scenary2])&&isset($_REQUEST[$scenary3])&&isset($_REQUEST[$scenary4])&&isset($_REQUEST[$part1])&&isset($_REQUEST[$part2])&&isset($_REQUEST[$part3])&&isset($_REQUEST[$part4]))
	       	{
               $questions[$pozQuestions]=$_REQUEST[$question];
               $pozQuestions++;


               $answers[$pozAnswers]=$_REQUEST[$scenary1];
               $pozAnswers++;
               $answers[$pozAnswers]=$_REQUEST[$scenary2];
               $pozAnswers++;
               $answers[$pozAnswers]=$_REQUEST[$scenary3];
               $pozAnswers++;
               $answers[$pozAnswers]=$_REQUEST[$scenary4];
               $pozAnswers++;


               $vecExplode=explode("_", $_REQUEST[$part1]);
               $parts[$pozParts]=(int)$vecExplode[1];
               $pozParts++;
               $vecExplode=explode("_", $_REQUEST[$part2]);
               $parts[$pozParts]=(int)$vecExplode[1];
               $pozParts++;
               $vecExplode=explode("_", $_REQUEST[$part3]);
               $parts[$pozParts]=(int)$vecExplode[1];
               $pozParts++;
               $vecExplode=explode("_", $_REQUEST[$part4]);
               $parts[$pozParts]=(int)$vecExplode[1];
               $pozParts++;


	       	}

	       	else
	       	{
	       		echo 'NU ATI SETAT NISTE VALORI!!';
	       	}
	        }



	        
	       } // aici se termina for

        try
        {
        $movie->insertTree($urls, $questions, $answers, $parts);
    }

       catch(Exception $e)
       {
       	echo 'Eroare la apel insert tree   ';
       	echo $e->getMessage();
       }


	       /*

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
            if(!isset($_SESSION['username']))
            {
            $_SESSION['username']=$user->username;
            }
	        header("Location: http://localhost/mvc/public/");
            die();

        }

        */

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

	