<?php

class FilterMoviesController extends Controller {
    public function alpha($pdo, $name = '') {
        $user = $this->model('User', $pdo);
        $user->name = $name;

        if(isset($_REQUEST['actorName']))
        {
        $actorName=$_REQUEST['actorName'];
        $movieListModel = $this->model('MovieList', $pdo);


        $movies = $movieListModel->getMoviesByActor($actorName);
        $this->view('MovieListFilterView', $movieListModel);
        $viewObj = new MovieListFilterView();
        $viewObj->output($movieListModel, $actorName);
    }
    }
}