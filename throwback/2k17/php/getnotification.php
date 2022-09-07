<?php
  $data = json_decode(file_get_contents("php://input"));
  if(true) {
	require_once("particepantsdb.php");
  	$get_update_qry = "select * from notifications order by nid desc";
	$res_data = mysqli_query($conn,$get_update_qry);
	$update = array();
	while($data=mysqli_fetch_assoc($res_data)){
	   array_push($update,$data);
	}
	echo json_encode(array("notification"=>$update));
	
}
?>