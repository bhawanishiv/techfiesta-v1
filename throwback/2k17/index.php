<!DOCTYPE html>
<html>
  <head>
    <title>TECHFIESTA 2017</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" initial-scale-1.0>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" type="text/css" href="css/comman/header.css">
     <script type="text/javascript" src="js/lib/jquery.js"></script>
     <script type="text/javascript" src="js/lib/angular.js"></script>
     <script type="text/javascript" src="bootstrap/js/bootstrap.min.js">
     </script>
  </head>
  <body>
     <div id="particles-js">
      <div class="allcontent" ng-app="head" ng-controller="headcont" >
            <div ng-include="'comman/header.php'"  ></div>
            <div ng-include="'comman/update.php'" ></div>
      
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
        <div class="row">
          <div class="col-md-2 col-md-offset-1 hidden-xs hidden-sm">
            <div class="register">
              <a href="registerall.php">
                <span class="glyphicon glyphicon-pencil"></span>
                <span>Register</span>
                <span></span>
              </a>
            </div>
          </div>
          <div class="col-md-5 col-sm-6  col-sx-7 ">
            <!--
              <a href="#" style="text-decoration: none;" >
                <div class="cpresents">REC PRESENTS'</div>
                <div class="cname">TECHFIESTA</div>
                <div class="cpresents">A SCIENCE AND TECHNOLOGY FESTIVAL</div>
              </a> -->     
                 <img src="images/mid_logo.png" class="img-responsive">
          </div>
          <div class="col-md-1 col-md-offset-1 hidden-xs hidden-sm">
            <div class="register">
              <a  data-target="#update" data-toggle="modal">
                <h1 class="glyphicon glyphicon-bell pull-right">
                    
                </h1>
              </a>
            </div>
          </div>
        </div>
            <br/>
          <br/>
          <br/>
          <br/>
          
        <div class="row">
          <div class="col-md-2 col-md-offset-1 col-xs-11 col-xs-offset-1">
            <div class="backthrows col-xs-7">
                <div class="bhead">
                  <span>THROW BACKS</span>
                </div>
                <div class="byear">
                  <a href="2k16/home.html">
                    <span class="glyphicon glyphicon-hand-right"></span>
                    <span>2k16</span>
                  </a>
                </div>
            </div>
            <div class="register col-xs-5 hidden-lg hidden-md" >
              <a href="registerall.php">
                <span class="glyphicon glyphicon-pencil"></span>
                <span>Register</span>
                <span></span>
              </a>
            </div>
          </div>

          <div class="col-md-3 col-md-offset-5" ng-controller="time">
            <div class="meter">
                  <div class="col-md-3 col-xs-2 col-xs-offset-1">Days</div>
                  <div class="col-md-6 col-xs-7">
                  <div class="progress">
                            <div class="progress-bar" style="width: {{days_value*0.74397206}}%">
                            {{days_value}}
                            </div>
                  </div>
                   </div>

                   <div class="col-md-3 col-xs-2 col-xs-offset-1">Hours</div>
                  <div class="col-md-6 col-xs-7">
                  <div class="progress">
                            <div class="progress-bar" style="width:{{hours_value*4.1666667}}%">
                           {{hours_value}}
                            </div>
                  </div>
                   </div>  
                   <div class="col-md-3 col-xs-2 col-xs-offset-1">Minutes</div>
                  <div class="col-md-6 col-xs-7">
                  <div class="progress">
                            <div class="progress-bar" style="width:{{minutes_value*1.66667}}%">
                            {{minutes_value}}
                            </div>
                  </div>
                   </div>  
                   <div class="col-md-3 col-xs-2 col-xs-offset-1">Seconds</div>
                  <div class="col-md-6 col-xs-7">
                  <div class="progress">
                            <div class="progress-bar sec" style="width:{{seconds_value*1.66667}}%">
                              {{seconds_value}}
                            </div>
                  </div>   
              </div>
            </div>
          </div>
        </div> 
        <br/>
        <br/>
        <br/>
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
   if(cheight<660)
    canvastag.setAttribute("height",cheight-30);
   else if(cheight<1150)
     canvastag.setAttribute("height",cheight-115);
},200);
</script>      
        <script type="text/javascript" src="js/bg/particles.js"></script> 
        <script type="text/javascript" src="js/bg/app.js"></script>
        <script type="text/javascript" src="js/header/header.js"></script> 
         <script type="text/javascript" src="js/home.js"></script>  
  </body>
</html>