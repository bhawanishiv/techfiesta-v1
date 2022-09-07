<?php
 
  $data = json_decode(file_get_contents("php://input"));
  if(isset($data->login)&&!empty($data->username)&&!empty($data->password)) {
	require_once("particepantsdb.php");
	require_once("validation.php");
	$username = stringFormate($data->username);
	$pass = stringFormate($data->password);
  	$select_data = "select * from particepants where username='$username' and pass='$pass'";
    $res_data = mysqli_query($conn,$select_data);
	$count = mysqli_num_rows($res_data);
	if($count==1)
	{
		$data = mysqli_fetch_assoc($res_data);
		if(isset($_SESSION['username']))
		    session_destroy();
		session_start();
		$_SESSION['techid']=$data['techid'];
		$_SESSION['regid']=$data['id'];
		$_SESSION['access']=$data['access'];
		$_SESSION['name']=$data['name'];
		$_SESSION['username']=$data['username'];
		$_SESSION['institute']=$data['institute'];
		$_SESSION['year']=$data['year'];
		$_SESSION['gender'] = $data['gender'];
		$_SESSION['stream']=$data['stream'];
		$_SESSION['year']=$data['year'];
		if($data['access']=='yes')
		  echo "successadmin";
	    else
		  echo "successuser";	
	}
	else 
		echo "User Id or Password is wrong";
	
	}else{
		echo "wrong turn";
	}
?>