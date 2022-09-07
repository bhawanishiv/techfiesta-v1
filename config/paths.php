<?php

$name = 'techfiesta';
$extension = 'org';
$domain = $name . '.' . $extension;
$protocol = 'http://';
$home = $protocol . 'www.' . $domain . '/' or $protocol.$domain.'/';


define('URL', $home);
define('about',$home.'about/');
define('library',$home.'library/');
define('account',$home.'account/');
define('events',$home.'events/');
define('support',$home.'support/');
define('hospitality',$home.'hospitality/');
define('dashboard',$home.'dashboard/');
