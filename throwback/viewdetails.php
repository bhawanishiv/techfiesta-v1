<?php
if (!isset($_GET['id'])) {
	header("location: techfiesta_reg.php");
}
$id=$_GET['id'];
require_once 'db.php';
$qry="select * from reg_details where id=$id";
$res=mysqli_query($con,$qry);
if($res){
	$row=mysqli_fetch_assoc($res);
	//var_dump($row);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Details::Techfiesta </title>
	<link rel="icon" href="icon.png"></link>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Monofett" rel="stylesheet">

	<style type="text/css">
	body{
		
		color: white;
	}
		h2{
			color: black;
			font-family: 'Monofett', cursive;
			font-size: 400%;
		}
		#label {
			font-size: 150%;
			color: black;
		}
		#info{
			font-size: 150%;
			color: black;
		}
		.card{
			border: solid skyblue .2px;
			border-radius: 3px;
			box-shadow: black 0 3px 3px;
			padding: 2%;
		}
	</style>
	<script type="text/javascript">
		function myprint(){
			window.print();
		}
	</script>
</head>
<body>
	<div class="head-image">
		<img src="u.jpg" width="100%" height="180px">
	</div>
	<div class="head text-center">
		<h2>REGISTRATION DETAILS</h2>
		<hr>
		<br>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6 card">
				<div class="">
					<label id="label">Name: </label><span id="info"><?php echo " ".$row["name"]; ?></span>
				</div>
				<div class="">
					<label id="label">College: </label><span id="info"><?php echo " ".$row["college"]; ?></span>
				</div>
				<div class="">
					<label id="label">Student ID/ College ID: </label><span id="info"><?php echo " ".$row["std_id"]; ?></span>
				</div>
				<div class="">
					<label id="label">Branch: </label><span id="info"><?php echo " ".$row["Branch"]; ?></span>
				</div>
				<div class="">
					<label id="label">Session: </label><span id="info"><?php echo " ".$row["session"]; ?></span>
				</div>
				<div class="">
					<label id="label">Mobile No.: </label><span id="info"><?php echo " ".$row["number"]; ?></span>
				</div>
				<div class="">
					<label id="label">Email: </label><span id="info"><?php echo " ".$row["email"]; ?></span>
				</div>
				<br>
				<div class="text-center">
					<button class="btn btn-success" onclick="myprint()">Print</button>
				</div>
			</div>
			<div class="col-md-3">
			</div>
		</div>
	</div>
</body>
</html>