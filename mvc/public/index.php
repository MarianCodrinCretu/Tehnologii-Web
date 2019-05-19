<?php

//include dirname(__FILE__).'../app/models/';
//include dirname(__FILE__).'../app/controllers/';
//include dirname(__FILE__).'../app/views/';

require_once '../app/init.php';

//-------------------------------------

require '../config.php';

$pdo = new Pdo('mysql:host=localhost;dbname=' . DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$app = new App($pdo);

$route = $_GET['route'] ?? '';

if ($route == '') {
    $model = new MovieList($pdo);
    $view = new MovieListView();
}
//else if ($route == 'edit') {
//    $model = new \JokeSite\JokeForm($pdo);
//    $controller = new \JokeForm\Controller();
//
//    $model = $controller->edit($model);
//
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        $model = $controller->submit($model);
//    }
//
//    $view = new \JokeForm\View();
//} else if ($route == 'delete') {
//    $model = new \JokeSite\JokeList($pdo);
//    $controller = new \JokeList\Controller();
//
//    $model = $controller->delete($model);
//
//    $view = new \JokeList\View();
//} else if ($route == 'filterList') {
//    $model = new \JokeSite\JokeList($pdo);
//    $view = new \JokeList\View();
//    $controller = new \JokeList\Controller();
//
//    $model = $controller->filterList($model);
//} else {
//    http_response_code(404);
//    echo 'Page not found (Invalid route)';
//}


echo $view->output($model);