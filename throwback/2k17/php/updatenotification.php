<?php
  $data = json_decode(file_get_contents("php://input"));
  if(isset($data->update)) {
	require_once("particepantsdb.php");
	session_start();
	$techid = $_SESSION['techid'];
	if(!empty($techid))
	{
		$pub_time = date("y-m-d h:i:s");
		$update_qry = "insert into notifications(techid,notice,pub_time) values('$techid','$data->message','$pub_time')";

		$responce = mysqli_query($conn,$update_qry);
		if($responce){
			echo "Notification Updated";
		}
		else 
			echo "Something went wrong";
	}
	else{
		echo "You are not permitted to update notification";
	}
	
	
}
?>