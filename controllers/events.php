<?php

class Events extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->web['title'] = $this->getPageTitle((get_class($this))) . ' - ' . $this->view->web['title'];
        $this->view->web['description'] = 'Participate in numerous competitions like Robo War, Code Mania, Full Stack Developer, Electrohunt, Quizathon, Need for Speed, PUBG, Counter Strike, Technical Painting, Technical Poster etc.';
    }

    public function index() {
        $this->view->departments = $this->model->getDepartments()['data'];
        $this->view->render('events/index');
    }

    public function school() {
        $this->view->web['title'] = 'School :: ' . $this->view->web['title'];
        $this->view->web['description'] = 'Participation portal for scool students, participate in amazing events at Techfiesta 3.0. Enjoy fun games, Brain-o-Mania, Technical events, Crack Your Creativity etc.';
        $this->view->render('events/school');
    }

    public function results() {
        $this->view->web['title'] = 'Results :: ' . $this->view->web['title'];
        $this->view->web['description'] = 'Result of events';
        $this->view->render('events/results');
    }

    public function participate($eventId = null) {
        $this->view->web['title'] = 'Participate :: ' . $this->view->web['title'];
        $this->view->web['description'] = 'Participate in competitions and showcase your inner-hidden talent.';
        if (!is_null($eventId)) {
            if ($eventId !== 'TFEVT0000009') {
                $this->view->render('events/participate');
            } else {
                $this->view->web['styles']['main'] = 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css';
                $this->view->web['styles']['latoIcon'] = 'https://fonts.googleapis.com/css?family=Lato';
                $this->view->web['styles']['awsomeFonts'] = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css';
                $this->view->render('events/participatePUBG');
            }
        } else {
            $this->view->render('events/participate');
        }
    }

    public function view($departmentId) {
        $events = $this->model->getEvenstByDepartment($departmentId)['data'];
        $this->view->events = $events;
        $this->view->web['title'] = $events[0]['department']['name'] . ' :: ' . $this->view->web['title'];
        $this->view->web['imageUrl'] = URL . $events[0]['department']['image'][0]['source'];
        $this->view->web['imageAlt'] = $events[0]['department']['name'];

        foreach ($events as $event) {
            $this->view->web['keywords'] = $event['name'] . ', ' . $this->view->web['keywords'];
        }
        $this->view->render('events/view');
    }

    public function getDepartments() {
        echo json_encode($this->model->getDepartments());
    }

    public function postParticipation() {
        try {
            $res['status'] = false;
            $data['eventId'] = $_POST['eventId'];
            $data['visible'] = 'true';
            $data['agreement'] = isset($_POST['agreement']) ? 'true' : 'false';
            $data['userId'] = Session::get('userId');
            $data['participationId'] = $this->model->genId('participation', 'PCN');
            $participated = $this->model->getParticipation(array('eventId' => $data['eventId'], 'userId' => $data['userId']));
            if ($participated['status'] && $participated['data'] !== false) {
                $res['code'] = 'error-already-participated';
            } else {
                $participation = $this->model->postParticipation($data);
                if ($participation['status']) {
                    $res['status'] = !$res['status'];
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function getParticipation() {
        $res['status'] = false;
        $participation = $this->model->getParticipation();
        if ($participation['status']) {
            $res['data'] = $participation['data'];
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
    }

    public function getSchoolEvents() {
        $res['status'] = false;
        $events = $this->model->getSchoolEvents();
        if ($events['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $events['data'];
        }
        echo json_encode($res);
    }
    public function getEvents() {
        $res['status'] = false;
        $events = $this->model->getEvents();
        if ($events['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $events['data'];
        }
        echo json_encode($res);
    }

}
