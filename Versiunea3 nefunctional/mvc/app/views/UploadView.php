<?php
//include dirname(__FILE__)."../models/";

class UploadView {
    public function output(Movie $model): string {
      session_start();
      //echo $_SESSION[];
     // session_destroy();
      //var_dump($_SESSION);

        $output = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>YoMovie</title>
    <link rel="stylesheet" type="text/css" href="upload.css">
    <link rel="stylesheet" type="text/css" href="upload2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,700" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="main-container">
        <a href=""><img class="socialmedia" src="twitter.png" alt=""/></a>
        <a href=""><img class="socialmedia" src="facebook.jpg" alt=""/></a>
        <a href=""><img class="socialmedia" src="instagram.jpg" alt=""/></a><br><br><button class="float-right" type="button">Log in</button><button class="float-right" type="button">Register</button><br><br>

      </div>
    </header>
    
    <div class="main-container">
      <div class="nav-bar">
        <div class="logo">YoMovie</div>
        <div class="nav-menu">
          <ul>
            <li><a href=""> Show all </a></li>
            <li><a href="">Genres </a>
            <ul>
              <li><a href=""> Horror </a></li>
              <li><a href=""> Thriller </a></li>
              <li><a href=""> Comedy </a></li>
              <li><a href=""> Drama </a></li>
            </ul>
          </li>
          <li><a href=""> Articles </a></li>
          <li><a href=""> Actors </a></li>
          <li><a href=""> Directors </a></li>
          <li><a href=""> News </a> </li>
          <li> <input type="text" placeholder="Search.."> </li>
        </ul>
      </div>
    </div>
    <div class="upload">
      
      <br/><h2> Upload Movie </h2><br/><br/><br/>
    </div>
    <form action="" method="POST">
      <div class="card">
        <div class="movie_info">
            <label for="title"><span id="Movie_Title">Movie Title:<br/></span></label>
            <input type="text" value="-" name="titlu" id="title" required> <br/><br/>
            
            <label for="info"><span id="Movie_Info">Movie Description:<br/></span></label>
            <input type="text" value="-" name="descriere" id="info" required> <br/><br/>

            <label for="gen"><span id="Movie_Gen">Movie Genre:<br/></span></label>
            <select style="height:40px; margin-bottom:60px" name="categorie">
              <option id="Horror" value="Horror">Horror</option>
              <option id="Thriller" value="Thriller">Thriller</option>
              <option id="Comedy" value="Comedy">Comedy</option>
              <option id="Drama" value="Drama">Drama</option>
              <option id="Other" value="Other">Other</option>
            </select>
            <label for="actors"><span id="Movie_Actors">Movie Actors:<br/></span></label>
            <input type="text" value="-" name="actori" id="actors" required> <br/><br/>

            <label for="directors"><span id="Movie_Directors">Movie Director:<br/></span></label>
            <input type="text" value="-" name="director" id="director" required> <br/><br/>

            <label for="image"><span id="Movie_Image">Movie Image:<br/></span></label>


            <div class="dropzone">
              <div class="info"></div>
            </div>
            <script type="text/javascript" src="imgur.js"></script>
            <script type="text/javascript" src="upload.js"></script>


        </div>
        <script src="function_drop.js"></script>
        <div class="movie">
          <div class="upload_info">
            
            <label for="url_1"><span id="Movie_url_1">Movie url:<br/></span></label>
            <input type="text" value="-" name="url1" id="url_1" required><br/><br/>
            
          </div>
          <div class="question_info">
            <label for="question_q_1"><span id="Question_q_1">Question:<br/></span></label>
            <input type="text" value="-" name="intrebare1" id="question_q_1" required><br/><br/>
            <div class="response">
              <label for="scenario_1_1"><span id="Scenario_1_1">Scenario 1:<br/></span></label>
              <input type="text" value="-" name="scenariu_1_1" id="scenario_1_1" required>
  
              <select name="movie_parts_1_1">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
                        <div class="response">
              <label for="scenario_1_2"><span id="Scenario_1_2">Scenario 2:<br/></span></label>
              <input type="text" value="-" name="scenariu_1_2" id="scenario_1_2" required>
  
              <select name="movie_parts_1_2">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
                        <div class="response">
              <label for="scenario_1_3"><span id="Scenario_1_3">Scenario 3:<br/></span></label>
              <input type="text" value="-" name="scenariu_1_3" id="scenario_1_3" required>
  
              <select name="movie_parts_1_3">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
                        <div class="response">
              <label for="scenario_1_4"><span id="Scenario_1_4">Scenario 4:<br/></span></label>
              <input type="text" value="-" name="scenariu_1_4" id="scenario_1_4" required>
  
              <select name="movie_parts_1_4">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
          </div>
        </div>
  </div>
      <footer>
      <div>
        <button onclick="addPart()" class="btnAddParts" type="button">Add More Parts</button><br/><br/><br/>
      </div>
    </footer>

    <div class="Load">
      <button type="submit" class="btnAdd">Upload</button><br/><br/><br/>
    </div>
    </form>
    <div class="Load">
      <a href="http://localhost/mvc/public/"><button type="button" class="btnAdd">Get Back</button></a><br/><br/><br/>
    </div>
</body>
</html>

';
        echo $output;
        return $output;

    }
}
