<?php
//include dirname(__FILE__).'../models/';

class MovieListView {
    public function output(MovieList $model): string {
        $output = '
<html lang="en">
  <head>
    <title>YoMovie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,700" rel="stylesheet">
  </head>
  <body>

<header>
  <div class="main-container">
    <a href=""><img class="socialmedia" src="twitter.png" alt=""/></a>
    <a href=""><img class="socialmedia" src="facebook.jpg" alt=""/></a>
    <a href=""><img class="socialmedia" src="instagram.jpg" alt=""/></a><br><br><button type="button">Log in</button><button type="button">Register</button><br><br>
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
        <li><a id = "random_movie"> Random </a></li>
        <li> <input type="text" placeholder="Search.."> </li>
      </ul>
  </div>
</div>
  <div class="movie-list">';
        //        $output = '
//		<p><a href="index.php?route=edit">Add new joke</a></p>
//		<form action="" method="get">
//				<input type="hidden" value="filterList" name="route" />
//				<input type="hidden" value="' . $model->getSort() . '" name="sort" />
//				<input type="text"  placeholder="Enter search text" name="search" />
//
//				<input type="submit" value="submit" />
//			</form>
//
//			<p>Sort: <a href="index.php?route=filterList&amp;sort=newest">Newest first</a> | <a href="index.php?route=filterList&amp;sort=oldest">Oldest first</a>
//			<ul>
//
//			';

        foreach ($model->getMovies() as $movie) {
            $output .= '    <div class="card">

      <div class="card-media">
        <img alt = "" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9Kwse6AK8gVJmLes8B4LSY9HXOhK8CxXdbB0Teqjct6xud8KO" class="card-media-img"  />
        <div class="card-media-preview flex-center">
            <a href = "http://localhost:81/mvc2/public/index.php/?url=movie/view_movie/' . $movie['tree_id'] . '">
                <svg fill="#000000" height="18" viewBox="0 0 24 24" width="18">
                    <path d="M8 5v14l11-7z"/>
                    <path d="M0 0h24v24H0z" fill="none"/>
                </svg>
            </a>
        </div>
      </div>
      <div class="card-body">
        <div class="flex-row">
          <h2 class="card-body-heading" style="margin-top: 0">';
            $output .= $movie['title'];
            $output .= '</h2>
          <div class="card-body-options">
            <div class="card-body-option card-body-option-favorite">
              <svg fill="#000000" height="26" viewBox="0 0 24 24" width="26">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/>
              </svg></div>
            <div class="card-body-option card-body-option-share">
              <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/>
              </svg></div>
          </div>
        </div>
        <div class="flex-collumn">';
//          <ul class="card-body-stars">';
//
//            $i = 1;
//            if ($movie['no_ratings'] > 0) {
//                for ($i = 1; $i <= $movie['rating'] / $movie['no_ratings']; $i++) {
//                    $output .= '<li>
//                              <svg fill="#000000" height="28" viewBox="0 0 18 18" width="28">
//                                <path d="M9 11.3l3.71 2.7-1.42-4.36L15 7h-4.55L9 2.5 7.55 7H3l3.71 2.64L5.29 14z"/>
//                                <path d="M0 0h18v18H0z" fill="none"/>
//                              </svg>
//                            </li>';
//                }
//            }
//            for(;$i <= 5; $i++) {
//                $output .= '<li>
//                              <svg fill="#B0A9A9" height="28" viewBox="0 0 18 18" width="28">
//                                <path d="M9 11.3l3.71 2.7-1.42-4.36L15 7h-4.55L9 2.5 7.55 7H3l3.71 2.64L5.29 14z"/>
//                                <path d="M0 0h18v18H0z" fill="none"/>
//                              </svg>
//                            </li>';
//            }
//
//            $output .= '</ul>
            $rating_final = 0;
            if($movie['no_ratings'] > 0) {
                $rating_final = $movie['rating'] / $movie['no_ratings'];
            }
//            echo $rating_final;
//            echo '<br>';
          $output .= '
<div class="stars" data-rating="' . $rating_final . '">
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
    </div>

<a href="#/" class="card-button card-button-link">' .
           $movie['description'] .
                '<span class="card-button-icon">
              <svg fill="#000000" height="16" viewBox="0 0 24 24" width="16">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
              </svg>
            </span>
           </a>
        </div>
      </div>
      </div>
';
//            $output .= ' <a href="index.php?route=edit&amp;id=' . $joke['id'] . '">Edit</a>';
//            $output .= '<form action="/public/index.php?route=delete" method="POST"></form>';
            $output .= 	'</li>';
        }

        $output .= '
    </div>
</div>

</div>
  <script src="./application.js"></script>

    
    <script>
        
        //initial setup
        document.addEventListener(\'DOMContentLoaded\', function(){
            let stars = document.querySelectorAll(\'.star\');
            stars.forEach(function(star){
                star.addEventListener(\'click\', setRating); 
            });
            
            let rating = parseInt(document.querySelector(\'.stars\').getAttribute(\'data-rating\'));
            let target = stars[rating - 1];
            target.dispatchEvent(new MouseEvent(\'click\'));
        });
        function setRating(ev){
            let span = ev.currentTarget;
            let stars = document.querySelectorAll(\'.star\');
            let match = false;
            let num = 0;
            stars.forEach(function(star, index){
                if(match){
                    star.classList.remove(\'rated\');
                }else{
                    star.classList.add(\'rated\');
                }
                //are we currently looking at the span that was clicked
                if(star === span){
                    match = true;
                    num = index + 1;
                }
            });
            document.querySelector(\'.stars\').setAttribute(\'data-rating\', num);
        }
        
    </script>
</body>
</html>
';
        echo $output;
        return $output;

    }
}
