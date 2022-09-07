<?php

class Events_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function postParticipation($data) {
        $res['status'] = false;
        $sth = $this->Insert('participation')->Value(array('participationId' => $data['participationId'], 'eventId' => $data['eventId'], 'visible' => $data['visible'], 'agreement' => $data['agreement'], 'userId' => $data['userId'], 'agreement' => $data['agreement'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $data;
        }
        return $res;
    }

    public function getEvenstByDepartment($departmentId) {
        $res['status'] = false;
        $events = $this->Select('events')->Where(array('departmentId' => $departmentId))->Execute();
        if ($events['status']) {
            foreach ($events['data'] as $event) {
                $event['department'] = $this->getDepartments(array('departmentId' => $departmentId))['data'];
                $event['head'] = $this->getUsers($event['headId'])['data'];
                $event['file'] = $this->getFile($event['eventId'])['data'];
                $_data[] = $event;
            }
            $res['data'] = $_data;
            $res['status'] = !$res['status'];
        }
        return $res;
    }

}
