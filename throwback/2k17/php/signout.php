<?php
session_start();
session_destroy();

header("location:http://localhost:100/project/home.html");
?>