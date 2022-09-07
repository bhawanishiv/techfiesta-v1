<?php

require 'library/Bootstrap.php';
require 'library/Controller.php';
require 'library/Model.php';
require 'library/View.php';

//Library
require 'library/Database.php';
require 'library/Session.php';
require 'library/Process.php';
require 'library/Hash.php';
require 'library/PDF.php';
require 'library/Mail.php';

require 'config/constants.php';
require 'config/paths.php';
require 'config/database.php';


$app = new Bootstrap();
$app->init();
