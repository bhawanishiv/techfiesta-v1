<?php

class Account_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_email($email) {
        $e = $this->Select('emails')->Field(array('emailId', 'email'))->Where(array('email' => $email))->Execute(1);
        return $e;
    }

    public function check_phone($phone) {
        $p = $this->Select('phones')->Field(array('phoneId', 'phone'))->Where(array('phone' => $phone))->Execute(1);
        return $p;
    }

    public function check_password($data) {
        $res['status'] = false;
        $sth = $this->db->prepare('SELECT `userId` FROM users WHERE userId=:userId AND hPswd=:hPswd');
        $sth->execute(array(
            ':userId' => $data['userId'],
            ':hPswd' => Hash::create('md5', $data['pswd'], HASH_PSWD_KEY)
        ));
        $pswd = $sth->fetch(PDO::FETCH_ASSOC);
        if ($pswd) {
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function check_phoneNPassword($data) {
        $res['status'] = false;
        $user = $this->Select('users')->Field(array('userId', 'uFName'))->Where(array('uHPswd' => Hash::create('md5', $data['uPswd'], HASH_PSWD_KEY)))->Execute(1);
        $sth = $this->db->prepare('SELECT `phone` FROM phones WHERE phoneId=:phoneId AND phone=:phone AND code=:code');
        $sth->execute(array(
            ':code' => 'account-phone',
            ':phone' => $data['phone'],
            ':phoneId' => $user['data']['userId']
        ));
        $phone = $sth->fetchAll();
        if ($user['status'] && $phone) {
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function checkPermission($data) {
//        $permission = $this->Select('userpermission')->Field(array('userId'))->Where(array('userId' => $data['userId']))->Execute();
        $res['status'] = false;
        $sth = $this->db->prepare('SELECT `userId`, `account`, `email`, `password`, `phone` FROM `userpermission` WHERE userId=:userId');
        $sth->execute(array(
            ':userId' => $data['userId'],
        ));
        $res['data'] = $sth->fetch(PDO::FETCH_ASSOC);
        if ($res['data']) {
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function createUser($data) {
        $res['status'] = false;
        $image = $this->uploadFile('image', $data['userId'], 'account-profile-image', 'default', $data['fName'], 'account', FILE_TYPE_IMAGE);
        if ($image['status']) {
            $email = $this->createEmail(array('emailId' => $data['userId'], 'email' => $data['email'], 'code' => 'account-email', 'type' => 'default'));
            if ($email['status']) {
                $phone = $this->createPhone(array('phoneId' => $data['userId'], 'phone' => $data['phone'], 'code' => 'account-phone', 'type' => 'default'));
                if ($phone['status']) {
                    $permission = $this->insertPermission(array('userId' => $data['userId'], 'account' => 'true', 'email' => 'true', 'phone' => 'true', 'password' => 'true'));
                    if ($permission['status']) {
                        $verification = $this->insertVerification
                                (array('userId' => $data['userId'],
                            'account' => $data['verification']['email'] && $data['verification']['phone'] ? 'true' : 'false',
                            'email' => $data['verification']['email'] ? 'true' : 'false',
                            'phone' => $data['verification']['phone'] ? 'true' : 'false'));
                        if ($verification['status']) {
                            $user = $this->Insert('users')->Value(array('userId' => $data['userId'], 'gender' => $data['gender'], 'uName' => $data['email'], 'hPswd' => $data['hPswd'], 'fName' => $data['fName'], 'agreement' => $data['agreement'], 'type' => 'user', 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
                            if ($user['status']) {
                                $res['status'] = !$res['status'];
                            }
                        }
                    }
                }
            }
        }
        return $res;
    }

    public function googleSignIn($data) {
        $res['status'] = false;
        $image = $this->model->postFile(array('fileId' => $data['userId'], 'code' => 'account-profile-image', 'source' => $data['image'], 'type' => 'image', 'caption' => $data['fName']));
        if ($image['status']) {
            $email = $this->createEmail(array('emailId' => $data['userId'], 'email' => $data['email'], 'code' => 'account-email', 'type' => 'default'));
            if ($email['status']) {
                $phone = $this->createPhone(array('phoneId' => $data['userId'], 'phone' => $data['phone'], 'code' => 'account-phone', 'type' => 'default'));
                if ($phone['status']) {
                    $permission = $this->insertPermission(array('userId' => $data['userId'], 'account' => 'true', 'email' => 'true', 'phone' => 'true', 'password' => 'true'));
                    if ($permission['status']) {
                        $verification = $this->insertVerification
                                (array('userId' => $data['userId'],
                            'account' => $data['verification']['email'] && $data['verification']['phone'] ? 'true' : 'false',
                            'email' => $data['verification']['email'] ? 'true' : 'false',
                            'phone' => $data['verification']['phone'] ? 'true' : 'false'));
                        if ($verification['status']) {
                            $user = $this->Insert('users')->Value(array('userId' => $data['userId'], 'uName' => $data['email'], 'hPswd' => $data['hPswd'], 'fName' => $data['fName'], 'agreement' => $data['agreement'], 'type' => 'user', 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
                            if ($user['status']) {
                                $res['status'] = !$res['status'];
                            }
                        }
                    }
                }
            }
        }
        return $res;
    }

    public function insertVerification($data) {
        return $this->Insert('userverification')->Value(array('userId' => $data['userId'], 'account' => $data['account'], 'email' => $data['email'], 'phone' => $data['phone'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
    }

    public function insertPermission($data) {
        return $this->Insert('userpermission')->Value(array('userId' => $data['userId'], 'account' => $data['account'], 'email' => $data['email'], 'password' => $data['password'], 'phone' => $data['phone'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
    }

    public function initLogin($data) {
        $res['status'] = false;
        Session::destroy();
        Session::init();
        Session::set('loggedIn', true);
        Session::set('userId', $data['userId']);
        if (Session::get('userId') == $data['userId']) {
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function getPermission($userId) {
        return $this->Select('userpermission')->Where(array('userId' => $userId))->Execute(1);
    }

    public function getVerification($userId) {
        return $this->Select('userverification')->Where(array('userId' => $userId))->Execute(1);
    }

    public function createEmail($data) {
        $res['status'] = false;
        $email = $this->Insert('emails')->Value(array('emailId' => $data['emailId'], 'email' => $data['email'], 'code' => $data['code'], 'type' => $data['type'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($email['status']) {
            $res['status'] = !$res['status'];
            $res['data']['email'] = $data['email'];
        }
        return $res;
    }

    public function createPhone($data) {
        $res['status'] = false;
        $phone = $this->Insert('phones')->Value(array('phoneId' => $data['phoneId'], 'phone' => $data['phone'], 'code' => $data['code'], 'type' => $data['type'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($phone['status']) {
            $res['status'] = !$res['status'];
            $res['data']['phone'] = $data['phone'];
        }
        return $res;
    }

    public function updateEmail($data) {
        $res['status'] = false;
        if ($this->check_email($data['email'])['status']) {
            $sth = $this->Update('emails')->Set(array('email' => $data['email']))->Where(array('emailId' => $data['emailId']))->Execute();
            if ($sth['status']) {
                $res['data'] = $this->Select('email')->Where(array('emailId' => $data['emailId']))['data'];
                $res['status'] = !$res['status'];
            }
        }
        return $res;
    }

    public function updatePhone($data) {
        $response['status'] = false;
        if ((int) $this->check_phone($data) >= 1) {
            
        } else {
            $sth = $this->Update('users')->Set(array('uPhone' => $data['uPhone']))->Where(array('userId' => $data['userId']))->Execute();
            if ($sth['status']) {
                $response['data'] = $data['uPhone'];
                $response['status'] = !$response['status'];
            }
        }
        return $response;
    }

    public function updateFName($data) {
        $response['status'] = false;
        $sth = $this->Update('users')->Set(array('uFName' => $data['uFName']))->Where(array('userId' => $data['userId']))->Execute();
        if ($sth['status']) {
            $response['data'] = $data['uFName'];
            $response['status'] = !$response['status'];
        }
        return $response;
    }

    public function changePassword($data) {
        $res['status'] = false;
        $permission = $this->Select('userpermission')->Where(array('userId' => $data['userId']))->Execute(1);
        if ($permission['status'] && $permission['data']['account'] && $permission['data']['password']) {
            $sth = $this->db->prepare('UPDATE users SET hPswd=:hPswd, lastModifiedOn=:lastModifiedOn WHERE userId=:userId');
            $pswd = $sth->execute(array(':hPswd' => $data['hPswd'], 'lastModifiedOn' => $this->dateNow(), ':userId' => $data['userId']));
            if ($pswd) {
                $res['status'] = !$res['status'];
            }
        }
        return $res;
    }

    public function postAcademic($data) {
        $res['status'] = false;
        $email = $this->Insert('academics')->Value(array('userId' => $data['userId'], 'instituteId' => $data['instituteId'], 'session' => $data['session'], 'branch' => $data['branch'], 'studentId' => $data['studentId'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($email['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $data;
        }
        return $res;
    }

}
