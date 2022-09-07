<!DOCTYPE html>
<html>
	<head>
		<title>TECHFIESTA 2017</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width" initial-scale-1.0>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/registerall.css">
    <link rel="stylesheet" type="text/css" href="css/comman/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="js/lib/jquery.js"></script>
    <script type="text/javascript" src="js/lib/angular.js"></script>
     <script type="text/javascript" src="js/lib/routing.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/register.js"></script>
	</head>
<body>
  <div id="particles-js"> 
    <div class="allcontent" ng-app="reg">
       
<!-- Register Coading  Start --> 
   <div ng-controller="update"> 
           <div ng-include="'comman/update.php'" ></div>
    </div> 
    
     
	 <div ng-include="'comman/header.php'" ></div>
    <div class="formitem col-md-5 col-xs-12 col-ms-11 col-md-offset-3" ng-controller="changeCntrl">
      <div class="title">
        <ul>
          <li><a  ng-click="changePage('login')">Login</a></li>
          <li><a  ng-click="changePage('register')">Register</a></li>
        </ul>
        <div ng-view></div>
         
       </div>

     </div>     
         
<!-- Register Coading End  -->
    <div ng-controller="changeCntrl">
      <div ng-include="'comman/footer.php'" ></div> 
    </div>  
  </div>	
</div>   
<script type="text/javascript">
  setInterval(function(){
    cwidth = screen.width;
    cheight = screen.height;
 // console.log("Width : "+cwidth+",Height: "+cheight);
  var canvastag = document.querySelector("canvas");
   //console.log(canvastag);
   canvastag.setAttribute("width",cwidth);
   canvastag.setAttribute("height",cheight);
},200);
</script>     
      <script type="text/javascript" src="js/bg/particles.js"></script> 
       <script type="text/javascript" src="js/bg/app.js"></script>
       <script type="text/javascript" src="js/header/header.js"></script>
      <script type="text/javascript" src="js/registerall.js"></script>
	</body>
</html>