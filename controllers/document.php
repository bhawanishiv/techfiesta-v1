<?php

class Document extends Controller {

    function __construct() {
        parent::__construct();
      $this->view->web['title'] = $this->getPageTitle((get_class($this)));
    }

    public function index() {
        $this->view->render('document/index', '',1);
    }

    public function view($name) {
        $this->view->render('document/' . $name, '');
    }

}
