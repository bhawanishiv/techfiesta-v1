<!DOCTYPE html>
<html lang="en">
<head>
<title>
TECHFIESTA 2K18::Registration 
</title>
<link rel="icon" href="icon.png"></link>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="tech.css">
	
	<meta name="description" content="Techfiesta is annual science and technology fest of Ramgarh Engineering College.Conceived in 2016,2017 as a platform for engineering students to showcase their skills and knowledge in fun, practical and innovative ways.previous edition of techfiesta saw participation from different colleges in jharkhand.Techfiesta 2k18 will continue to expand on the success of previous editions and create milestones of its own." />
	
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	
	
	  <link rel="stylesheet"
	  
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
	
  </head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-logo" href="index.php"><img src="logo.png" class="top"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li> <a href="index.php" style="color:white;"> Home </a></li>
        <li><a href="events.php" style="color:white;">Events</a></li>
		<li> <a href="contactus.php" style="color:white;"> Contact Us </a></li>
		<li> <a href="aboutus.php" style="color:white;"> About Us </a></li>
		<li> <a href="faqs.php" style="color:white;"> FAQs </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white">ThrowBack
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="2k16/home.html">TECHFIESTA 2k16</a></li>
          <li><a href="2k17/index.php">TECHFIESTA 2k17</a></li>
        </ul>
      </li>
	  
        <li class="active"><a href="registration.php"><span class="glyphicon glyphicon-user" style="color:white;"></span> Registration</a></li>
      
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
<br>

	<div class="w3-row w3-margin w3-container w3-padding screen"  style="width: 500px;">

		<div class="w3-padding w3-xlarge w3-text-white" id="a1" style="background-image: linear-gradient(to right, skyblue, blue);height:50px;margin-top:25px;"><center> Registration Form </center> </div>
		
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

		 
</div><!--end of container fluid-->



</body>
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
</html>