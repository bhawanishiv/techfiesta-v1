<?php

class Failure extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index($page = false) {
        $this->view->msg = $page;
        $this->view->render('error/index', false);
    }

    function failure($page) {
        $this->index($page);
    }

}
