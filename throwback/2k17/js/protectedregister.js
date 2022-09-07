var proReg =angular.module("proregister",["ngRoute"]);
proReg.config(function($routeProvider){
      $routeProvider.when("/youraccount",{
         templateUrl:"comman/youraccount.php"
      }).when("/updatenotice",{
         templateUrl:"comman/updatenotification.php"
      }).when("/notificationsuccess",{
         templateUrl:"comman/notificationsuccess.php"
      }).when("/accountverify",{
         templateUrl:"comman/accountverify.php"
      }).when("/eventregister",{
         templateUrl:"comman/eventregister.php"
      }).when("/verificationsuccess",{
         templateUrl:"comman/verificationsuccess.php"
      });
});
proReg.controller("prochangeCntrl",function($scope,$http,$location){
 $location.url("/youraccount");
   $scope.prochangePage = function(pagetype)
                        {
                           if(pagetype=='youraccount')
                           {
                              $location.url('/youraccount');
                           }
                           if(pagetype=='updatenotice')
                           {
                              $location.url('/updatenotice');
                           }
                           if(pagetype=='accountverify')
                           {
                              $location.url('/accountverify');
                           }
                            if(pagetype=='eventregister')
                           {
                              $location.url('/eventregister');
                           }
                        }
});
proReg.controller("proregisterContrl",function($scope,$http,$location){
    $scope.ok = [];
   
	  $scope.updateNotification = function(update)
	  {
	      $scope.message = document.querySelector("#message").value;
	      
	         $http({
	            method:'POST',
	            url:"../php/updatenotification.php",
	            data:{"update":update,"message":$scope.message}  
	         }).then(function(res){
	           // console.log(res);
	            $location.url('/notificationsuccess');
	         },function(err){
	            alert("Something went wrong");
	           // console.log(err);
	         });
	  }
$scope.accountVerity = function(verify)
{
      $scope.regid = document.querySelector("#regid").value;
      $scope.email = document.querySelector("#email").value;
      var valid =($scope.regid!="")||($scope.email!="");
      if(valid)
      {
        $http({
            method:'POST',
            url:"../php/particepantsearch.php",
            data:{"verify":'verifed',"regid":$scope.regid,"email":$scope.email}  
         }).then(function(res){
          if(res.data.result=='success')  
          {
            $scope.vid=res.data.verify[0].id;
            $scope.vtechid=res.data.verify[0].techid;
            $scope.vname=res.data.verify[0].name;
            $scope.vemail=res.data.verify[0].username;
            $scope.vinstitute=res.data.verify[0].institute;
            $scope.vgender=res.data.verify[0].gender;
            $scope.vyear=res.data.verify[0].year;
            $scope.vstream=res.data.verify[0].stream;
          }
          else
            $scope.err = res.data;
         },function(err){
            alert("error");
            //console.log(err);
         });
      }
         
  }
  $scope.verifyDone = function(vdid,vdemail)
{
      var admintechid = document.querySelector("#admintechid").value;
      var valid =(admintechid!="");
      if(valid)
      {
        $http({
            method:'POST',
            url:"../php/verifyaccount.php",
            data:{"verify":'verifed',"admintechid":admintechid,"vid":vdid,"vemail":vdemail}  
         }).then(function(res){
            if(res.data=='successfull')
            {
               $location.url('/verificationsuccess');
            }else{
               $scope.err = res.data;
            }
           
         },function(err){
            alert("error");
         });
      }
         
  } 
  
});
proReg.controller("eventRegistration",function($scope,$http,$location){

   $http({
            method:'POST',
            url:"../php/getmainevent.php",
            data:{"verify":'verified'}  
         }).then(function(res){
          $scope.allmaievent= angular.copy(res.data.allevent);
         },function(err){
            console.log(err);
         }); 
         $http({
            method:'POST',
            url:"../php/getsubevent.php",
            data:{"verify":'verified',"meid":1}  
         }).then(function(res){
          $scope.allsubevent=res.data.allevent;
         },function(err){
            alert("error");
            console.log(err);
         });  
   $scope.getSubEvent = function(subevent){
     $http({
            method:'POST',
            url:"../php/getsubevent.php",
            data:{"verify":'verified',"meid":subevent}  
         }).then(function(res){
          $scope.allsubevent=res.data.allevent;
         },function(err){
            alert("error");
            console.log(err);
         });
   }   
   $scope.selectEvent = function(event){
      $scope.selectedevent = event;
   }   
   $scope.eventRegister = function(event)
  {
      $scope.techid = document.querySelector("#techid").value;
      $scope.svnt = document.querySelector("#selectedevent").value;
      var valid =($scope.techid!="")||($scope.svnt!="");
      if(valid)
      {
        $http({
            method:'POST',
            url:"../php/eventregister.php",
            data:{"verify":'verifed',"techid":techid,"selectedevent":svnt}  
         }).then(function(res){
            console.log(res);
          
         },function(err){
            alert("error");
            console.log(err);
         });
      }
         
  } 
});
