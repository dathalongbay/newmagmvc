<?php
class indexController extends appController{

    public function __construct()
    {
        /**
         *
         */
    }

    public function indexAction() {

        /**
         * Check session login
         */


        if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
            $loginURL = ADMIN_URL . 'index.php?controller=login&action=index';

            header("Location: $loginURL");
            die;
        }

        $name = "PHP MVC 1";
        return $this->view('index', 'index', array('name' => $name));
    }


    public function mediaAction() {
        $data = array();
        return $this->view('index', 'media', $data);
    }

    public function mediamanagerAction() {
        $data = array();
        return $this->view('index', 'mediamanager', $data);
    }

}