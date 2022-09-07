<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/w3.css">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/hover-min.css">

	<style type="text/css">

	body { 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
}
		
		@media only screen and (max-width: 600px){

			.screen{
				width: 85% !important;
			}

			body{
				background-image: url(tf_m.jpg);

			}

		}


	</style>
</head>

<body background="tf.jpg">
	<br>

	<div class="w3-row w3-margin w3-container w3-padding screen"  style="width: 500px;">

		<div class="w3-padding w3-xlarge w3-text-white" id="a1" style="background-image: linear-gradient(to right, skyblue, blue);"><center> Registration Form :: TECHFIESTA'18 </center> </div>
		
		<br>
			
	<form action="tf_upload.php" method="POST">
		
			<b>Name<span class="w3-text-red">*</span></b>
			<input class="w3-round-large w3-card w3-input w3-border" type="text" name="name" placeholder="Enter Your Name" required>
			
			<br>

			<b>College<span class="w3-text-red">*</span></b>
			<input class="w3-round-large w3-card w3-input w3-border" type="text" name="college" placeholder="Enter Your College" required>
			
			<br>
		
			
			<b>Student/College ID<span class="w3-text-red">*</span></b>
			<input class="w3-input w3-border w3-card w3-round-large" type="text" name="std_id" placeholder="ANY College ID ">

			<br>

			
			<b>Branch<span class="w3-text-red">*</span></b>
			<input class="w3-input w3-border w3-round-large w3-card" type="Text" name="Branch" placeholder="Enter Your Branch" required>
		
			<br>

			
			<b>Session<span class="w3-text-red">*</span></b>
			<input class="w3-input w3-border w3-round-large w3-card" type="Text" name="session" placeholder="Ex-2018-2022" required>
		
			<br>

			
			<b>Mobile Number<span class="w3-text-red">*</span></b>
			<input class="w3-input w3-border w3-round-large w3-card" type="Number" name="number" placeholder="Enter Your Mobile Number" required>
		
			<br>

			
			<b>Email ID<span class="w3-text-red">*</span></b>
			<input class="w3-input w3-border w3-round-large w3-card" type="email" name="email" placeholder="Enter Your Email Id" required>
		
			<br>

		
		<!--	Select Course*
			<select name="course" class="w3-select w3-border">
			
				<option value="" disabled selected>Choose Your Course</option>
				<option value="1"> A </option>
				<option value="1"> B </option>
				<option value="1"> C </option>
				<option value="1"> D </option>
				<option value="1"> E </option>

			</select> 
		
			
		
		<br>
		<br>

		Select Image
		<input class="w3-input w3-border" type="File" name="image" accept="image/*">

		-->

		<button class=" w3-button w3-round-xlarge w3-teal" name="submit" type="submit"> Submit </button>
		</div>


	</form>
	
	</div>


</body>
</html>