<!DOCTYPE html>
<html>
  <head>
    <title>TECHFIESTA 2017</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width" initial-scale-1.0>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/events.css">
    <link rel="stylesheet" type="text/css" href="css/lib/hover.css">
    <link rel="stylesheet" type="text/css" href="css/comman/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="description" content="Techfiesta is annual science and technology fest of Ramgarh Engineering College.Conceived in 2016,2017 as a platform for engineering students to showcase their skills and knowledge in fun, practical and innovative ways.previous edition of techfiesta saw participation from different colleges in jharkhand.Techfiesta 2k18 will continue to expand on the success of previous editions and create milestones of its own." />
     <script type="text/javascript" src="js/lib/jquery.js"></script>
     <script type="text/javascript" src="js/lib/angular.js"></script>
     <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div id="particles-js">
    <div class="allcontent" ng-app="eventsCntrl" >
         <div ng-include="'comman/header.php'" ></div>
         <div ng-include="'comman/update.php'" ></div> 
           
<!-- Events Coading  Start -->
<div class="row" ng-controller="eventsData">
  <article class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1" id=maindetails ng-show="maindts">
     
        <h4 id="heading1">Events</h4>
        <div ng-repeat="mevent in allmaievent">
          <div class="row">
            <div ng-repeat="event in mevent.row" >
			<div class="col-md-3 col-lg-3 col-xs-12 col-sm-6" id="eContainer" >
			    <div style="padding:5px; margin: 5px;" class="col-md-11 col-lg-11 col-xs-11 col-sm-11 thumbnail" id="mevt" ng-mouseover="getsubevent(event.meid)" ng-mouseleave="hide(event.meid)">
            <div ng-mouseover="show(event.meid)" >
              <div ng-attr-id="{{event.meid}}" class="overlay" >
              <div class="overlay-content" >
                <div ng-repeat="sevent in allevent">
                  <a href="" ng-click="getSelectedEvent(sevent.seid)">{{sevent.subevent_name}}</a>

                </div>
              </div>
            </div>
              <p style="color:#000;font:20px solid;text-align:center;">{{event.mevent_name}}</p>
              <img ng-attr-src="{{event.icons}}" class="img-responsive">
            </div>
          </div>  
          </div>
              
            </div>
          </div>
       </div>
  </article>
  <article class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" ng-show="subdts">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 deleftpg">
        <h4 id="heading3">my events</h4>
          <br/>
          <h2 style="text-align: center;"><span ng-click="gotomain()" style="margin-right:30px;" class="glyphicon glyphicon-arrow-left"></span>{{ename}}</h2>
          <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-lg-offset-2">
            <!--  <br/>
              <div class="row">
                <p class="col-xs-5 col-sm-5 col-md-5 pull-left">Prize</p>
                <p class="col-xs-5 col-sm-5 col-md-5 pull-right">5000 /-</p>
              </div>
              <div class="row">
                <p class="col-xs-5 col-sm-5 col-md-5 pull-left">Schedule</p>
                <a href="schedule.php" class="col-xs-5 col-sm-5 col-md-5 pull-right">click here</a>
              </div>-->
              <br/>
              <div class="row">
                <a class="btn btn-primary col-xs-5 col-sm-5 col-md-5 pull-left" id="aboutbtn">About</a>
                <a class="btn btn-primary col-xs-5 col-sm-5 col-md-5 pull-right" id="rulesbtn">Rules</a>
              </div>
              <br/>
              <div class="row">
                <a class="btn btn-primary col-xs-5 col-sm-5 col-md-5 pull-left" id="arenabtn">Arena</a>
                <a class="btn btn-primary col-xs-5 col-sm-5 col-md-5 pull-right" id="specificationsbtn">Specification</a>
              </div>
              <br/>
              <div class="row">
                <a href="http://localhost:100/project/privateregister.php#!/eventregister" class="btn btn-primary col-xs-5 col-sm-5 col-md-5 pull-left">Register</a>
                <a class="btn btn-primary col-xs-5 col-sm-5 col-md-5 pull-right" id="contactbtn">Contact</a>
              </div>
            </div>
          </div>
          
      </div>
    <!--- Page 2   -->  
      <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 derightpg">
        <h4 id="heading4">Events Details</h4>
        <div class="panel-group">
          <div class="panel panel-success" id="abouts">
            <div class="panel-heading">
              About
            </div>
            <div class="panel-body autoScroll">
              <ul ng-repeat="abt in about">
                <li>{{abt}}</li>
              </ul>
            </div>
          </div>
          <div class="panel panel-success" id="rules">
            <div class="panel-heading">
              Rules
            </div>
            <div class="panel-body autoScroll">
              <ul ng-repeat="rule in rules">
                  <li>{{rule}}</li>
                </ul>
            </div>
          </div>
          <div class="panel panel-success" id="specifications">
            <div class="panel-heading">
              Specifications
            </div>
            <div class="panel-body autoScroll">
              <ul ng-repeat="spec in specifications">
                <li>{{spec}}</li>
              </ul>
            </div>
          </div>
          <div class="panel panel-success" id="arena">
            <div class="panel-heading">
              Arena
            </div>
            <div class="panel-body autoScroll">
              <ul ng-repeat="arn in arena">
                <li>{{arn}}</li>
              </ul>
            </div>
          </div>
          <div class="panel panel-success" id="contact">
            <div class="panel-heading">
              Contact
            </div>
            <div class="panel-body autoScroll">
              <ul ng-repeat="cont in contact">
                <li>{{cont}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </article>

  </div>
<!-- Events Coading End  -->
<br/><br/>
        <div ng-include="'comman/footer.php'" ></div>
  </div>
</div>        

    <script src='js/lib/circletypejquery.js'></script>
    <script type="text/javascript" src="js/lib/lettering.js"></script>
    <script type="text/javascript" src="js/lib/circletype.js"></script>
    <script type="text/javascript" src="js/events.js"></script>
    <script type="text/javascript" src="js/bg/particles.js"></script> 
    <script type="text/javascript" src="js/bg/app.js"></script>
    <script type="text/javascript" src="js/header/header.js"></script>
  </body>
</html>