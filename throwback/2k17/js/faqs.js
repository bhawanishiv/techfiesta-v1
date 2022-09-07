
var regapp = angular.module("faqs",[]);

regapp.controller("faqscont",function($scope){
});

$(document).ready(function(){
    $(".collapse").on("shown.bs.collapse",function(){
        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
   });
    $(".collapse").on("hidden.bs.collapse",function(){
        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign"); 
    });
});