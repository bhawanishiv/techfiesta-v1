<?php

class About extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->web['title'] = $this->getPageTitle((get_class($this))) . ' - ' . $this->view->web['title'];
    }

    public function index() {
        $this->view->render('about/index');
    }

}
