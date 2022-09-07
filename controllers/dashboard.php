<?php

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->web['title'] = $this->getPageTitle((get_class($this))) . ' - ' . $this->view->web['title'];

        if ($this->view->user['type'] == 'superadmin' || $this->view->user['type'] == 'admin') {
            
        } else {
            header('location:' . URL);
        }
    }

    function index() {
        $this->view->render('dashboard/index', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function departments() {
        $this->view->web['title'] = 'Departments :: ' . $this->view->web['title'];
        $this->view->render('dashboard/departments', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function events() {
        $this->view->web['title'] = 'Events :: ' . $this->view->web['title'];
        $this->view->render('dashboard/events', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function users() {
        $this->view->render('dashboard/users', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function participation() {
        $this->view->render('dashboard/participation', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function team() {
        $this->view->render('dashboard/team', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function payments() {
        $this->view->render('dashboard/payments', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function hospitality() {
        $this->view->render('dashboard/hospitality', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function messages() {
        $this->view->render('dashboard/messages', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function school() {
                $this->view->web['title'] ='Scchol Event :: '. $this->view->web['title'];

        $this->view->render('dashboard/school', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    function others() {
        $this->view->render('dashboard/others', array('navigation' => 'dashboard/navigation', 'footer' => 'dashboard/footer'));
    }

    public function getUsers() {
        try {
            $res = $this->model->getUsers();
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getUsers() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function getFiles($type) {
        if (empty($type) || !isset($type)) {
            $this->view->render('error/index', false);
        } else {
            switch ($type) {
                case 'participation':$this->generateParticipationPDF();
                    break;
                case 'departments':$this->generateDepartmentsPDF();
                    break;
                case 'events':$this->generateEventsPDF();
                    break;
                case 'teamMembers':$this->generateTeamMembersPDF();
                    break;
            }
        }
    }

    public function generateParticipationPDF() {
        $participations = $this->model->getParticipation()['data'];
        foreach ($participations as $participation) {
            $data['fName'] = strtolower($participation['participant']['fName']);
            $data['fName'] = ucWords($data['fName']);
            $data['college'] = isset($participation['participant']['academics']) ?
                    $participation['participant']['academics']['session'] . '/' . $participation['participant']['academics']['institute']['name'] : '';
            $data['eventName'] = $participation['event']['name'];
            $_data[] = $data;
        }
        $res = array('title' => 'Participation Details', 'subTitle' => 'Generated on ' . $this->model->dateNow() . ' | Last updated on ' . $participations[count($participations) - 1]['lastModifiedOn'],
            'headers' => array('Participant Name' => 50, 'College' => 90, 'Event' => 30),
            'data' => $_data);
        $this->generatePDF($res);
    }

    public function generateTeamMembersPDF() {
        $members = $this->model->getTeamMembers()['data'];
        foreach ($members as $member) {
            $data['fName'] = strtolower($member['member']['fName']);
            $data['fName'] = ucWords($data['fName']);
            $data['department'] = $member['department']['name'];
            $data['phone'] = isset($member['member']['phones'][0]['phone']) ? $member['member']['phones'][0]['phone'] : $member['member']['phones'];
            $data['email'] = isset($member['member']['emails'][0]['email']) ? $member['member']['emails'][0]['email'] : $member['member']['emails'];
            $_data[] = $data;
        }
        $res = array('title' => 'Coordinators Details', 'subTitle' => 'Generated on ' . $this->model->dateNow() . ' | Last updated on ' . $members[count($members) - 1]['lastModifiedOn'],
            'headers' => array('Coordinator Name' => 50, 'Department' => 30, 'Phone' => 30, 'Email' => 60),
            'data' => $_data);
        $this->generatePDF($res);
    }

    public function generateEventsPDF() {
        $events = $this->model->getEvents()['data'];
        foreach ($events as $event) {
            $data['name'] = $event['name'];
            $data['department'] = $event['department']['name'];
            $data['fName'] = strtolower($event['head']['fName']);
            $data['fName'] = ucWords($data['fName']);
            $data['phone'] = isset($event['head']['phones'][0]['phone']) ? $event['head']['phones'][0]['phone'] : $event['head']['phones'];
            $data['email'] = isset($event['head']['emails'][0]['email']) ? $event['head']['emails'][0]['email'] : $event['head']['emails'];
            $_data[] = $data;
        }
        $res = array('title' => 'Event Details', 'subTitle' => 'Generated on ' . $this->model->dateNow() . ' | Last updated on ' . $events[count($events) - 1]['lastModifiedOn'],
            'headers' => array('Event' => 35, 'Department' => 30, 'Event Head Name' => 35, 'Phone' => 25, 'Email' => 50),
            'data' => $_data);
        $this->generatePDF($res);
    }

    public function generateDepartmentsPDF() {
        $departments = $this->model->getDepartments()['data'];
        foreach ($departments as $department) {
            $data['department'] = $department['name'];
            $data['fName'] = strtolower($department['head']['fName']);
            $data['fName'] = ucWords($data['fName']);
            $data['phone'] = isset($department['head']['phones'][0]['phone']) ? $department['head']['phones'][0]['phone'] : $department['head']['phones'];
            $data['email'] = isset($department['head']['emails'][0]['email']) ? $department['head']['emails'][0]['email'] : $department['head']['emails'];
            $_data[] = $data;
        }
        $res = array('title' => 'Department Details', 'subTitle' => 'Generated on ' . $this->model->dateNow() . ' | Last updated on ' . $departments[count($departments) - 1]['lastModifiedOn'],
            'headers' => array('Department' => 40, 'Head Name' => 40, 'Phone' => 25, 'Email' => 60),
            'data' => $_data);
        $this->generatePDF($res);
    }

    public function toggleUserPermission() {
        $res['status'] = false;
        $res['status'] = $this->model->toggleUserPermission($_POST['userId']);
        echo json_encode($res);
    }

    public function toggleUserType() {
        $res['status'] = false;
        $res['status'] = $this->model->toggleUserType($_POST['userId']);
        echo json_encode($res);
    }

    public function togglePaymentVerification() {
        $res['status'] = false;
        $res['status'] = $this->model->togglePaymentVerification(array('paymentId' => $_POST['paymentId'], 'verifiedBy' => Session::get('userId')));
        echo json_encode($res);
    }

    public function toggleAccomodationAllowance() {
        $res['status'] = false;
        $res['status'] = $this->model->toggleAccomodationAllowance(array('accomodationId' => $_POST['accomodationId'], 'allowedBy' => Session::get('userId')));
        echo json_encode($res);
    }

    public function getMessages() {
        $res['status'] = false;
        $messages = $this->model->getMessages();
        if ($messages['status']) {
            $res['data'] = $messages['data'];
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
    }

    public function getHospitality() {
        $res['status'] = false;
        $hospitality = $this->model->getHospitality();
        if ($hospitality['status']) {
            $res['data'] = $hospitality['data'];
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
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

    public function getTeamMembers() {
        $res['status'] = false;
        $team = $this->model->getTeamMembers();
        if ($team['status']) {
            $res['data'] = $team['data'];
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
    }

    public function getInstitutes() {
        $res['status'] = false;
        $institutes = $this->model->getInstitutes();
        if ($institutes['status']) {
            $res['data'] = $institutes['data'];
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
    }

    public function getPayments() {
        $res['status'] = false;
        $paymeents = $this->model->getPayments();
        if ($paymeents['status']) {
            $res['data'] = $paymeents['data'];
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
    }

    public function postInstitute() {
        try {
            $res['status'] = false;
            $data['name'] = $_POST['name'];
            $data['address'] = isset($_POST['address']) ? $_POST['address'] : '';
            $data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $data['instituteId'] = $this->model->genId('institutes', 'INT');
            $event = $this->model->postInstitute($data);
            if ($event['status']) {
                $res['status'] = !$res['status'];
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function postTeamMember() {
        try {
            $res['status'] = false;
            $data['departmentId'] = $_POST['departmentId'];
            $data['memberId'] = $_POST['memberId'];
            $data['role'] = isset($_POST['role']) ? $_POST['role'] : 'member';
            $alreadyMember = $this->model->getTeamMembers(array('departmentId' => $data['departmentId'], 'memberId' => $data['memberId']));
            if ($alreadyMember['status'] && $alreadyMember['data'] !== false) {
                $res['code'] = 'error-already-a-member';
            } else {
                $team = $this->model->postTeamMember($data);
                if ($team['status']) {
                    $res['status'] = !$res['status'];
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($alreadyMember);
        }
    }

    public function postDepartment() {
        try {
            $res['status'] = false;
            $data['headId'] = $_POST['headId'];
            $data['name'] = $_POST['name'];
            $data['type'] = $_POST['type'];
            $data['departmentId'] = $this->model->genId('departments', 'DEP');
            $image = $this->model->uploadFile('image', $data['departmentId'], 'department-image', 'default', $data['name'], 'department', FILE_TYPE_IMAGE);
            if ($image['status']) {
                $event = $this->model->postDepartment($data);
                if ($event['status']) {
                    $res['status'] = !$res['status'];
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function postEvent() {
        try {
            $res['status'] = false;
            $data['name'] = $_POST['name'];
            $data['departmentId'] = $_POST['departmentId'];
            $data['headId'] = $_POST['headId'];
            $data['about'] = $_POST['about'];
            $data['challenge'] = $_POST['challenge'];
            $data['eventId'] = $this->model->genId('events', 'EVT');
            $image = $this->model->uploadFile('image', $data['eventId'], 'event-image', 'default', $data['name'], 'events', FILE_TYPE_IMAGE);
            if ($image['status']) {
                $file = $this->model->uploadFile('file', $data['eventId'], 'event-file', 'default', $data['name'], 'events', FILE_TYPE_WORDPROCESSOR);
                if ($file['status']) {
                    $event = $this->model->postEvent($data);
                    if ($event['status']) {
                        $res['status'] = !$res['status'];
                    }
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }
    public function postSchoolEvent() {
        try {
            $res['status'] = false;
            $data['name'] = $_POST['name'];
            $data['eventId'] = $_POST['eventId'];
            $data['headId'] = $_POST['headId'];
            $data['about'] = $_POST['about'];
            $data['challenge'] = $_POST['challenge'];
            $data['schoolEventId'] = $this->model->genId('scoolevents', 'SCH');
            $image = $this->model->uploadFile('image', $data['schoolEventId'], 'school-event-image', 'image', $data['name'], 'events/school', FILE_TYPE_IMAGE);
            if ($image['status']) {
                $file = $this->model->uploadFile('file', $data['schoolEventId'], 'school-event-file', 'file', $data['name'], 'events/school', FILE_TYPE_WORDPROCESSOR);
                if ($file['status']) {
                    $event = $this->model->postSchoolEvent($data);
                    if ($event['status']) {
                        $res['status'] = !$res['status'];
                    }
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($event);
        }
    }

    public function postEventDate() {
        try {
            $res['status'] = false;
            $data['eventId'] = $_POST['eventId'];
            $data['date'] = $_POST['date'];
            $data['activity'] = $_POST['activity'];
            $data['start'] = $_POST['start'];
            $data['end'] = $_POST['end'];
            $date = $this->model->postEventDate($data);
            if ($date['status']) {
                $res['status'] = !$res['status'];
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function postEventVenue() {
        try {
            $res['status'] = false;
            $data['eventId'] = $_POST['eventId'];
            $data['venue'] = $_POST['venue'];
            $data['activity'] = $_POST['activity'];
            $date = $this->model->postEventVenue($data);
            if ($date['status']) {
                $res['status'] = !$res['status'];
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function postMail() {
        try {
            $data['lang'] = 'EN';
            $data['name'] = $_POST['name'];
            $data['to'] = $_POST['to'];
            $data['cc'] = $_POST['cc'];
            $data['bcc'] = $_POST['bcc'];
            $data['subject'] = $_POST['subject'];
            $data['content'] = $_POST['content'];
            $data['code'] = $_POST['code'];
            $data['mId'] = $this->model->genId('sentmails', 'SM');
            $res = $this->model->postMail($data);
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function updateDepartment() {
        try {
            $res['status'] = false;
            $data['headId'] = $_POST['headId'];
            $data['name'] = $_POST['name'];
            $data['type'] = $_POST['type'];
            $data['departmentId'] = $_POST['departmentId'];
            $departments = $this->model->getDepartments(array('departmentId' => $data['departmentId']));
            if ($departments['status'] && $departments['data'] !== false) {
                $update = $this->model->updateDepartment($data);
                if ($update['status']) {
                    $res['status'] = !$res['status'];
                }
            } else {
                $res['code'] = 'error-department-not-found';
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($departments);
        }
    }

    public function updateEvent() {
        try {
            $res['status'] = false;
            $data['headId'] = $_POST['headId'];
            $data['name'] = $_POST['name'];
            $data['about'] = $_POST['about'];
            $data['challenge'] = $_POST['challenge'];
            $data['eventId'] = $_POST['eventId'];
            $data['departmentId'] = $_POST['departmentId'];
            $event = $this->model->getEvents(array('eventId' => $data['eventId']));
            if ($event['status'] && $event['data'] !== false) {
                if (isset($_FILES['file'])) {
                    $changeFile = $this->model->changeFile('file', $data['eventId'], 'event-file', 'file', $data['name'], 'events', FILE_TYPE_WORDPROCESSOR);                    
                }
                $update = $this->model->updateEvent($data);
                if ($update['status']) {
                    $res['status'] = !$res['status'];
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function updateTeam() {
        try {
            $res['status'] = false;
            $data['memberId'] = $_POST['memberId'];
            $data['departmentId'] = $_POST['departmentId'];
            $data['role'] = $_POST['role'];
            $member = $this->model->getTeamMembers(array('departmentId' => $data['departmentId']));
            if ($member['status'] && $member['data'] !== false) {
                $update = $this->model->updateTeam($data);
                if ($update['status']) {
                    $res['status'] = !$res['status'];
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

}
