<!DOCTYPE html>
<html>
	<head>
		<title>TECHFIESTA 2017</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width" initial-scale-1.0>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/comman/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <script type="text/javascript" src="js/lib/jquery.js"></script>
     <script type="text/javascript" src="js/lib/angular.js"></script>
     <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
      <div id="particles-js">
           <div class="allcontent" ng-app="head" ng-controller="headcont">
            <div ng-include="'comman/header.php'" ></div>
            <div ng-include="'comman/update.php'" ></div>   
<!-- Team Coading  Start -->    
      <div class="col-lg-8 col-md-5 col-sm-12  col-sx-7 col-lg-offset-2 col-md-offset-2" style="overflow: auto;"> 
		    <img src="gallery/schedule.jpg">  
		 </div>
<!-- Team Coading End  -->
      <div ng-include="'comman/footer.php'"></div>
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
       <script type="text/javascript" src="js/bg/particles.js"></script> 
       <script type="text/javascript" src="js/bg/app.js"></script>
       <script type="text/javascript" src="js/header/header.js"></script>
	</body>
</html>