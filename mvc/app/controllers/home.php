<?php

class Home extends Controller {
	// public function index($name = '', $otherName = '') {
	// 	echo $name . ' ' .
	// }
	public function index($pdo, $name = '') {
        $user = $this->model('User', $pdo);
		$user->name = $name;
		$movieList = $this->model('MovieList', $pdo);
		$movies = $movieList->getMovies();
//		$this->view('home/index', ['name' => $user->name, 'pdo' => $pdo, 'movieList' => $movieList, 'movies' => $movies]);
        $this->view('MovieListView', $movieList);
    }
}