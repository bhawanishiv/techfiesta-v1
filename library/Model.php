<?php

class Model {

    function __construct() {
        $this->db = new Database();
        $this->process = new Process();

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
    }

    public function dateNow($format = null) {
        date_default_timezone_set('Asia/Kolkata');
        $now = (!is_null($format) or ! empty($format)) ? date($format) : date('d-m-Y H:m:s');
        return $now;
    }

    public function countRow($table, $keyNValue = null) {
        $respose['stauts'] = false;
        $response['title'] = 'पंक्ति';
        $opr = (!is_null($keyNValue) or ! empty($keyNValue)) ? $this->Select($table)->Where($keyNValue)->Execute(1) : $this->Select($table)->Execute(1);
        $response['status'] = $opr['status'] ? !$respose['stauts'] : $respose['stauts'];
        $response['text'] = $opr['status'] ? 'पंक्तियाँ प्राप्त की जा चुकी हैं।' : 'प्रणाली में जानकारी के पंक्ति जुटाने की प्रक्रिया असफल रह गई।';
        $response['data'] = $opr['count'];
        return $response;
    }

    public function genId($table, $maxFour, $optional = null) {
        $count = ((int) $this->countRow($table)['data'] + 1);
        $m = strlen($maxFour);

        if ($m > 4) {
            $maxFour = substr($maxFour, 0, 4);
        }
        if (!is_null($optional) or ! empty($optional)) {
            $optional = substr($optional, 0, 4);
        } else {
            $optional = '';
        }
        $id = "TF" . $maxFour . $optional;
        $id .= str_pad($count, 12 - (strlen($id)), 0, STR_PAD_LEFT);
        return strtoupper($id);
    }

    public function postPayment($data) {
        $res['status'] = false;

        if (!$data['mode'] == 'upi') {
            $_payment = $this->Select('payments')->Where(array('remarks' => $data['remarks']))->Execute();
            if ($_payment['status'] == true && $_payment['data'] == false) {
                $payment = $this->Insert('payments')->Value(array('paymentId' => $data['paymentId'], 'userId' => $data['userId'], 'amount' => $data['amount'], 'mode' => $data['mode'], 'date' => $data['date'], 'remarks' => $data['remarks'], 'verified' => $data['verified'], 'verifiedBy' => $data['verifiedBy'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
                if ($payment['status']) {
                    $res['status'] = !$res['status'];
                    $res['data'] = $data;
                }
            }
        } else {
            $payment = $this->Insert('payments')->Value(array('paymentId' => $data['paymentId'], 'userId' => $data['userId'], 'amount' => $data['amount'], 'mode' => $data['mode'], 'date' => $data['date'], 'remarks' => $data['remarks'], 'verified' => $data['verified'], 'verifiedBy' => $data['verifiedBy'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
            if ($payment['status']) {
                $res['status'] = !$res['status'];
                $res['data'] = $data;
            }
        }
        return $res;
    }

    public function getAccomodations($where = null) {
        $res['status'] = false;
        $accomodations = $this->Select('accomodations')->Where(!is_null($where) ? $where : null)->Execute(!is_null($where) ? 1 : null);
        if ($accomodations['status']) {
            if (!is_null($where)) {
                $res['data'] = $accomodations['data'];
                $res['data']['user'] = $this->getUsers($accomodations['data']['userId'])['data'];
            } else {
                foreach ($accomodations['data'] as $data) {
                    $data['user'] = $this->getUsers($data['userId'])['data'];
                    $_data[] = $data;
                }
                $res['data'] = $_data;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getDepartments($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('departmentId', $where) || array_key_exists('headId', $where)) {
                $exc = 1;
            }
        }

        $departments = $this->Select('departments')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($departments['status']) {
            if (!is_null($where)) {
                $res['data'] = $departments['data'];
                $res['data']['head'] = $this->getUsers($departments['data']['headId'])['data'];
                $res['data']['image'] = $this->getFile($departments['data']['departmentId'])['data'];
            } else {
                foreach ($departments['data'] as $data) {
                    $data['head'] = $this->getUsers($data['headId'])['data'];
                    $data['image'] = $this->getFile($data['departmentId'])['data'];
                    $_data[] = $data;
                }
                $res['data'] = $_data;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getParticipation($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('participationId', $where)) {
                $exc = 1;
            }
        }
        $participation = $this->Select('participation')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($participation['status'] && $participation['data'] !== false && !empty($participation['data'])) {
            if (!is_null($where) && !is_array($participation['data'])) {
                $res['data'] = $participation['data'];
                $res['data']['participant'] = $this->getUsers($participation['data']['userId'])['data'];
                $res['data']['event'] = $this->getEvents(array('eventId' => $participation['data']['eventId']))['data'];
            } else {
                foreach ($participation['data'] as $data) {
                    $data['event'] = $this->getEvents(array('eventId' => $data['eventId']))['data'];
                    $data['participant'] = $this->getUsers($data['userId'])['data'];
                    $_data[] = $data;
                }
                $res['data'] = $_data;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getPayments($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('paymentId', $where)) {
                $exc = 1;
            }
        }

        $payments = $this->Select('payments')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($payments['status']) {
            if (!is_null($where) && !is_array($payments['data'])) {
                $res['data'] = $payments['data'];
                $res['data']['payee'] = $this->getUsers($payments['data']['userId'])['data'];
                $res['data']['payee']['academics'] = $this->getAcademics($payments['data']['userId'])['data'];
                if ($payments['data']['verified'] == 'true') {
                    $res['data']['verifiedBy'] = $this->getUsers($payments['data']['verifiedBy'])['data'];
                }
            } else {
                foreach ($payments['data'] as $data) {
                    $data['payee'] = $this->getUsers($data['userId'])['data'];
                    $data['payee']['academics'] = $this->getAcademics(array('userId' => $data['userId']))['data'];
                    $data['payee']['academics']['institute'] = $this->getInstitutes($data['payee']['academics']['instituteId'])['data'];
                    if ($data['verified'] == 'true') {
                        $data['verifiedBy'] = $this->getUsers($data['verifiedBy'])['data'];
                    }
                    $_data[] = $data;
                }
                $res['data'] = $_data;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getAcademics($where) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('userId', $where)) {
                $exc = 1;
            }
        }

        $academics = $this->Select('academics')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($academics['status'] && !$academics['data'] == false) {
            if (!is_null($academics['data'])) {
                $res['data'] = $academics['data'];
                $res['data']['institute'] = $this->getInstitutes($academics['data']['instituteId'])['data'];
            } else {
                foreach ($academics['data'] as $academic) {
                    $academic['institute'] = $this->getInstitutes($academic['instituteId'])['data'];
                    $_academic[] = $academic;
                }
                $res['data'] = $_academic;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getInstitutes($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            $exc = 1;
        }
        $institutes = $this->Select('institutes')->Where(!is_null($where) ? array('instituteId' => $where) : null)->Execute($exc);
        if ($institutes['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $institutes['data'];
        }
        return $res;
    }

    public function getHospitality($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            $exc = 1;
        }
        $res['status'] = false;
        $accomodations = $this->Select('accomodations')->Where(!is_null($where) ? array('userId' => $where) : null)->Execute($exc);
        if ($accomodations['status']) {
            if (!is_null($where)) {
                $res['data'] = $accomodations['data'];
                $res['data']['user'] = $this->getUsers($accomodations['data']['userId'])['data'];
                $res['data']['allowedBy'] = $this->getUsers($accomodations['data']['allowedBy'])['data'];
            } else {
                foreach ($accomodations['data'] as $accomodation) {
                    $accomodation['user'] = $this->getUsers($accomodation['userId'])['data'];
                    $accomodation['allowedBy'] = $this->getUsers($accomodation['allowedBy'])['data'];
                    $_accomodation[] = $accomodation;
                }
                $res['data'] = $_accomodation;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getParticipaionTeamMembers($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('teamId', $where)) {
                $exc = 1;
            }
        }
        $members = $this->Select('participationteam')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($members['status'] && $members['data'] !== false) {
            if (!is_null($where)) {
                $res['data'] = $members['data'];
                $res['data']['member'] = $this->getUsers($members['data']['memberId'])['data'];
                $res['data']['event'] = $this->getEvents(array('eventId' => $members['data']['eventId']))['data'];
            } else {
                foreach ($members['data'] as $member) {
                    $member['member'] = $this->getUsers($member['memberId'])['data'];
                    $member['eventId'] = $this->getDepartments(array('eventId' => $member['eventId']))['data'];
                    $_member[] = $member;
                }
                $res['data'] = $_member;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getTeamMembers($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('departmentId', $where) || array_key_exists('memberId', $where)) {
                $exc = 1;
            }
        }
        $members = $this->Select('team')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($members['status']) {
            if (!is_null($where)) {
                $res['data'] = $members['data'];
                $res['data']['member'] = $this->getUsers($members['data']['memberId'])['data'];
                $res['data']['department'] = $this->getDepartments(array('departmentId' => $members['data']['departmentId']))['data'];
            } else {
                foreach ($members['data'] as $member) {
                    $member['member'] = $this->getUsers($member['memberId'])['data'];
                    $member['department'] = $this->getDepartments(array('departmentId' => $member['departmentId']))['data'];
                    $_member[] = $member;
                }
                $res['data'] = $_member;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getEvents($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('eventId', $where) || array_key_exists('headId', $where)) {
                $exc = 1;
            }
        }
        $events = $this->Select('events')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($events['status']) {
            if (!is_null($where)) {
                $res['data'] = $events['data'];
                $res['data']['department'] = $this->getDepartments(array('departmentId' => $events['data']['departmentId']))['data'];
                $res['data']['dates'] = $this->Select('dates')->Where(array('eventId' => $events['data']['eventId']))->Execute()['data'];
                $res['data']['venues'] = $this->Select('venues')->Where(array('eventId' => $events['data']['eventId']))->Execute()['data'];
                $res['data']['image'] = $this->getFile($events['data']['eventId'])['data'];
                $res['data']['file'] = $this->getFile($events['data']['eventId'])['data'];
                $res['data']['head'] = $this->getUsers($events['data']['headId'])['data'];
            } else {
                foreach ($events['data'] as $event) {
                    $event['department'] = $this->getDepartments(array('departmentId' => $event['departmentId']))['data'];
                    $event['dates'] = $this->Select('dates')->Where(array('eventId' => $event['eventId']))->Execute()['data'];
                    $event['image'] = $this->getFile($event['eventId'])['data'];
                    $event['file'] = $this->getFile($event['eventId'])['data'];
                    $event['head'] = $this->getUsers($event['headId'])['data'];
                    $_events[] = $event;
                }
                $res['data'] = $_events;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getSchoolEvents($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            if (array_key_exists('schoolEventId', $where)) {
                $exc = 1;
            }
        }
        $events = $this->Select('scoolevents')->Where(!is_null($where) ? $where : null)->Execute($exc);
        if ($events['status']) {
            if (!is_null($where)) {
                $res['data'] = $events['data'];
                $res['data']['event'] = $this->getEvents(array('eventId' => $events['data']['eventId']))['data'];
                $res['data']['dates'] = $this->Select('dates')->Where(array('eventId' => $events['data']['schoolEventId']))->Execute()['data'];
                $res['data']['venues'] = $this->Select('venues')->Where(array('eventId' => $events['data']['schoolEventId']))->Execute()['data'];
                $res['data']['image'] = $this->getFile($events['data']['schoolEventId'])['data'];
                $res['data']['file'] = $this->getFile($events['data']['schoolEventId'])['data'];
            } else {
                foreach ($events['data'] as $event) {
                    $event['event'] = $this->getDepartments(array('eventId' => $event['eventId']))['data'];
                    $event['dates'] = $this->Select('dates')->Where(array('eventId' => $event['schoolEventId']))->Execute()['data'];
                    $event['venues'] = $this->Select('venues')->Where(array('eventId' => $event['schoolEventId']))->Execute()['data'];
                    $event['image'] = $this->getFile($event['schoolEventId'])['data'];
                    $event['file'] = $this->getFile($event['schoolEventId'])['data'];
                    $_events[] = $event;
                }
                $res['data'] = $_events;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getInstitutions($where) {
        $res['status'] = false;
        $sth = $this->Select('institutions')->Where($where)->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function getResources() {
        $res['status'] = false;
        $sth = $this->db->prepare('SELECT * FROM resources');
        if ($sth->execute()) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth->fetchAll();
        }
        return $res;
    }

    public function getUsers($where = null) {
        $res['status'] = false;
        $exc = null;
        if (!is_null($where)) {
            $exc = 1;
        }

        $users = $this->Select('users')->Field(array('fName', 'gender', ' addedOn', 'lastModifiedOn', 'userId', 'uName', 'type', 'agreement'))->Where(!is_null($where) ? array('userId' => $where) : null)->Execute($exc);
        if ($users['status'] && $users['data'] !== false) {
            if (!is_null($where)) {
                $res['data'] = $users['data'];
                $res['data']['permission'] = $this->Select('userpermission')->Where(array('userId' => $users['data']['userId']))->Execute(1)['data'];
                $res['data']['verification'] = $this->Select('userverification')->Where(array('userId' => $users['data']['userId']))->Execute(1)['data'];
                $res['data']['images'] = $this->getFile($users['data']['userId'])['data'];

                $phone = $this->getPhone($users['data']['userId']);
                $res['data']['phones'] = $phone['status'] && !$phone['data'] == false ? $phone['data'] : '';

                $email = $this->getEmail($users['data']['userId']);
                $res['data']['emails'] = $email['status'] && !$email['data'] == false ? $email['data'] : '';

                $acad = $this->getAcademics(array('userId' => $users['data']['userId']));
                $res['data']['academics'] = $acad['status'] && !$acad['data'] == false ? $acad['data'] : '';
            } else {
                foreach ($users['data'] as $data) {
                    $data['permission'] = $this->Select('userpermission')->Where(array('userId' => $data['userId']))->Execute(1)['data'];
                    $data['verification'] = $this->Select('userverification')->Where(array('userId' => $data['userId']))->Execute(1)['data'];
                    $data['images'] = $this->getFile($data['userId'])['data'];

                    $phone = $this->getPhone($data['userId']);
                    $data['phones'] = $phone['status'] && !$phone['data'] == false ? $phone['data'] : '';

                    $email = $this->getEmail($data['userId']);
                    $data['emails'] = $email['status'] && !$email['data'] == false ? $email['data'] : '';

                    $acad = $this->getAcademics(array('userId' => $data['userId']));
                    $data['academics'] = $acad['status'] && !$acad['data'] == false ? $acad['data'] : '';

                    $_data[] = $data;
                }
                $res['data'] = $_data;
            }
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getAddress($addressId) {
        $res['status'] = false;
        $sth = $this->Select('adresses')->Where(array('addressId' => $addressId))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function getEmail($emailId) {
        $res['status'] = false;
        $sth = $this->Select('emails')->Where(array('emailId' => $emailId))->Execute();
        if ($sth['status'] && !$sth['data'] == false) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function getPhone($phoneId) {
        $res['status'] = false;
        $sth = $this->Select('phones')->Where(array('phoneId' => $phoneId))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function getFile($fileId) {
        $res['status'] = false;
        $sth = $this->Select('files')->Where(array('fileId' => $fileId))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function getWebContent() {
        $lang = Session::get('lang');
        $data['socialMedia'] = $this->getSocialMedia()['data'];
        $data['data'] = $this->getWebData($lang)['data'];
        $data['actions'] = $this->getWebActions($lang)['data'];
        $data['forms'] = $this->getWebForms($lang)['data'];
        $data['links'] = $this->getWebLinks($lang)['data'];
        $data['response'] = $this->getWebResponse($lang)['data'];
        $data['organization'] = $this->getOrganization($lang)['data'];
        $res['data'] = $data;
        $res['status'] = true;
        return $res;
    }

    public function getSocialMedia() {
        return $this->Select('socialmedia')->Execute();
    }

    public function getWebForms($lang) {
        return $this->Select('webdataforms')->Where(array('lang' => $lang))->Execute(1);
    }

    public function getWebLinks($lang) {
        return $this->Select('webdatalinks')->Where(array('lang' => $lang))->Execute(1);
    }

    public function getWebResponse($lang) {
        return $this->Select('responses')->Where(array('lang' => $lang))->Execute();
    }

    public function getOrganization($lang) {
        return $this->Select('organization')->Where(array('lang' => $lang))->Execute(1);
    }

    public function getWebData($lang) {
        return $this->Select('webdata')->Where(array('lang' => $lang))->Execute(1);
    }

    public function getWebActions($lang) {
        return $this->Select('webdataactions')->Where(array('lang' => $lang))->Execute(1);
    }

    public function postOTP($data) {
        $res['status'] = false;
        $sth = $this->Insert('otp')->Value(array('otpId' => $data['otpId'], 'otp' => $data['otp'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow(), 'used' => 'false'))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $data;
        }
        return $res;
    }

    public function checkOTP($data) {
        $res['status'] = false;
        $sth = $this->Select('otp')->Where(array('otpId' => $data['otpId'], 'otp' => $data['otp']))->Execute(1);
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function useOTP($data) {
        $res['status'] = false;
        $sth = $this->db->prepare('UPDATE otp SET used=:used, lastModifiedOn=:lastModifiedOn WHERE otp=:otp and otpId=:otpId');
        $otp = $sth->execute(array(':used' => 'true', ':lastModifiedOn' => $this->dateNow(), ':otp' => $data['otp'], ':otpId' => $data['otpId']));
        if ($otp) {
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getOTP($data) {
        $res['status'] = false;
        $sth = $this->Select('otp')->Where(array('otp' => $data['otp'], 'otpId' => $data['otpId']))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function putOTP($data) {
        $res['status'] = false;
        $sth = $this->db->prepare('UPDATE otp SET lastModifieOn=:lastModifieOn, used=:used WHERE otp=:otp and otpId=:otpId');
        if ($sth->execute(array('lastModifieOn' => $this->dateNow(), ':otp' => $data['otp'], 'otpId' => $data['otpId']))) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth->fetchAll();
        }
        return $res;
    }

    public function postMail($data) {
        $res['status'] = false;
        $sth = $this->Insert('sentmails')->Value(array('mId' => $data['mId'], 'lang' => $data['lang'], 'name' => $data['name'], 'to' => $data['to'], 'cc' => $data['cc'], 'bcc' => $data['bcc'], 'code' => $data['code'], 'subject' => $data['subject'], 'content' => $data['content'], 'addedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function changeEmail($data) {
        $res['status'] = false;
        $changeEmail = $this->Update('emails')->Set(array('email' => $data['email'], 'lastModifiedOn' => $this->dateNow()))->Where(array('emailId' => $data['emailId']))->Execute();
        if ($changeEmail['status']) {
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function changeFile($file, $fileId, $code, $type, $caption, $directory, $fileTypes = false) {
        $res['status'] = false;
        $nFile = URL . 'public/uploads/' . $directory . $_FILES[$file]['name'];
        if (file_exists($nFile)) {
            if (rename($nFile, $nFile . $this->dateNow('y_m_d_H_m_s'))) {
                $res['status'] = !$res['status'];
            }
        } else {
            $moveFile = $this->moveFile($file, $fileId, $directory, $fileTypes);
            if ($moveFile['status']) {
                $_file = $this->Select('files')->Where(array('fileId' => $fileId, 'type' => $type))->Execute(1);
                if ($_file['status'] && !$_file['data'] == false) {
                    $changeFile = $this->Update('files')->Set(array('source' => $moveFile['data']['source'], 'lastModifiedOn' => $this->dateNow()))->Where(array('fileId' => $fileId, 'type' => $type))->Execute();
                    if ($changeFile['status']) {
                        $res['status'] = !$res['status'];
                    }
                } else {
                    $data = array('fileId' => $fileId, 'code' => $code, 'source' => $moveFile['data']['source'], 'type' => $type, 'caption' => $caption);
                    $postFile = $this->postFile($data);
                    if ($postFile['status']) {
                        $res['status'] = !$res['status'];
                    }
                }
            } else {
                $res = $moveFile;
            }
        }
        return $res;
    }

    public function moveFile($file, $fileId, $directory, $fileTypes = false) {
        $res['status'] = false;
        $root = 'public/uploads/' . $directory;
        $this->checkNCreateDir($root);
        $main = $_FILES[$file]['name'];
        $ext = strtolower(pathinfo($main, PATHINFO_EXTENSION));
        $loc = $root . '/' . $fileId . '.' . $ext;
        if (in_array($ext, $fileTypes)) {
            if (move_uploaded_file($_FILES[$file]['tmp_name'], $loc)) {
                $res['data']['source'] = $loc;
                $res['status'] = !$res['status'];
            }
        } else {
            $res['code'] = 'error-fileType';
        }
        return $res;
    }

    public function uploadFile($file, $fileId, $code, $type, $caption, $directory, $fileTypes = false) {
        $res['status'] = false;
        $uploadFile = $this->moveFile($file, $fileId, $directory, $fileTypes);
        if ($uploadFile['status']) {
            $data = array('fileId' => $fileId, 'code' => $code, 'source' => $uploadFile['data']['source'], 'type' => $type, 'caption' => $caption);
            $file = $this->postFile($data);
            if ($file['status']) {
                $res['status'] = !$res['status'];
                $res['data'] = $data;
            }
        } else {
            $res = $uploadFile;
        }
        return $res;
    }

    public function postFile($data) {
        $res['status'] = false;
        if ($this->Insert('files')
                        ->Value(array(
                            'fileId' => $data['fileId'],
                            'code' => $data['code'],
                            'source' => $data['source'],
                            'type' => $data['type'],
                            'caption' => $data['caption'],
                            'addedOn' => $this->dateNow(),
                            'lastModifiedOn' => $this->dateNow()))->Execute()['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $data;
        }
        return $res;
    }

    public function checkNCreateDir($root) {
//Check root
        if (!is_dir('./' . $root)) {
            mkdir('./' . $root, 0777, true);
        }
    }

    public function autoPopularRatio($pId) {
        $response['status'] = false;
        $n = $this->checkPopularRatio($pId);
        if ((int) $n === 0) {
            if ($this->setPopuluarRatio($pId)) {
                $response['status'] = !$response['status'];
            }
        }
        return $response;
    }

    public function checkPopularRatio($pId, $all = false) {
        $pIP = $this->process->getRealIpAddr();
        $popularRatio = (!is_null($all) or ! empty($all) && !$all == false) ? array('pIP' => $pIP) : null;
        $popularRatio['pId'] = $pId;
        $view = $this->countRow('popularratio', $popularRatio)['data'];
        return $view;
    }

    public function setPopuluarRatio($pId) {
        $response['status'] = false;
        $pIP = $this->process->getRealIpAddr();
        $sth = $this->Insert('popularratio')->Value(array('pId' => $pId, 'pIP' => $pIP, 'pAddedOn' => $this->dateNow()))->Execute();
        if ($sth['status'] == true) {
            $response['status'] = !$response['status'];
        }
        return $response;
    }

    public function readFile() {
        $file = file_get_contents(URL . 'public/composition.docx', FILE_USE_INCLUDE_PATH);
        print_r($file);
    }

    protected $qb;

    public function Select($table) {
        $this->qb = new Query();
        $this->qb->operation = 'SELECT';
        $this->qb->select['table'] = $table;
        return $this;
    }

    public function Field($fields) {
        $this->qb->select['fields'] = $fields;
        return $this;
    }

    public function Where($keyNValue, $operator = null, $match = null) {
        switch ($this->qb->operation) {
            case 'SELECT':$this->qb->select['keyNValue'] = $keyNValue;
                $this->qb->select['operator'] = (is_null($operator) or empty($operator) ) ? ' = ' : ' ' . $operator . ' ';
                $this->qb->select['match'] = (is_null($match) or empty($match)) ? ' AND ' : ' ' . $match . ' ';

            case 'UPDATE':$this->qb->update['keyNValue'] = $keyNValue;
                $this->qb->update['operator'] = (is_null($operator) or empty($operator) ) ? ' = ' : ' ' . $operator . ' ';
                $this->qb->update['match'] = (is_null($match) or empty($match)) ? ' AND ' : ' ' . $match . ' ';
        }
        return $this;
    }

    public function OrderBy($colNOrder) {
        foreach ($colNOrder as $key => $value) {
            $this->qb->select['orderBy'] = $key . ' ' . ((is_null($value) or empty($value) ) ? ' ASC ' : $value);
        }
        return $this;
    }

    public function Insert($table) {
        $this->qb = new Query();
        $this->qb->operation = 'INSERT';
        $this->qb->insert['table'] = $table;
        return $this;
    }

    public function Value($keyNValue) {
        $this->qb->insert['keyNValue'] = $keyNValue;
        return $this;
    }

    public function Update($table) {
        $this->qb = new Query();
        $this->qb->operation = 'UPDATE';
        $this->qb->update['table'] = $table;
        return $this;
    }

    public function Set($keyNValue) {
        $this->qb->update['setKeyNValue'] = $keyNValue;
        return $this;
    }

    public function _select() {
        $select = 'SELECT ';
        $select .= empty($this->qb->select['fields']) ? ' * ' : implode(', ', $this->qb->select['fields']);
        $select .= ' from ' . $this->qb->select['table'];
        $keyNValue = isset($this->qb->select['keyNValue']) ? $this->qb->select['keyNValue'] : null;
        if (!empty($keyNValue)) {
            foreach ($keyNValue as $key => $value) {
                $args[] = $key . $this->qb->select['operator'] . ':' . $key . ' ';
            }
        }
        $select .= empty($keyNValue) ? '' : ' WHERE ' . implode($this->qb->select['match'], $args);
        $select .= empty($this->qb->select['order']) ? '' : ' ORDER BY ' . implode(', ', $this->qb->select['order']);
        return array('qry' => $select, 'params' => $keyNValue);
    }

    public function _insert() {
        $insert = 'INSERT INTO ' . $this->qb->insert['table'];
        $data = $this->qb->insert['keyNValue'];
        if (!empty($data)) {
            $_key = ' ( ' . implode(', ', array_keys($data)) . ' ) ';
            foreach ($data as $key => $val) {
                $keys[] = ':' . $key;
            }
            $__key = ' ( ' . implode(', ', $keys) . ' ) ';
            $insert .= $_key . ' VALUES ' . $__key;
        }
        return array('qry' => $insert, 'params' => $data);
    }

    public function _update() {
        $update = 'UPDATE ' . $this->qb->update['table'];
        $setKeyNValue = isset($this->qb->update['setKeyNValue']) ? $this->qb->update['setKeyNValue'] : null;
        if (!empty($setKeyNValue)) {
            foreach ($setKeyNValue as $key => $value) {
                $set[] = $key . '=:' . $key;
            }
        }
        $update .= $setKeyNValue == null ? '' : ' SET ' . implode(', ', $set);
        if (!empty($this->qb->update['keyNValue'])) {
            foreach ($this->qb->update['keyNValue'] as $key => $value) {
                $args[] = $key . $this->qb->update['operator'] . ':' . $key . ' ';
            }
        }
        $update .= empty($this->qb->update['keyNValue']) ? '' : ' WHERE ' . implode($this->qb->update['match'], $args);
        return array('qry' => $update, 'params' => $setKeyNValue + $this->qb->update['keyNValue']);
    }

    public function Execute($fetch = null) {
        switch ($this->qb->operation) {
            case 'SELECT':
                $getData = (!is_null($fetch) or ! empty($fetch)) ? $fetch : null;
                return $this->qb->Execute($this->_select(), 1, $getData);
            case 'INSERT':
                return $this->qb->Execute($this->_insert());
            case 'UPDATE':
                return $this->qb->Execute($this->_update());
        }
    }

}

class Query {

    public $operation;
    public $select;
    public $insert;
    public $update;

    function __construct() {
        $this->db = new Database();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function Execute($qry, $return = null, $fetch = null) {
        $res['status'] = false;
        $params = array();
        $sth = $this->db->prepare($qry['qry']);
        if (!is_null($qry['params'])) {
            foreach ($qry['params'] as $key => $value) {
                $params[':' . $key] = $value;
            }
        }
        $opr = $sth->execute($params);
//        echo json_encode($qry);
        if ($opr) {
            if (!is_null($return) or ! empty($return)) {
                $res['data'] = (!is_null($fetch) or ! empty($fetch)) ? $sth->fetch(PDO::FETCH_ASSOC) : $sth->fetchAll();
                $res['count'] = $sth->rowCount();
                $res['qry'] = $qry;
            }
            $res['status'] = $opr;
        }
        return $res;
//        return $qry;
    }

}
