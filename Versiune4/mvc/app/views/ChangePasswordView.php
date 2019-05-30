<?php

class ChangePasswordView
{
	public function output(User $user = null)
	{
		$outputString='
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <title>YoMovie</title>
        <link rel="stylesheet" type="text/css" href="ChangePassword.css">
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



          <h2>Change Password</h2>

          <form action="" method="POST">
            <label for="passCode"><span id="passwordCode"><i class="fas fa-biohazard"></i>Enter your password code:<br/></span></label>
            <input type="password" placeholder="Password code from email" id="passCode" name="generatedCode" required>  <br/><br/>
            
            
            <label for="newPass"><span id="newPassword"><i class="fas fa-chess-king"></i>New password:<br/> </span></label>
            <input type="password" placeholder="New password" id="newPass" name="password" required><br/><br/>
  
            <label for="confPass"><span id="confirmPassword"><i class="fas fa-check"></i>Confirm your password:<br/> </span></label>
            <input type="password" placeholder="Confirm new password" id="confPass" name="confirmPassword" required><br/><br/>
            
            <button type="submit" class="btn"><i class="fas fa-glass-cheers"></i>Change password</button>
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