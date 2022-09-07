<?php

class Outlook_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function go() {
        $query = $this->Select('composition')
                ->Field(array('ram', 'shyam'))
                ->Where(array('key' => 'value', 'key2' => 'value2'))
                ->OrderBy(array('key' => 'DESC'))
                ->Execute(1);
        $d = $this->Insert('df')
                ->Value(array('key' => 'value', 'key2' => 'value2'))
                ->Execute();
        $r = $this->Update('ajax')
                ->Set(array('key' => 'sd', 'rt' => 'dfsd'))
                ->Where(array('key' => 'value', 'key2' => 'value2'))
                ->Execute();
               
    }

}
