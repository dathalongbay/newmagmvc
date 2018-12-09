<?php
class indexController extends appController{

    public function __construct()
    {
    }

    public function indexAction() {

        $name = "PHP MVC";
        return $this->view('index', 'index', array('name' => $name));
    }
}