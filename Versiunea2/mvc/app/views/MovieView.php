<?php

class MovieView
{
    public function output(Movie $movie)
    {
        $movieObj = $movie->getMovie();
        $output = 'Movie View pentru filmul ' . $movieObj['description']. '';
//       print_r( $movie->getMovie());


        header("Location: http://localhost/mvc/public/index.php/?url=movie/view_tree/". $movieObj['tree_id']);
        die();
//        return $output;
    }
}
