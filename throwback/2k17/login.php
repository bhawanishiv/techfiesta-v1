<!DOCTYPE html>
<html>
	<head>
		<title>TECHFIESTA 2017</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width" initial-scale-1.0>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
     <script type="text/javascript" src="js/lib/jquery.js"></script>
     <script type="text/javascript" src="js/lib/angular.js"></script>
     
	</head>
	<body>
          <div class="row">
          	<div class="col-md-12">
          		<div class="col-sm-3 hidden-xs hidden-sm">
          			<br/>
		          	<img src="images/corner_logo.png" class="img-responsive">
              	</div>
          	<nav class="navbar navbarhome">	
          	<div class="navoption">
               <div class="navbar-header ">
              	  <div class="col-xs-12 hidden-lg hidden-md" style="display: inline-block;">
              	   
		            <div class="col-xs-8" >
		          		<img src="images/corner_logo.png" class="img-responsive">
		          	</div>
		          	<div  class="col-xs-4">
		          		<div class="row">
                    <div class="col-xs-4 col-xs-offset-2"style="padding-right: 2px; margin-right: 0px;">  
                           <a href="#" data-target="#update" data-toggle="modal" style="font-size: 1.5em;">
                  <span style="padding-top: 15px;" class="glyphicon glyphicon-bell pull-right" data-toggle="#update">
                      <span class="badge">13</span>
                  </span>
                   </a>
                </div>
                <div class="col-xs-4  col-xs-offset-2 pull-right" style="padding-right: 2px; margin-right: 0px;">  
                      <button type="button" class="navbar-toggle navbutton pull-right" data-target="#mainnavbar" data-toggle="collapse" style="margin-right: 0px;">
                       <span class="glyphicon glyphicon-menu-hamburge">&#9776;</span>
                          </button>
                        </div>
                       </div> 
                      </div>
                    </div>
                </div>
              <div class="navbar-collapse collapse" id="mainnavbar">
                <ul class="nav navbar-nav">
                  <li><a href="home.html">Home</a></li>
                  <li><a href="#">Event</a></li>
                  <li><a href="#">Schedule</a></li>
                  <li><a href="#">Spansor</a></li>
                  <li><a href="team.html">Team</a></li>
                  <li><a href="faqs.html">FAQs</a></li>
                </ul>
                <ul class="nav navbar-nav hidden-lg hidden-md hidden-sm" >
                  <li><a href="#">Hopitality</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                  <li><a href="#">Media</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">About Us</a></li>
                </ul>
              </div>
            </nav>
          	</div>
          </div> 
<!-- Login Coading  Start --> 
      <div class="container regContainer well col-md-6 col-md-offset-3">   
       <div class="row">
        <h3><strong>Login</strong></h3>
        <div class="form-horizontal form-group-sm">
           <div class="form-group">
            <div class=" col-md-6 col-md-offset-3">
              <input class="form-control" placeholder="email" type="email" name="email" id="inputemail">
            </div>
          </div>
           <div class="form-group has-success has-feedback">
            <div class=" col-md-6 col-md-offset-3">
              <input class="form-control" placeholder="password" type="text" name="pass" id="inputpass">
            </div>
          </div>
           <div class="form-group">
            <div class=" col-md-3 col-md-offset-5 col-xs-offset-4">
              <input class="btn btn-primary btn-sm" type="button" name="login" value="Login">
            </div>
          </div>
          <div class="form-group">
            <div class=" col-md-4 col-md-offset-3 col-xs-offset-3">
              <a href="#" class="pull-right">Forgot Password ?</a>
            </div>
          </div>
        </div>
       </div>
    </div>
<!-- Login Coading End  -->
        <div class="modal fade" data-backdrope="static" id="update" tabindex="-1">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h4 class="modal-title">Notification &amp; Updates</h4>
        				
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				 <span aria-hidden="true">&times;</span> 
        				</button>
        			</div>
        			<div class="modal-body">
        				<ul>
        					<li>Quizathin 2.0 start on 08:00 sharp .</li>
        					<li>Breadboard circuit design is going in room no. 302 .</li>
        					<li>Line flower robotics event is going in room no. 102 .</li>
        					<li>Coding 2.1 is going on room no. 203 .</li>
        					<li>Treasure hunt event postpond to 03:00 pm,today .</li>
        					<li>Registration for pipomenia is going in Seminar hall .</li>
        					<li>Debate is going to start in room no. 205 .</li>
        					<li>Second round of poter maker is going to start in room no. 123 .</li>
        				</ul>
        			</div>
        			<div class="modal-footer">
        				<input type="button" name="cancle" value="Cancle" data-dismiss="modal">
        			</div>
        		</div>
        	</div>
        </div>
<script type="text/javascript">
  setInterval(function(){
    cwidth = screen.width;
    cheight = screen.height;
  //console.log("Width : "+cwidth+",Height: "+cheight);
  var canvastag = document.querySelector("canvas");
   //console.log(canvastag);
   canvastag.setAttribute("width",cwidth);
   canvastag.setAttribute("height",cheight);
},200);
</script>
       <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="js/register.js"></script>
	</body>
</html>