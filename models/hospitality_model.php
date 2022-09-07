<?php

class Hospitality_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function postAccomodation($data) {
        $res['status'] = false;
        $sth = $this->Insert('accomodations')->Value(array('accomodationId' => $data['accomodationId'], 'userId' => $data['userId'], 'allowed' => $data['allowed'], 'allowedBy' => $data['allowedBy'], 'addedOn' => $this->dateNow(), 'lastModifiedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['status'] = !$res['status'];
            $res['data'] = $data;
        }
        return $res;
    }

}
