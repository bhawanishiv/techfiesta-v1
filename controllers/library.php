<?php

class Library extends Controller {

    function __construct() {
        parent::__construct();
                $this->view->web['title'] = $this->getPageTitle((get_class($this))) . ' - ' . $this->view->web['title'];
    }

    public function index() {
        $this->view->render('developer/index');
    }

    public function getLanguage() {
        $res['data'] = Session::get('lang');
        echo json_encode($res);
    }

    public function setLanguage() {
        Session::set('lang', $_POST['lang']);
        $this->getWebContent();
    }

    public function getWebContent() {
        try {
            $data = $this->model->getWebContent();
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($data);
        }
    }

    public function getCarousel() {
        try {
            $data = $this->model->getCarousel();
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($data);
        }
    }

    public function setSession() {
        $res['status'] = false;
        if (!isset($_SESSION)) {
            Session_start();
        }
        Session::set($_POST['type'], $_POST['value']);
        if (Session::get($_POST['type']) == $_POST['value']) {
            $res['status'] = !$res['status'];
        }
        echo json_encode($res);
    }

    public function setLangSession() {
        Session::set('lang', $_POST['lang']);
    }

    public function lang() {
        $response['status'] = false;
        $lang = $_POST['lang'];
        echo json_encode($lang);
        if (Session::set('lang', (isset($lang) or ! empty($lang)) ? $lang : 'EN')) {
            $response['status'] = true;
        }
    }

    public function verifyOTP() {
        try {
            $res['status'] = false;
            $data['otp'] = $_POST['otp'];
            $data['reference'] = $_POST['reference'];
            $otp = $this->model->getOTP($data);
            if (!$otp['data']['used'] == 'true') {
                $res['status'] = !$otp['status'];
                $res['data'] = $otp['data'];
            } else {
                $res['data']['code'] = 'otp-';
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($this->model->getOTP($data));
        }
    }

    public function sendMail($data) {
        $mail['to']['email'] = $data['email'];
        $mail['to']['name'] = isset($data['name']) ? $data['name'] : '';
        $mail['subject'] = $data['subject'];
        $mail['body'] = $data['body'];
        $mail['altBody'] = isset($data['altBody']) ? $data['altBody'] : '';
        $this->sendEMail($mail);
    }

    public function sendEMailDirect() {
        $mail['to']['email'] = $_POST['email'];
        $mail['to']['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $mail['subject'] = $_POST['subject'];
        $mail['body'] = $_POST['body'];
        $mail['altBody'] = isset($_POST['altBody']) ? $_POST['altBody'] : '';
        echo json_encode($this->sendEMail($mail)['status']);
    }

    public function processOTP() {
        try {
            $res['status'] = false;

            switch ($_POST['type']) {
                case 'generate' : $res = $this->generateOTP($_POST['email']);
                    break;
                case 'check':
                    $data = array('otpId' => $_POST['otpId'], 'otp' => $_POST['otp']);
                    $otp = $this->model->checkOTP($data);
                    if ($otp['status'] == 'true' && $otp['data']['used'] == 'false') {
                        $res = $this->model->useOTP($data);
                    }
                    break;
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            echo json_encode($res);
        }
    }

    public function generateOTP($email) {
        try {
            $res['status'] = false;
            $data['to']['email'] = $email;
            $otp = $this->postOTP();
            if ($otp['status']) {
                $otp['data']['email'] = $data['to']['email'];
                $data['to']['name'] = 'Techfiesta 3.0 user';
                $data['body'] = $this->prepareOTP($otp['data']);
                $data['subject'] = 'Techfiesta 3.0 - ' . $otp['data']['otp'] . ' is your OTP';
                if ($this->sendEMail($data)['status']) {
//                    $string = preg_replace("(?<=.).(?=.*@)", "*", $data['to']['email']);
//                    $otp['data']['email'] = preg_replace("(?<=@).[a-zA-Z0-9]*", "*", $string);
                    $otp['data']['otp'] = '';
                    $res['status'] = !$res['status'];
                    $res['data'] = $otp['data'];
                }
            }
        } catch (ErrorException $ex) {
            echo '<script>alert(' . $ex->getMessage() . ');</script>';
        } finally {
            return $res;
        }
    }

}
