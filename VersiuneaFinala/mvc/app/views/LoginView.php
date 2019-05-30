<?php 

class LoginView
{

public function output(User $user = null)
{
$outputString = '<!DOCTYPE HTML>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="YoMovieLogin.css">
  <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <title>YoMovie-Login</title>
</head>

<body>
  <div class="main-container">

    <div style="display: flex; justify-content: space-between; align-items: center;" class="nav-bar">


      <a href="http://localhost/mvc/public/"><div class="logo">YoMovie</div></a>
      <div class="nav-menu">
        <ul>
          <li><a href="http://localhost/mvc/public/"> Show all </a></li>
          <li><a href="https://www.imdb.com/list/ls000004615/"> Actors </a></li>
          <li><a href=""> Directors </a></li>
          <li><a href="https://media.netflix.com/en/"> News </a></li>
         <!-- <li> <input type="text" placeholder="Search.."> </li> -->
        </ul>
      </div>
    </div>

    
<div class="movie-list">

    <div class="formular">
        <header>
          
          <h1>YoMovie</h1>
        </header>
        
        <article>
          
          <h2>Login</h2>
          
          
          
          
          <form action="" method="POST">
            <label for="username"><span id="Username"><i class="fas fa-user-astronaut"></i>Username:

                <br/></span></label>
            <input type="text" placeholder="Username" id="username" name="username" required>  <br/>
            
            
            <label for="password"><span id="Password"><i class="fas fa-key"></i>Password:<br/> </span></label>
            <input type="password" placeholder="Password" id="password" name="password" required><br/><br/>
            
            <button type="submit" class="btn">Submit</button>
          </form>
        </article>
        
        <footer>
          <div>
            <p class="Register" ><i class="fas fa-baby"></i>Don"t have an account?</p>
            <a href="http://localhost/mvc/public/register.php">
            <button type="button" class="btnRegister">Register here!</button>
            </a>
          </div>
          <div>
            <p class="Forgot" ><i class="fas fa-skull-crossbones"></i>Forgot your password?</p>
            <a href="http://localhost/mvc/public/forgotPassword.php">
            <button type="button" class="btnForgot">I SHALL PASS!!</button>
            </a>
          </div>
        </footer>
        
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