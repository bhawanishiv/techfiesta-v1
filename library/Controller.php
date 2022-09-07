<?php

class Controller {

    function __construct() {

        $this->view = new View();
        $this->Model = new Model();
        if (!isset($_SESSION)) {
            Session_start();
        }
        if (Session::get('lang') === false) {
            $language = 'EN';
            Session::set('lang', $language);
        } else {
            $language = Session::get('lang');
        }
        $this->setMeta();
        $this->setStyles();
        $this->view->user = $this->getUser()['status'] !== false ? $this->getUser()['data'] : '';
    }

    public function loadModel($name) {
        $path = 'models/' . $name . '_model.php';
        if (file_exists($path)) {
            require 'models/' . $name . '_model.php';
            $modelName = ucwords($name) . '_Model';
            $this->model = new $modelName();
        }
    }

    public function setMeta() {
        $webContent = $this->Model->getWebContent()['data'];
        $resources = $this->getResources()['data'];
        $a = explode(';', $resources[1]['value']);
        $gSignInScope = explode(':', $a[0])[1];
        $gSignInClientId = explode(':', $a[1])[1];
        $this->view->web = array(
            'themeColor' => $resources[2]['value'],
            'title' => $webContent['organization']['name'],
            'description' => $webContent['organization']['description'],
            'keywords' => $resources[5]['value'],
            'imageUrl' => URL . $resources[6]['value'],
            'imageAlt' => $webContent['organization']['name'],
            'author' => $resources[4]['value'],
            'gSignInScope' => $gSignInScope,
            'gSignInClientId' => $gSignInClientId,
            'fbAppId' => $resources[3]['value'],
            'twitter' => $webContent['socialMedia'][1]['link'],
            'url' => $_SERVER['REQUEST_URI'],
            'icon' => URL . 'public/images/techfiesta_3_0_logo_color.ico',
        );
    }

    public function setStyles() {
        $this->view->web['styles'] = array(
            'materialIcons' => 'https://fonts.googleapis.com/icon?family=Material+Icons',
            'main' => URL . 'public/styles/materialize.min.css',
            'techfiesta' => URL . 'public/styles/techfiesta.css',
            'fonts' => URL . 'public/fonts/font.css',
            'icon' => URL . 'public/fonts/icon.css',
            'projectRationIcon' => URL . 'public/fonts/public/fonts/projectRatioIcons/projectRatioIcons.css',
            'companyIcons' => URL . 'public/fonts/projectRatioIcons/projectRatioCompanyIcons.css');
    }

    public function getUser() {
        return $this->Model->getUsers(Session::get('userId'));
    }

    public function getPageTitle($class) {
        $title = $class;
        return $title;
    }

    public function getURL() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        return $url;
    }

    public function getResources() {
        return $this->Model->getResources();
    }

    public function sendEMail($mail) {
        $res['status'] = false;
        $from = $this->getResources()['data'];
        $a = explode(';', $from[0]['value']);
        $b = explode(':', $a[0]);
        $c = explode(':', $a[1]);
        $d = explode(':', $a[2]);
        $data['from']['name'] = $b[1];
        $data['from']['username'] = $c[1];
        $data['from']['password'] = $d[1];

        $data['to']['email'] = $mail['to']['email'];
        $data['to']['name'] = isset($mail['to']['name']) ? $mail['to']['name'] : '';
        $data['subject'] = $mail['subject'];
        $data['body'] = $mail['body'];
        $data['altBody'] = isset($mail['altBody']) ? $mail['altBody'] : '';

        if (Mail::send($data)['status']) {
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function genOTP() {
//        $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '0123456789';
        $otp = str_shuffle($string);
        $res['otp'] = substr($otp, 0, 6);
        $res['otpId'] = $this->model->genId('otp', 'OTP');
        return $res;
    }

    public function postOTP() {
        return $this->model->postOTP($this->genOTP());
    }

    public function prepareOTP($data) {
        $body = '<p>Hi!</p>
                        <h3>Welcome to Techifiesta 3.0</h3>
                        <p>We have sent email to "' . $data['email'] . '".</p>
                        <p>You OTP for OTP ID <strong>' . $data['otpId'] . '</strong> is: <strong>' . $data['otp'] . '</strong></p>
                        <p>&nbsp;</p>
                        <p>Thanking you!</p>
                        <p>&nbsp;</p>
                        <p><img src="http://www.techfiesta.org/public/images/techfiesta_full_color.png" alt="Techfiesta 3.0"/></p>
                        <p>Techfiesta</p>
                        <p><a href="https://www.techfiesta.org">www.techfiesta.org</a></p>
                        <p>&nbsp;</p>';
        return $body;
    }

    public function generatePDF($_file = null) {

        $logo = !isset($_file['logo']) || empty($_file['logo']) ? 'public/images/techfiesta_full_color.png' : $_file['logo'];
        $title = !isset($_file['title']) || empty($_file['title']) ? 'Techfiesta 3.0' : $_file['title'];
        $subTitle = !isset($_file['subTitle']) || empty($_file['subTitle']) ? 'Techfiesta 3.0 - 27, 28 & 29 Nov, 2018' : $_file['subTitle'];
        $keywords = !isset($_file['keyword']) || empty($_file['keyword']) ? 'Techfiesta 3.0, Document' : $_file['keyword'];

        // create new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Bhawani Shankar Bharti');
        $pdf->SetTitle($title . ' - Techfiesta 3.0');
        $pdf->SetSubject(empty($subTitle) ? 'Techfiesta 3.0' : $subTitle);
        $pdf->SetKeywords($keywords);

        // set header data
        $pdf->SetHeaderData($logo, PDF_HEADER_LOGO_WIDTH, $title, $subTitle);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//// set some language-dependent strings (optional)
//if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//    require_once(dirname(__FILE__).'/lang/eng.php');
//    $pdf->setLanguageArray($l);
//}
// ---------------------------------------------------------
        // set font
        $pdf->SetFont('helvetica', '', 12);

        // add a page
        $pdf->AddPage();

        // column titles
        $headers = $_file['headers'];


        // print colored table
        $pdf->ColoredTable($headers, $_file['data']);

        ob_end_clean();

        // ---------------------------------------------------------
        // close and output PDF document
        $pdf->Output($title . ' - Techfiesta 3.0.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
    }

}
