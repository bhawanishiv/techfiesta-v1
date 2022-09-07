<?php
$data = json_decode(file_get_contents("php://input"));
  if (isset($data->fgpwd)) {
	require_once("particepantsdb.php");
  	$select_data = "select * from particepants where username='$data->username' and techid='$data->techid'";
    $res_data = mysqli_query($conn,$select_data);
	$data = mysqli_fetch_assoc($res_data);
	
	if(count($res_data)>0)
	{
	  $subject = 'Request for forget Password';
	  $to = $data['username'];
      $message = "Yes we get our mail";
      $header  = 'MIME-Version:1.01';
      $header .='content-type: text/html';
      $header .='From: Techfiesta<projecttesting6561@gmai.com>';
   	  
	  $sent = mail($to,$subject,$message,$header);
	  if($sent)
		  echo 'Success';
	  else
		  echo 'Failed';
	}
	else 
		echo "You are not register with Techfiesta'17";

	}
	
?>	