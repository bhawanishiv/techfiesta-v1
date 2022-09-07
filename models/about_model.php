<?php

class About_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function process() {
        return array($this->Update('data')->Set(array('sKey1' => 'sValue1', 'sKey2' => 'sValue2'))->Where(array('wKey' => 'wValue'))->Execute(),
            $this->Insert('user')->Value(array('gfg' => 'fsd', 'fdsfsdf' => 'fdf'))->Execute());
    }

}
