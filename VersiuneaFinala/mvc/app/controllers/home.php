<?php

class Home extends Controller {
    public function index($pdo, $name = '') {
        $user = $this->model('User', $pdo);
        $user->name = $name;
        $movieListModel = $this->model('MovieList', $pdo);
        $movies = $movieListModel->getMovies();
        $this->view('MovieListView', $movieListModel);
        $viewObj = new MovieListView();
        $viewObj->output($movieListModel);
    }
}