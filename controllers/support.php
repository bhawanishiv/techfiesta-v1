<?php

class Support extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->web['title'] = $this->getPageTitle((get_class($this))) . ' - ' . $this->view->web['title'];
        $this->view->web['description'] = 'Do query by asking questions. You can even send us email to admin@techfiesta.org. For further information, please contact the contact persons mentioned.';
    }

    public function index() {
        $this->contact();
    }

    public function contact() {
        $this->view->web['title'] = 'Contact us :: ' . $this->view->web['title'];

        $this->view->render('support/contact');
    }

    public function postMessage() {
        try {
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];
            $data['message'] = $_POST['message'];
            $data['wantToReach'] = isset($_POST['wantToReach']) ? 'true' : 'false';
            $data['messageId'] = $this->model->genId('messages', 'MSG');
            $res = $this->model->postMessage($data);
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

}
