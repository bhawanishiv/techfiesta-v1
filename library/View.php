<?php

class View {

    function __construct() {
        
    }

//    public function render($name, $headsNNavigation = true) {
//        if ($headsNNavigation == true) {
//            require 'views/header.php';
//            require 'views/navigation.php';
//            require 'views/' . $name . '.php';
//            require 'views/resources.php';
//            require 'views/footer.php';
//            require 'views/script.php';
//        } else if ($headsNNavigation == false) {
//            require 'views/header.php';
//            require 'views/' . $name . '.php';
//            require 'views/resources.php';
//            require 'views/script.php';
//        } else if (is_null($headsNNavigation) or empty($headsNNavigation)) {
//            require 'views/' . $name . '.php';
//        }
//    }

    public function render($name, $navNFooter = null) {
        require 'views/header.php';

        if (!is_null($navNFooter) && $navNFooter !== false) {
            isset($navNFooter['navigation']) ? require 'views/' . $navNFooter['navigation'] . '.php' : false;
            require 'views/' . $name . '.php';
            isset($navNFooter['footer']) ? require 'views/' . $navNFooter['footer'] . '.php' : false;
            require 'views/script.php';
        } else if ($navNFooter = false) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/navigation.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
        require 'views/script.php';
    }

}
