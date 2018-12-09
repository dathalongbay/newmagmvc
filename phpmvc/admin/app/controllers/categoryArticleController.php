<?php
class categoryArticleController extends appController{

    /**
     *
     * categoryArticleController constructor.
     */
    public function __construct()
    {
        if ( !isset($_SESSION['login_user']) || empty($_SESSION['login_user']) ) {

            $loginURL = SITE_URL . 'index.php?controller=login&action=index';
            header("Location: $loginURL");
            die;
        }
    }

    /**
     * Liệt kê tất cả các danh mục
     */
    public function indexAction(){

        $categoryArticleModel = new categoryArticleModel();
        $categories = $categoryArticleModel->getListCategories();

        $parents = array();

        foreach($categories as $key => $value) {

            $category_id = (int) $value['id'];
            $parents[$category_id] = $value;
        }

        $data = array();
        $data['categories'] = $categories;
        $data['parents'] = $parents;

        return $this->view('categoryarticle', 'index', $data);
    }

    /**
     * Xem chi tiết 1 danh mục
     */
    public function viewAction(){
        echo '<br>' . __METHOD__;

    }

    /**
     * Thêm danh mục
     */
    public function submitAction(){

        $categoryArticleModel = new categoryArticleModel();
        $categories = $categoryArticleModel->getListCategories();

        $parents = array();

        foreach($categories as $key => $value) {

            $category_id = (int) $value['id'];
            $parents[$category_id] = $value;
        }

        $data = array();
        $data['categories'] = $categories;

        return $this->view('categoryarticle', 'submit', $data);
    }

    /**
     * Sửa danh mục
     */
    public function editAction() {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $data = array();
        $categoryArticleModel = new categoryArticleModel();
        $data['category'] = $categoryArticleModel->getRow($id);

        $categoryArticleModel = new categoryArticleModel();
        $categories = $categoryArticleModel->getListCategories();

        $parents = array();

        foreach($categories as $key => $value) {

            $category_id = (int) $value['id'];
            $parents[$category_id] = $value;
        }

        $data['categories'] = $categories;

        return $this->view('categoryarticle', 'edit', $data);
    }

    /**
     * Lưu dữ liệu vào trong database
     */
    public function storeAction() {

        $data = $_POST;
        $categoryArticleModel = new categoryArticleModel();
        $categoryArticleModel->store($data);

        header("Location: ".ADMIN_URL."?controller=categoryArticle&action=index");
        die();
    }

    /**
     * Xóa danh mục
     */
    public function deleteAction() {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        if ($id > 0) {
            $categoryArticleModel = new categoryArticleModel();
            $categoryArticleModel->delete($id);
        }

        header("Location: ".ADMIN_URL."?controller=categoryArticle&action=index");
        die();
    }


}