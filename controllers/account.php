<?php

class Account extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->web['title'] = $this->getPageTitle((get_class($this))) . ' - ' . $this->view->web['title'];
        $this->view->web['description'] = 'One account in Techfiesta and manage entire happenings.';
    }

    public function index() {
        if ((bool) Session::get('loggedIn')) {
            header('location:' . account . 'profile');
        } else {
            header('location:' . account . 'login');
        }
    }

    public function profile() {
        if ((bool) Session::get('loggedIn')) {
            $user = $this->model->getUsers(Session::get('userId'))['data'];
            $this->view->web['title'] = $user['fName'] . ' :: ' . $this->view->web['title'];

            $this->view->render('account/profile');
        } else {
            header('location:' . account . 'login');
        }
    }

//    public function settings() {
//        if ((bool) Session::get('loggedIn')) {
//            $this->view->render('account/settings');
//        } else {
//            header('location:' . account . 'login');
//        }
//    }

    public function login() {
        $this->view->web['title'] = 'Login :: ' . $this->view->web['title'];
        $this->view->render('account/login', false);
    }

    public function create() {
        $this->view->web['title'] = 'Create :: ' . $this->view->web['title'];
        $this->view->render('account/create', false);
    }

    public function forgotPassword() {
        $this->view->web['title'] = 'Forgot Password : ' . $this->view->web['title'];
        $this->view->render('account/forgotpassword', false);
    }

    public function postLogin() {
        try {

            $res['status'] = false;
            $data['pswd'] = $_POST['pswd'];
            $data['phone'] = $data['email'] = $_POST['emailNPhone'];

            $user = is_numeric($_POST['emailNPhone']) ? $this->model->check_phone($data['phone']) : $this->model->check_email($data['email']);
            $data['userId'] = is_numeric($_POST['emailNPhone']) ? $this->model->check_phone($data['phone'])['data']['phoneId'] : $this->model->check_email($data['email'])['data']['emailId'];

            $pswd = $this->model->check_password($data);
            $permission = $this->model->checkPermission($data);

            if ((bool) $user['status'] && (bool) $pswd['status']) {
                if ($permission['status'] == 'true' && $permission['data']['account'] == 'true') {
                    if ($this->model->initLogin($data)['status']) {
                        $res['status'] = !$res['status'];
                        $res['data']['redirect'] = Session::get('redirectLogin') == false ? account . 'profile' : Session::get('redirectLogin');
                        Session::destroya('redirectLogin');
                    }
                } else {
                    $res['data']['code'] = 'account-permission-false';
                }
            } else {
                $res['data']['code'] = 'input-false';
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function getUsers() {
        $res['status'] = false;
        $users = $this->model->getUsers(Session::get('userId'));
        if ($users['status']) {
            $res['data'] = $users['data'];
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
    }

    public function getAccountDetail() {
        $res['status'] = false;

        switch ($_POST['type']) {
            case 'email' : $res['data'] = $this->model->check_email($_POST['email'])['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'phone' : $res['data'] = $this->model->check_phone($_POST['phone'])['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'emailNPhone' :
                $getPhone = $this->model->check_phone($_POST['emailNPhone']);
                if ($getPhone['status'] && $getPhone['data']) {
                    $res['data'] = $getPhone['data'];
                    $res['status'] = !$res['status'];
                } else {
                    $getEmail = $this->model->check_Email($_POST['emailNPhone']);
                    if ($getEmail['status'] && $getEmail['data']) {
                        $res['data'] = $getEmail['data'];
                        $res['status'] = !$res['status'];
                    }
                }
                break;

            case 'image' : $res['data'] = $this->model->getFile($_POST['imageId'])['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'user' : $res['data'] = $this->model->getUsers($_POST['userId'])['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'currentUser' : $res['data'] = $this->model->getUsers(Session::get('userId'))['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'currentUserEmail' : $res['data'] = $this->model->getEmail(Session::get('userId'))['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'currentUserPhone' : $res['data'] = $this->model->getPhone(Session::get('userId'))['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'currentUserImage' : $res['data'] = $this->model->getFile(Session::get('userId'))['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'currentUserVerification' : $res['data'] = $this->model->getVerification(Session::get('userId'))['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'currentUserPermission' : $res['data'] = $this->model->getPermission(Session::get('userId'))['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'verification' : $res['data'] = $this->model->getVerification($_POST['userId'])['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
            case 'permission' : $res['data'] = $this->model->getPermission($_POST['userId'])['data'];
                $res['status'] = $res['data'] == false ? false : true;
                break;
        }
        echo json_encode($res);
    }

    public function createUser() {
        $res['status'] = false;
        try {
            $user['email'] = $_POST['email'];
            $user['phone'] = $_POST['phone'];
            $user['hPswd'] = Hash::create('md5', $_POST['pswd'], HASH_PSWD_KEY);
            $user['agreement'] = isset($_POST['agreement']) ? 'true' : 'false';
            $user['gender'] = $_POST['gender'];
            $user['fName'] = $_POST['fName'];
            $user['verification']['email'] = $_POST['vEmail'] == 'true' ? true : false;
            $user['verification']['phone'] = $_POST['vPhone'] == 'true' ? true : false;
            $user['userId'] = $this->model->genId('users', 'UR');
            if ($user['agreement'] == 'true') {
                if ($this->model->createUser($user)['status']) {
                    if ($this->model->initLogin($user)['status']) {
                        $res['status'] = !$res['status'];
                        $res['data']['userId'] = $user['userId'];
                        $res['data']['redirect'] = Session::get('redirectLogin') ? Session::get('redirectLogin') : account . 'profile';
                        Session::destroya('redirectLogin');
                    }
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function verifyUser($data) {
        $res['status'] = false;
        switch ($data['type']) {
            case 'email':$res = $this->model->verifyEmail($data['userId']);
                break;
        }
    }

    public function logout() {
        Session::init();
        Session::destroy();
        header('location:' . URL);
    }

    public function getInstitutes() {
        echo json_encode($this->model->getInstitutes());
    }

    public function getAccomodations() {
        $res['status'] = false;
        $accomodations = $this->model->getAccomodations(array('userId' => Session::get('userId')));
        if ($accomodations['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $accomodations['data'];
        }
        echo json_encode($res);
    }

    public function getParticipation() {
        $res['status'] = false;
        $participations = $this->model->getParticipation(array('userId' => Session::get('userId')));
        if (!$participations['data'] == false) {
            $res['status'] = !$res['status'];
            $res['data'] = $participations['data'];
        }
        echo json_encode($res);
    }

    public function getAcademics() {
        $res['status'] = false;
        $academic = $this->model->getAcademics(array('userId' => Session::get('userId')));
        if (!$academic['data'] == false && $academic['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $academic['data'];
        }
        echo json_encode($res);
    }

    public function postPayment() {
        try {
            $data['userId'] = Session::get('userId');
            $data['amount'] = $_POST['amount'];
            $data['date'] = $_POST['date'];
            $data['mode'] = $_POST['mode'];
            $data['remarks'] = isset($_POST['remarks']) ? $_POST['remarks'] : '';
            $data['verified'] = 'false';
            $data['verifiedBy'] = 'false';
            $data['paymentId'] = $this->model->genId('payments', 'PAY');
            $res = $this->model->postPayment($data);
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function getPayments() {
        $res['status'] = false;
        $payment = $this->model->getPayments(array('userId' => Session::get('userId')));
        if (!$payment['data'] == false && $payment['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $payment['data'];
        }
        echo json_encode($res);
    }

    public function postAcademic() {
        $res['status'] = false;
        try {
            $data['userId'] = Session::get('userId');
            $data['instituteId'] = $_POST['instituteId'];
            $data['session'] = isset($_POST['session']) ? $_POST['session'] : 'null';
            $data['branch'] = isset($_POST['branch']) ? $_POST['branch'] : '';
            $data['studentId'] = isset($_POST['studentId']) ? $_POST['studentId'] : '';
            $res = $this->model->postAcademic($data);
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function changePassword() {
        $res['status'] = false;
        try {
            if ($_POST['pswd'] == $_POST['cPswd']) {
                $data['userId'] = $_POST['userId'];
                $data['hPswd'] = $_POST['pswd'];
                $data['hPswd'] = Hash::create('md5', $_POST['pswd'], HASH_PSWD_KEY);
                $res = $this->model->changePassword($data);
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function changeProfileImage() {
        $res['status'] = false;
        try {
            $res = $this->model->changeFile('image', $_POST['fileId'], $_POST['code'], $_POST['type'], $_POST['caption'], 'account', FILE_TYPE_IMAGE);
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function changeEmail() {
        $res['status'] = false;
        try {
            $data['emailId'] = $_POST['emailId'];
            $data['email'] = $_POST['email'];
            $data['code'] = 'account-email';
            $data['type'] = 'default';
            $email = $this->model->getEmail($data['emailId']);
            if ($email['status']) {
                $changeEmail = $this->model->changeEmail($data);
                if ($changeEmail['status']) {
                    $res['status'] = !$res['status'];
                }
            } else {
                $createEmail = $this->model->createEmail($data);
                if ($createEmail['status']) {
                    $res['status'] = !$res['status'];
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function googleSignIn() {
        $res['status'] = false;
        try {
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];
            $data['image'] = $_POST['image'];
            $user['hPswd'] = Hash::create('md5', $_POST['pswd'], HASH_PSWD_KEY);
            $user['agreement'] = isset($_POST['agreement']) ? 'true' : 'false';
            $user['fName'] = $_POST['fName'];
            $user['verification']['email'] = 'true' ? true : false;
            $user['verification']['phone'] = false;
            $user['userId'] = $this->model->genId('users', 'UR');
            if ($user['agreement'] == 'true' && $this->model->check_email($data['email'])['status'] == false && $this->model->check_phone($data['phone'])['status'] == false) {
                $signIn = $this->model->googleSignIn($data);
                if ($signIn['status']) {
                    if ($this->model->initLogin($user)['status']) {
                        $res['status'] = !$res['status'];
                        $res['data']['redirect'] = account . 'profile';
                    }
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

}
