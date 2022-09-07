<!DOCTYPE html>
<html>
	<head>
		<title>TECHFIESTA 2017</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width" initial-scale-1.0>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/comman/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/about_us.css">
    
     <script type="text/javascript" src="js/lib/jquery.js"></script>
     <script type="text/javascript" src="js/lib/angular.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
    <div id="particles-js">
      <div class="allcontent" ng-app="head" ng-controller="headcont">
        <div ng-include="'comman/header.php'" ></div>
            <div ng-include="'comman/update.php'" ></div>   
        <div class="border">

           <section class="for-full-back " id="one">
                    <div class="">
                        <div class="row text-center for-one">
                          <div class="col-lg-10 col-md-12 col-xs-12 col-lg-offset-1" id="text">
                            <h1>ABOUT US</h1>
                              <h3>
                                <strong>
                                 RAMGARH ENGINEERING COLLEGE ,Run and Managed by TECHNO INDIA established with the prior approval of
                              All IndiaCouncil For Technical Education(AICTE)and affiliation of
                              <b>Vinoba Bhava University(VBU)</b>,is as an institution under Public
                                  Private Parternship between the Government of Jharkhand and Techno India Group.
                                    
                                  It is one of the elite engineering institutes of jharkhand ranked 
                                  consistently among the top educational institutes of the state.It is situated in the outskirts of Ramgarh district town on <b>NH-23</b> at Murubanda,near Chittorpur Rajrappa Project.  
                                  </strong>
                                </h3>
                                                   
                                    
                      <h3><strong>
                          Techfiesta is annual science and technology fest of Ramgarh Engineering College.Conceived in 2016 as a platform for engineering students to showcase their skills and knowledge in fun, practical  and innovative ways.previous edition of techfiesta saw participation from different colleges in jharkhand.Techfiesta 2k17 will continue to expand on the success of previous editions and create milestones of its own. 
                    </strong></h3>
                                                    
                     </div>
                        </div>
                    </div>
               </section>

          
        </div>

  <div ng-include="'comman/footer.php'" ></div>
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
	</body>
</html>