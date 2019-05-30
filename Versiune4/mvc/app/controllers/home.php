<?php

class Home extends Controller {
    // public function index($name = '', $otherName = '') {
    // 	echo $name . ' ' .
    // }
    public function index($pdo, $name = '') {
        $user = $this->model('User', $pdo);
        $user->name = $name;
        $movieListModel = $this->model('MovieList', $pdo);
        $movies = $movieListModel->getMovies();
//		$this->view('home/index', ['name' => $user->name, 'pdo' => $pdo, 'movieList' => $movieList, 'movies' => $movies]);
        $this->view('MovieListView', $movieListModel);
        $viewObj = new MovieListView();
        $viewObj->output($movieListModel);
    }
}