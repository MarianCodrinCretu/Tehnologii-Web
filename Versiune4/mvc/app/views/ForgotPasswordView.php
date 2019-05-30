<?php

class ForgotPasswordView
{
	public function output(User $user = null)
	{
		$outputString='
    <!DOCTYPE html>
<html lang="en">
  <head>
    <title>YoMovie</title>
    <link rel="stylesheet" type="text/css" href="ForgotPassword.css">
  <!--  <link rel="stylesheet" media="(min-width: 640px)" href="style2.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
  <body>

  
  
<div class = "main-container">

    <div style="display: flex; justify-content: space-between; align-items: center;" class="nav-bar">
      <a href="http://localhost/mvc/public/"><div class="logo">YoMovie</div></a>
      <div class="nav-menu">
        <ul>
        <li><a href="http://localhost/mvc/public/"> Show all </a></li>
        <li><a href="https://www.imdb.com/list/ls000004615/"> Actors </a></li>
        <li><a href=""> Directors </a></li>
        <li><a href="https://media.netflix.com/en/"> News </a> </li>
      </ul>
  </div>
</div>



    <div class="movie-list">

      <div class="formular">
        <header>

          <h1>YoMovie</h1>
        </header>

        <article>



          <h2>Recover Password</h2>


          <form action="" method="POST">
            <label for="username"><span id="Username"> <i class="fas fa-user-tie"></i>Username:<br /></span></label>
            <input type="text" placeholder="Username" id="username" name="username" required> <br /><br />


            <label for="email"><span id="Email"><i class="fas fa-envelope"></i>Email:<br /> </span></label>
            <input type="email" placeholder="Email" id="email" name="email" required><br /><br />

            <button type="submit" class="btn">Confirm</button>
          </form>


        </article>


      </div>







    </div>
  </div>



</body>

</html>';

echo $outputString;

return $outputString;
	}
}

?>