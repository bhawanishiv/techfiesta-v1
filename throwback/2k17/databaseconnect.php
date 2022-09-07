<?php
$servername = "localhost";
$username = "techfiestarec";
$password = "Techfiesta@udaan";

// Create connection
//$conn = mysqli_connect($servername, $username, $password);
mysql_connect("localhost","techfiestarec","Techfiesta@udaan");
$conn = mysql_select_db("techfiesta");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>