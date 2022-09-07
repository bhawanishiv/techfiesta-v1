$(document).ready(function(){
                $("#about").hide(50);
                $("#rules").hide(50);
                $("#arena").hide(50);
                $("#specifications").hide(50);
                $("#contact").hide(50);
           $("#aboutbtn").click(function(){
                $("#abouts").show(500);
                $("#rules").hide(50);
                $("#arena").hide(50);
                $("#specifications").hide(50);
                $("#contact").hide(50);
            });
           $("#rulesbtn").click(function(){
                $("#abouts").hide(50);
                $("#rules").show(500);
                $("#arena").hide(50);
                $("#specifications").hide(50);
                $("#contact").hide(50);
            });
            $("#arenabtn").click(function(){
                $("#abouts").hide(50);
                $("#rules").hide(50);
                $("#arena").show(500);
                $("#specifications").hide(50);
                $("#contact").hide(50);
            });
           $("#specificationsbtn").click(function(){
                $("#abouts").hide(50);
                $("#rules").hide(50);
                $("#arena").hide(50);
                $("#specifications").show(500);
                $("#contact").hide(50);
            });
           $("#contactbtn").click(function(){
                $("#abouts").hide(50);
                $("#rules").hide(50);
                $("#arena").hide(50);
                $("#specifications").hide(50);
                $("#contact").show(500);
            });
      });
 $(window).load(function() { 
         // $('#event1').circleType({dir: -1, radius:60});
          $('#event2').circleType({dir: -1, radius:60});
          $('#event3').circleType({dir: -1, radius:60});
          $("#heading1").fitText();
          $("#heading2").fitText();
          $("#heading3").fitText();
          $("#heading4").fitText();
          $("figcaption").fitText().css({"text-align":"center",
                                       "text-transform":"uppercase",
                                        "text-shadow":"blue -1px 1px 3px,blue 1px 1px 3px",
                                        "font-size":"1em"
                                       });
        });
var eventapp =angular.module("eventsCntrl",[]);
eventapp.controller("eventsData",function($scope,$http,$location){

   $http({
            method:'POST',
            url:"../php/getmainevent.php",
            data:{"verify":'verified'}  
         }).then(function(res){
         	
          $scope.allmaievent= angular.copy(res.data.allrows);
         },function(err){
            
            console.log(err);
         });  
   $scope.items ="item";
   $scope.maindts =true;
   $scope.show = function(id){

    document.getElementById(id).style.height = "96%";
   }
   $scope.getsubevent = function(id){
    
    $http({
            method:'POST',
            url:"../php/getsubevent.php",
            data:{"verify":'verified',"meid":id}  
         }).then(function(res){
          $scope.allevent =res.data.allevent; 
         },function(err){
            
            console.log(err);
         }); 
   }
   $scope.hide = function(id){
    //alert("ok");
    document.getElementById(id).style.height = "0%";
   }
   $scope.getSelectedEvent = function(subevent){
    for(var i=0;i<$scope.allevent.length;i++)
     {
        if(subevent==$scope.allevent[i].seid)
        {
         //alert(subevent+$scope.allevent[i].seid);
        $scope.ename = $scope.allevent[i].subevent_name;
          $scope.details = $scope.allevent[i].details;
          $scope.about = $scope.allevent[i].about;
          $scope.rules = $scope.allevent[i].rules;
          $scope.contact = $scope.allevent[i].contact;
          $scope.arena = $scope.allevent[i].arena;
          $scope.specifications = $scope.allevent[i].specifications;
        }

     }
   $scope.maindts =false;
   $scope.subdts =true;
     
   } 
   $scope.gotomain=function(){
    $scope.maindts =true;
   $scope.subdts =false;
   }
    
});