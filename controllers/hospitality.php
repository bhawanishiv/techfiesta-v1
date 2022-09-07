<?php

class Hospitality extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->web['title'] = $this->getPageTitle((get_class($this))) . ' - ' . $this->view->web['title'];
        $this->view->web['description'] = 'Get accomodation free of cost except meal charges. Just simply login and register for accomodation at www.techfiesta.org/hospitality/accomodations';
    }

    public function index() {
        $this->view->render('hospitality/index');
    }

    public function accomodation() {
        $this->view->web['title'] =  'Accomodation :: ' . $this->view->web['title'];
        $this->view->render('hospitality/accomodation');
    }

    public function postAccomodation() {
        try {
            $res['status'] = false;
            $data['userId'] = $_POST['userId'];
            $data['allowed'] = 'false';
            $data['allowedBy'] = 'false';
            $data['remarks'] = isset($_POST['remarks']) ? $_POST['remarks'] : '';
            $data['accomodationId'] = $this->model->genId('accomodations', 'ACM');
            $accomodation = $this->model->postAccomodation($data);
            if ($accomodation['status']) {
                $res['status'] = !$res['status'];
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

}
