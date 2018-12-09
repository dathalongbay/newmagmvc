<?php
class errorController extends appController{

    public function __construct()
    {
    }

    public function indexAction() {

        $name = "404";
        return $this->view('index', 'index', array('name' => $name));
    }
}