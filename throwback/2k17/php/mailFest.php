<?php

$details= $_POST['name']."        ".$_POST['email']."         ".$_POST['message'];

$to_email = 'niteshkr2063@gmail.com,sunilarangi6561@gmail.com';
$subject = 'Testing PHP Mail'; 
$message =$details; 
$headers = 'From: niteshkr2063@gmail.com'; 
     
mail($to_email, $subject, $message, $headers);    
 header("Location: http://techfiesta.org/contact_us.php");
?>