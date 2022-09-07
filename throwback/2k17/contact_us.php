<!DOCTYPE html>
<html>
  <head>
    <title>TECHFIESTA 2017</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" initial-scale-1.0>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/comman/header.css">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" type="text/css" href="css/contact_us.css">

     <script type="text/javascript" src="js/lib/jquery.js"></script>
     <script type="text/javascript" src="js/lib/angular.js"></script>
     <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div id="particles-js">
      <div class="allcontent" ng-app="head" ng-controller="headcont">
        <div ng-include="'comman/header.php'" ></div>
            <div ng-include="'comman/update.php'" ></div>
   <!--  Contact us start  -->     
 <div class="container">   
  <div class="first_border">
      <div class="details">
  <div class="row">
          <div  id="gsac">

                  


      <div class="col-md-6 col-xs-10">
        

            <input  type="radio" name="tab" class="gsac_input" id="gsac_selected" checked="gsac_selected">
                    <label class="tab" >
                      <a   onclick="gsac()" class="anchor1">GSAC</a>
                    </label>

                    <input  type="radio" name="tab" class="tech_input" >
                    <label class="tab"  >
                      <a   onclick="tech()" class="anchor2">TECHNICAL SUPPORT</a>
                    </label>
            <div>
                                <img src="images/logo.png" class="techfiesta">
                        </div>      
                                                    
            
                    
                      
                           
                      
                          <div class="subject">
                                <div class="head" id="tech_head">TECHFIESTA 2K17 </div>
								<div class="part">facebook:<a href="http://facebook.com/techfiesta.gecr">www.facebook.com/techfiesta.gecr</a></div>
								<div class="part">email:<a href="mailto:techfiesta.org@gmail.com">techfiesta.org@gmail.com</a></div>
								<div class="part">mobile:
								<a href="tel:+917870698597">7870698597</a>/
								<a href="tel:+917277069919">7277069919</a>/
								<a href="tel:+917779828453">7779828453</a>
								</div>

                          </div>


        
        
      </div>
      
      <div class="col-md-6 col-xs-9">
              <br/>  
              <div class="query" id="query_position">

                            <div class="query_head">ANY QUERY</div>
                            <form method="post" action="php/mailFest.php">
                            <div class="group">
                              <input type="text" name="techfiesta_id" class="input" placeholder="TECHFIESTA ID">
                            </div>
                            <div class="group">
                              <input type="text" name="email" class="input" placeholder="EMAIL/MOBILE">
                            </div>
                            <div class="group">
                              <textarea name="message"  class="input" placeholder="MESSAGES"></textarea>
                            </div>
                            <div class="group">
                              <input type="submit" class="button" name="submit" value="Submit">
                            </div>
                            </form>
                          </div>

              </div>
            
        
      
      
  </div>

  </div>
  <div class="row">
    
  </div>
  <div class="row">
                    <div  id="technical">

      <div class="col-md-6 col-xs-10">
        
                  <input  type="radio" name="tab" class="gsac_input">
                      <label  class="tab" >
                        <a   onclick="gsac()" class="anchor3">GSAC</a>
                      </label>

                    <input  type="radio" name="tab" class="tech_input" >
                      <label  class="tab" >
                      <a  onclick="tech()" class="anchor4" >TECHNICAL SUPPORT</a>
                      </label>

                      <div class="logo">
                      <img src="images/logo12.jpg" class="techfiesta">
                    </div>      


                                <div class="subject">
                                      <div class="head" id="tech_head">TEAM UDAAN </div>
									  <div class="part">facebook:<a href="http://facebook.com/recstudentportal">www.facebook.com/recstudentportal</a></div>
								      <div class="part">email:<a href="mailto:recstudentportal@gmail.com">recstudentportal@gmail.com</a></div>
                                      <div class="part">mobile:
										<a href="tel:+917870698597">7870698597</a>/
										<a href="tel:+917277069919">7277069919</a>/
										<a href="tel:+917779828453">7779828453</a>
									  </div>

                                </div>

      </div>
      
      <div class="col-md-6 col-xs-7">
        
            <br/>          
            <div class="query" id="query_position">

                          <div class="query_head">ANY QUERY</div>
                          <form method="post" action="php/mailTech.php">
                          <div class="group">
                            <input type="text" name="techfiesta_id" class="input" placeholder="TECHFIESTA ID">
                          </div>
                          <div class="group">
                            <input type="text" name="email" class="input" placeholder="EMAIL/MOBILE">
                          </div>
                          <div class="group">
                            <textarea name="message"  class="input" placeholder="MESSAGES"></textarea>
                          </div>
                          <div class="group">
                            <input type="submit" class="button" name="submit" value="Submit">
                          </div>
                        </form>
              
                   
                 
                    </div> 
        </div>
        
      </div>

    </div>
      
  </div>
</div>
<div class="row">
	<div class="mapcontainer">
      <div id="map"></div>
	</div>
</div>
</div>

<!--  Contact us end  -->  
     <div ng-include="'comman/footer.php'" ></div>
  </div> 
</div>  
<script type="text/javascript">
       function initMap() {
        var uluru = {lat:23.5782853, lng:85.6299734};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI6s0pz1WM4UahyS7cHyA0uQRA_VXEGSs&callback=initMap">
    </script>      
      <script type="text/javascript" src="js/contact_us.js"></script>
       <script type="text/javascript" src="js/bg/particles.js"></script> 
       <script type="text/javascript" src="js/bg/app.js"></script>
       <script type="text/javascript" src="js/header/header.js"></script>
	   
  </body>
</html>