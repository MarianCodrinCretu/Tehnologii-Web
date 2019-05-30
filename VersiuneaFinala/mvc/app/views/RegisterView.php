<?php

class RegisterView
{
	public function output(User $user = null)
	{
		$outputString='<!DOCTYPE HTML>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="Register.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YoMovie-Login</title>
</head>

<body>
  <div class="main-container">

    <div class="nav-bar" style="display:flex; justify-content:space-between; align-items: center;">
      <a href="http://localhost/mvc/public/"><div class="logo">YoMovie</div></a>
      <div class="nav-menu">
        <ul>
        <li><a href="http://localhost/mvc/public/"> Show all </a></li>
        <li><a href="https://www.imdb.com/list/ls000004615/"> Actors </a></li>
        <li><a href=""> Directors </a></li>
        <li><a href="https://media.netflix.com/en/"> News </a></li>
      </ul>
  </div>
</div>





<div class="movie-list">

    <div class="formular">
        <header>
          <h1>YoMovie</h1>
        </header>

        <article>
          <h2>Register</h2>

          <form style="padding-bottom: 5px;" action="" method="POST">
            Username:<br/>
            <input type="text" name="username" id="celula1"><br/><br/>
            Password:<br/>
            <input type="password" name="password" id="celula2" ><br/><br/>
            Confirm password:<br/>
            <input type="password" name="passwordConfirm" id="celula2" ><br/><br/>
            E-mail:<br/>
            <input type="email" id="celula3" name="email" ><br/><br/>
            Date of birth:<br>
            <input type="date" id="celula7" name="birthday"><br><br>
            <button type="submit" class="btn">Submit</button>
            </form>
        </article>

    </div>
</div>
</div>

</body>
</html>
';
    echo $outputString;
		return $outputString;
	}
}

?>