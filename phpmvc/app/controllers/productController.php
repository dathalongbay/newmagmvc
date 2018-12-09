<?php
class productController extends appController{

    public function __construct()
    {
    }

    public function indexAction() {

        $name = "PHP Article";
        return $this->view('index', 'index', array('name' => $name));
    }

    public function editAction() {

        $name = "PHP Edit";
        return $this->view('index', 'edit', array('name' => $name));
    }
}