<?php
require_once 'db.php';
 function validate($value)
 {
 	require_once 'db.php';

 	$value = preg_replace("/[^a-zA-Z0-9\s]/", "", $value);
 	$value=ltrim($value," ");
 	$value=rtrim($value," ");
 	$value=stripcslashes($value);
 	$value=strip_tags($value);
 	return $value;
 	$value=mysqli_real_escape_string($con,$value);
 }
	
	if(!$con)
			exit("Cannot connect to database");

		extract($_POST);
	if(isset($submit)){
		$name=validate($name);
		$college=validate($college);
		$std_id=validate($std_id);
		$Branch=validate($Branch);
		$session=mysqli_real_escape_string($con,$session);
		$number=validate($number);
		$email=mysqli_real_escape_string($con,$email);

		$qry="insert into reg_details(Name, College, Std_id, Branch, Session, Number, Email) values(?,?,?,?,?,?,?);";
		if($stmt=mysqli_prepare($con,$qry)){
			mysqli_stmt_bind_param($stmt, "sssssss", $name, $college, $std_id, $Branch, $session, $number, $email);
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_close($stmt);
				$last=mysqli_insert_id($con);
				//echo $last;
				header("location: viewdetails.php?id=$last");
			}
			else{
				echo "Failed to Register. ".mysqli_error($con);
			}
		}
	}	


?>