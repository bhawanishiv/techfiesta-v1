<?php

class Dashboard_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getMessages() {
        $res['status'] = false;
        $sth = $this->Select('messages')->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth['data'];
        }
        return $res;
    }

    public function getUserPermission($userId) {
        $res['status'] = false;
        $sth = $this->db->prepare('SELECT * FROM userpermission WHERE userId=:userId');
        if ($sth->execute(array(':userId' => $userId))) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth->fetch(PDO::FETCH_ASSOC);
        }
        return $res;
    }

    public function getUserVerification($userId) {
        $res['status'] = false;
        $sth = $this->db->prepare('SELECT * FROM userverification WHERE userId=:userId');
        if ($sth->execute(array(':userId' => $userId))) {
            $res['status'] = !$res['status'];
            $res['data'] = $sth->fetch(PDO::FETCH_ASSOC);
        }
        return $res;
    }

    public function toggleUserPermission($userId) {
        $permission = $this->Select('userpermission')->Where(array('userId' => $userId))->Execute(1)['data'];
        $sth = $this->db->prepare('UPDATE userpermission SET account=:account, lastModifiedOn=:lastModifiedOn WHERE userId=:userId');
        return $sth->execute(array(':lastModifiedOn' => $this->dateNow(), ':account' => $permission['account'] == 'true' ? 'false' : 'true', ':userId' => $userId));
    }

    public function toggleUserType($userId) {
        $user = $this->Select('users')->Where(array('userId' => $userId))->Execute(1)['data'];
        return $this->Update('users')->Set(array('type' => $user['type'] == 'admin' ? 'user' : 'admin', 'lastModifiedOn' => $this->dateNow()))->Where(array('userId' => $userId))->Execute();
    }

    public function togglePaymentVerification($data) {
        $payment = $this->Select('payments')->Where(array('paymentId' => $data['paymentId']))->Execute(1)['data'];
        return $this->Update('payments')->Set(array('verified' => $payment['verified'] == 'true' ? 'false' : 'true', 'verifiedBy' => $payment['verified'] == 'true' ? 'false' : $data['verifiedBy'], 'lastModifiedOn' => $this->dateNow()))->Where(array('paymentId' => $data['paymentId']))->Execute();
    }

    public function toggleAccomodationAllowance($data) {
        $accomodation = $this->Select('accomodations')->Where(array('accomodationId' => $data['accomodationId']))->Execute(1)['data'];
        return $this->Update('accomodations')->Set(array('allowed' => $accomodation['allowed'] == 'true' ? 'false' : 'true', 'allowedBy' => $accomodation['allowed'] == 'true' ? 'false' : $data['allowedBy'], 'lastModifiedOn' => $this->dateNow()))->Where(array('accomodationId' => $data['accomodationId']))->Execute();
    }

    public function updateDepartment($data) {
        return $this->Update('departments')->Set(array('headId' => $data['headId'], 'name' => $data['name'], 'type' => $data['type'], 'lastModifiedOn' => $this->dateNow()))->Where(array('departmentId' => $data['departmentId']))->Execute();
    }

    public function updateEvent($data) {
        return $this->Update('events')->Set(array('headId' => $data['headId'], 'departmentId' => $data['departmentId'], 'name' => $data['name'], 'about' => $data['about'], 'challenge' => $data['challenge'], 'lastModifiedOn' => $this->dateNow()))->Where(array('eventId' => $data['eventId']))->Execute();
    }

    public function updateTeam($data) {
        return $this->Update('team')->Set(array('memberId' => $data['memberId'], 'departmentId' => $data['departmentId'], 'role' => $data['role'], 'lastModifiedOn' => $this->dateNow()))->Where(array('departmentId' => $data['departmentId']))->Execute();
    }

    public function postTeamMember($data) {
        $res['status'] = false;
        $sth = $this->Insert('team')->Value(array('departmentId' => $data['departmentId'], 'memberId' => $data['memberId'], 'role' => $data['role'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function postDepartment($data) {
        $res['status'] = false;
        $sth = $this->Insert('departments')->Value(array('departmentId' => $data['departmentId'], 'headId' => $data['headId'], 'type' => $data['type'], 'name' => $data['name'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function postInstitute($data) {
        $res['status'] = false;
        $sth = $this->Insert('institutes')->Value(array('instituteId' => $data['instituteId'], 'name' => $data['name'], 'phone' => $data['phone'], 'email' => $data['email'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function postEvent($data) {
        $res['status'] = false;
        $sth = $this->Insert('events')->Value(array('eventId' => $data['eventId'], 'departmentId' => $data['departmentId'], 'headId' => $data['headId'], 'name' => $data['name'], 'about' => $data['about'], 'challenge' => $data['challenge'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = !$res['status'];
        }
        return $res;
    }
    public function postSchoolEvent($data) {
        $res['status'] = false;
        $sth = $this->Insert('schoolevents')->Value(array('eventId' => $data['eventId'], 'schoolEventId' => $data['schoolEventId'], 'headId' => $data['headId'], 'name' => $data['name'], 'about' => $data['about'], 'challenge' => $data['challenge'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = !$res['status'];
        }
        return $sth;
    }

  
    public function postEventDate($data) {
        $res['status'] = false;
        $sth = $this->Insert('dates')->Value(array('eventId' => $data['eventId'], 'date' => $data['date'], 'activity' => $data['activity'], 'start' => $data['start'], 'end' => $data['end'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function postEventVenue($data) {
        $res['status'] = false;
        $sth = $this->Insert('venues')->Value(array('eventId' => $data['eventId'], 'venue' => $data['venue'], 'activity' => $data['activity'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = !$res['status'];
        }
        return $res;
    }

    public function toggleCarouselView($rId) {
        $carousel = $this->Select('carousels')->Where(array('rId' => $rId))->Execute(1)['data'];
        return $this->Update('carousels')->Set(array('visible' => $carousel['visible'] == 'true' ? 'false' : 'true', 'lastModifiedOn' => $this->dateNow()))->Where(array('rId' => $rId))->Execute();
    }

}
