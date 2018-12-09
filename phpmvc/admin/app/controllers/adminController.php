<?php
class adminController extends appController{

    public function __construct()
    {

    }

    /**
     * phuong thuc se su dung hien thi tat ca cac bai viet
     */
    public function indexAction() {

        $adminModel = new adminModel();
        $admins = $adminModel->getRows();

        return $this->view('admin', 'index', array('admins' => $admins));
    }

    /**
     * phuong thuc sua bai viet
     */
    public function editAction() {

        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        $adminModel = new adminModel();
        $admin = $adminModel->getRow($id);

        return $this->view('admin', 'edit', array('admin' => $admin));
    }

    public function addAction() {


        $adminModel = new adminModel();

        return $this->view('admin', 'add', array());
    }

    public function storeAction() {
        $data = $_POST;

        $adminModel = new adminModel();
        $adminModel->store($data);

        if ($data['id'] > 0) {
            $newURL = ADMIN_URL . 'index.php?controller=admin&action=edit&id='.$data['id'];
        } else {
            $newURL = ADMIN_URL . 'index.php?controller=admin&action=edit&id='.$adminModel->getInsertLastId();
        }



        header("Location: $newURL");
        die();
    }

    /**
     * xoa 1 bai viet
     */
    public function deleteAction(){

        $id = $_GET['id'];
        $adminModel = new adminModel();

        if ($id > 0) {
            $adminModel->remove($id);
        }

        $admins = $adminModel->getRows();

        return $this->view('admin', 'index', array('admins' => $admins));
    }

    /**
     * xem 1 bai viet
     */
    public function viewAction() {

    }
}