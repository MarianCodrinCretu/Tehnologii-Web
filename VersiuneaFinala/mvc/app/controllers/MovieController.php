<?php
class MovieController extends Controller
{
    public function view_movie($pdo, $id = 0)
    {

        $user = $this->model('User', $pdo);

        $movieModel = $this->model('Movie', $pdo);
        $movie = $movieModel->load($id);
        $this->view('MovieView', $movie);
        $viewObject = new MovieView();
        $viewObject->output($movie);
    }
    public function view_tree($pdo, $id = 0)
    {
        $movieModel = $this->model('Movie', $pdo);
        $treeRecord = $movieModel->getTree($id);

        $this->view('TreeView', $treeRecord);
        $viewObject = new TreeView();
        $viewObject->outputTree($treeRecord);
    }
}