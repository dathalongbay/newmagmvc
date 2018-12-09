<?php
class articleController extends appController{

    public $controller = 'article';

    public $model = 'articleModel';

    public $view = 'article';

    public function __construct()
    {

    }

    public function indexAction() {

        $model = new $this->model();
        $offset = 0;
        $limit = 10;
        $rows = $model->getDataByPage($offset, $limit);

        return $this->view($this->view, 'index', array('rows' => $rows));
    }


    public function editAction() {

        $data = array();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        $model = new $this->model();
        $article = $model->getRow($id);
        $data['article'] = $article;

        $categoryArticleModel = new categoryArticleModel();

        $categories = $categoryArticleModel->getListCategories();

        $data['categories'] = $categories;

        return $this->view($this->view, 'edit', $data);
    }

    public function addAction() {

        /**
         * Data trả sang view
         */
        $data = array();

        $model = new $this->model();

        $categoryArticleModel = new categoryArticleModel();

        $categories = $categoryArticleModel->getListCategories();

        $data['categories'] = $categories;

        return $this->view($this->view, 'add', $data);
    }

    public function storeAction() {
        $data = $_POST;



        $model = new $this->model();
        $store = $model->store($data);

        if ($store) {
            $_SESSION['store_record'] = 1;
        } else {
            $_SESSION['store_record'] = 0;
        }

        if ($_POST['save'] == 1) {
            $newURL = ADMIN_URL . 'index.php?controller='.$this->controller.'&action=index';
            header("Location: $newURL");
            die();
        }

        if ($data['id'] > 0) {
            $newURL = ADMIN_URL . 'index.php?controller='.$this->controller.'&action=edit&id='.$data['id'];
        } else {
            $newURL = ADMIN_URL . 'index.php?controller='.$this->controller.'&action=edit&id='.$model->getInsertLastId();
        }

        header("Location: $newURL");
        die();
    }


    public function deleteAction(){

        $id = $_GET['id'];
        $model = new $this->model();

        if ($id > 0) {
            $model->remove($id);
        }

        $rows = $model->getRows();

        return $this->view($this->view, 'index', array('rows' => $rows));
    }


    public function viewAction() {

    }
}