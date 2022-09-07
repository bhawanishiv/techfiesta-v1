<?php

class Support_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function postMessage($data) {
        $res['status'] = false;
        $sth = $this->Insert('messages')->Value(array('messageId' => $data['messageId'], 'name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone'], 'message' => $data['message'], 'wantToReach' => $data['wantToReach'], 'addedOn' => $this->dateNow()))->Execute();
        if ($sth['status']) {
            $res['data'] = $data;
            $res['status'] = $sth['status'];
        }
        return $res;
    }

   

}
