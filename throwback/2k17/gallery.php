<!DOCTYPE html>
<html>
	<head>
		<title>TECHFIESTA 2017</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width" initial-scale-1.0>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
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
          
<!-- Gallery Coading  Start -->    
     <div class="container">
      <div class="row">



        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage1</p>
            <img src="gallery/1.jpg" id="pic1" alt="techfiesta Instiated">
          </div>
        </div>

        <div id="box1" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic01">
                  <div id="text">
                    
                  </div>
        </div>

         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage2</p>
            <img src="gallery/2.jpg" id="pic2" alt="techfiesta Instiated">

                
          </div>
        </div>

        <div id="box2" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic02">
                  <div id="text">
                    
                  </div>
                </div>


 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage3</p>
            <img src="gallery/3.jpg" id="pic3" alt="techfiesta Instiated">

                
          </div>
        </div>

        <div id="box3" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic03">
                  <div id="text">
                    
                  </div>
                </div>


               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage4</p>
            <img src="gallery/10.jpg" id="pic4" alt="techfiesta Instiated">

                
          </div>
        </div>

        <div id="box4" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic04">
                  <div id="text">
                    
                  </div>
                </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage5</p>
            <img src="gallery/5.jpg" id="pic5" alt="techfiesta Instiated">

                
          </div>
        </div>

        <div id="box5" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic05">
                  <div id="text">
                    
                  </div>
                </div>


        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage6</p>
            <img src="gallery/6.jpg" id="pic6" alt="techfiesta Instiated">

                
        </div>
        </div>

        <div id="box6" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic06">
                  <div id="text">
                    
                  </div>
                </div>

           <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage7</p>
            <img src="gallery/7.jpg" id="pic7" alt="techfiesta Instiated">

                
          </div>
        </div>

        <div id="box7" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic07">
                  <div id="text">
                    
                  </div>
                </div>

         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 image">
          <div class="thumbnail">
            <p>main stage8</p>
            <img src="gallery/8.jpg" id="pic8" alt="techfiesta Instiated">

                
          </div>
        </div>

        <div id="box8" class="box">
                  <span class="close">
                    &times;
                  </span>
                  <img class="box-content" id="pic08">
                  <div id="text">
                    
                  </div>
                </div>
<!-- Image Modal End -->
<!-- Gallery Coading End  -->
 <div ng-include="'comman/footer.php'" ></div>
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
    <script type="text/javascript" src="js/gallery.js"></script>
    <script type="text/javascript" src="js/bg/particles.js"></script> 
    <script type="text/javascript" src="js/bg/app.js"></script>
    <script type="text/javascript" src="js/header/header.js"></script>
	</body>
</html>