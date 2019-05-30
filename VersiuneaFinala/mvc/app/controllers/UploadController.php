<?php


class UploadController extends Controller
{



	public function alpha($pdo, $name='')
	{




        $movie=$this->model('Movie', $pdo);

        $this->view('UploadView');
	       $viewObject = new UploadView();
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


	       if(isset($_REQUEST["director"]))
	       {
	       	$director=$_REQUEST["director"];
	       }

	       if(isset($_REQUEST["imagine"]))
	       {
	       	$image=$_REQUEST["imagine"];
	       }









           if(isset($_REQUEST["titlu"]) && $_REQUEST["descriere"] && $_REQUEST["categorie"] && $_REQUEST["actori"] && $_REQUEST["imagine"] && $_REQUEST["director"] )
	         $id = $movie->insertMovie($movieName, $image, $description, $genre);



	       if(isset($_REQUEST["titlu"]) && $_REQUEST["descriere"] && $_REQUEST["categorie"] && $_REQUEST["actori"] && $_REQUEST["imagine"] && $_REQUEST["director"])
	         $movie->insertActors($id, $actors);



	     if(isset($_REQUEST["titlu"]) && $_REQUEST["descriere"] && $_REQUEST["categorie"] && $_REQUEST["actori"] && $_REQUEST["imagine"] && $_REQUEST["director"]) 
	     	$movie->insertDirector($id, $director);




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
	       		
	       	}
	        }



	        
	       } 
        $result=$movie->insertTree($urls, $questions, $answers, $parts);

	}


}

?>

	