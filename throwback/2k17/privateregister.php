<?php
  session_start();
  if(isset($_SESSION['access']))
  {
    if(!empty($_SESSION['username'])&&$_SESSION['access']=='yes')
    {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TECHFIESTA 2017</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width" initial-scale-1.0>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/protectedregister.css">
    <link rel="stylesheet" type="text/css" href="css/comman/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="js/lib/jquery.js"></script>
    <script type="text/javascript" src="js/lib/angular.js"></script>
     <script type="text/javascript" src="js/lib/routing.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>
<body>
  <div id="particles-js">
    <div class="allcontent" ng-app="proregister">
      
      <div ng-include="'comman/header.php'" ></div>
      <div ng-include="'comman/update.php'" ></div>   
<!-- Register Coading  Start --> 
    
                   
    <div class="formitem col-md-6 col-xs-12 col-ms-11 col-md-offset-3" ng-controller="prochangeCntrl">
      <div class="title">
        <ul>
          <li col-xs-4><a  ng-click="prochangePage('youraccount')">Your Account</a></li>
          <li col-xs-4><a ng-click="prochangePage('eventregister')" >Event Registration</a></li>
          <li col-xs-4><a  ng-click="prochangePage('updatenotice')">Notification</a></li>
          <li col-xs-4><a ng-click="prochangePage('accountverify')" >Account Verify</a></li>
          <li><a href="http://techfiesta.org/php/signout.php" >Signout</a></li>
        </ul>
        <hr/>
        <div ng-view></div>
       
  </div> 
</div>        
<!-- Register Coading End  -->
   
      <div ng-include="'comman/footer.php'" ></div>   
  </div>
</div>   
<script type="text/javascript">
  setInterval(function(){
    cwidth = screen.width;
    cheight = screen.height;
  console.log("Width : "+cwidth+",Height: "+cheight);
  var canvastag = document.querySelector("canvas");
   //console.log(canvastag);
   canvastag.setAttribute("width",cwidth);
   canvastag.setAttribute("height",cheight);
},200);
</script>     
      <script type="text/javascript" src="js/bg/particles.js"></script> 
       <script type="text/javascript" src="js/bg/app.js"></script>
       <script type="text/javascript" src="js/header/header.js"></script>
      <script type="text/javascript" src="js/protectedregister.js"></script>
	</body>
</html>
<?php  
    }else{
		header("location:http://localhost:100/project/registerall.html#!/login");
      echo "<div style='color: red;text-align: center;'>You are not permited to enter this zone</div>";
    }
  }
?>