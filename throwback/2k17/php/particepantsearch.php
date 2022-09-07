<?php
  $data = json_decode(file_get_contents("php://input"));
  if(isset($data->verify)) {
	require_once("particepantsdb.php");
	require_once("validation.php");
	$username = stringFormate($data->email);
	$regid = stringFormate($data->regid);
  	$select_data = "select id,techid,name,username,institute,gender,year,stream from particepants where username='$username' or id='$regid'";
    $res_data = mysqli_query($conn,$select_data);
	$count = mysqli_num_rows($res_data);
	if($count==1)
	{
		$total_data = array();
		$data = mysqli_fetch_assoc($res_data);
		array_push($total_data,$data); 
		echo json_encode(array("result"=>"success","verify"=>$total_data));
	}
	else 
		echo "This id/email is not found";
	
  }else{
    echo "Something went wrong";
  }
?>