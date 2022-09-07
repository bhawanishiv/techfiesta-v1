<?php

class Library_Model extends Model {

    public function __construct() {
        parent::__construct();
    }   

    public function postSubscribeEmail($data) {
        $response['status'] = false;
        $now = $this->dateNow();
        $sth = $this->Insert('subscribeEmail')->Value(array('subsEmail' => $data['subsEmail'], 'subsId' => $data['subsId'], 'subsAddedOn' => $now))->Execute();
        if ($sth['status'] == true) {
            $response['status'] = true;
        }
        return $response;
    }

    public function checkSubscribeEmail($email) {
        $sth = $this->Select('subscribeEmail')->Field(array('subsEmail'))->Where(array('subsEmail' => $email))->Execute(1);
        return $sth;
    }

    public function postLike($data) {
        $now = $this->dateNow();
        $response = array();
        $n = $this->Select('likes')->Where(array('lCId' => $data['lCId'], 'luserId' => $data['luserId']))->Execute(1)['count'];
        $p = $this->Select('likes')->Where(array('lCId' => $data['lCId'], 'luserId' => $data['luserId'], 'lLiked' => 'true'))->Execute(1)['count'];
        $q = $this->Select('likes')->Where(array('lCId' => $data['lCId'], 'luserId' => $data['luserId'], 'lLiked' => 'false'))->Execute(1)['count'];
        if ((int) $n == 0) {
            $sth = $this->Insert('likes')
                    ->Value(array('lCId' => $data['lCId'], 'luserId' => $data['luserId'], 'lLiked' => 'true', 'lAddedOn' => $now, 'lLastModifiedOn' => $now))
                    ->Execute();
            $response['text'] = 1; //Liked
            $response['status'] = true;
        } else if ((int) $p == 1) {
            $sth = $this->Update('likes')->Set(array('lLiked' => 'false'))->Where(array('lCId' => $data['lCId'], 'luserId' => $data['luserId']))->Execute();
            $response['text'] = 0; //Disliked
            $response['status'] = true;
        } else if ((int) $q == 1) {
            $sth = $this->Update('likes')->Set(array('lLiked' => 'true'))->Where(array('lCId' => $data['lCId'], 'luserId' => $data['luserId']))->Execute();
            $response['text'] = 1; //Liked
            $response['status'] = true;
        }
        return $response;
    }

}
