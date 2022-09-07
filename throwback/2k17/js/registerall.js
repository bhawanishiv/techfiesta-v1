var regapp = angular.module("reg",["ngRoute"]);

regapp.config(function($routeProvider){
      $routeProvider.when("/login",{
         templateUrl:"comman/login.php"
      }).when("/register",{
          templateUrl:"comman/register.php"
      }).when("/fgpwd",{
          templateUrl:"comman/forgotpass.php"
      }).when("/regsuccessphp",{
          templateUrl:"comman/regsuccessphp.php"
      }).when("/fgrequest",{
          templateUrl:"comman/fgrequest.php"
      });
});

regapp.controller("changeCntrl",function($scope,$http,$location){
   $location.url("/login");
   $scope.changePage = function(pagetype)
                        {
                           if(pagetype=='login')
                           {
                              $location.url('/login');
                           }
                           if(pagetype=='register')
                           {
                              $location.url('/register');
                           }
                           if(pagetype=='fgpwd')
                           {
                              $location.url('/fgpwd');
                           }
                        }


});
regapp.controller("registerCntrl",function($scope,$http,$location){
   $scope.emailprt = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/ ;
   $scope.mobileprt =/^(\+[\d]{1,5}|0)?[7-9]\d{9}$/; 
   $scope.regDataValidate = function(elementid)
  { 
    var element =  document.querySelector("#"+elementid);
    var unval =element.value; 
    var flag = true;
  
   // alert(elementid+" = "+unval);
    if(unval.length=="")
    {
       flag = false;
    }
    if(!$scope.emailprt.test(unval) && elementid=="email")
    {

      flag = false;
    }
    if(!$scope.mobileprt.test(unval) && elementid=="mobile")
    {

      flag = false;
    }
    if(elementid=="password")
    {
      /*
      var spchar;
      var chars;
      var num;
      if(/^[a-zA-Z]+$/.test(unval)){
        chars=true;
       // alert("CHAR");
      }
      if (/^[!@#$%&*"?]+$/.test(unval)) {
        spchar=true;
        //alert("SCHAR");
      }
      if (/^[0-9]+$/.test(unval)) {
        num=true;
        //alert("NUM");
      }
      if(char||spchar||num)
      {
        element.style.borderColor="yellow";
      }
      if((char&&spchar)||(spchar&&num)||(num&&char))
      {
       element.style.borderColor="orange";
      }
      if(char&&spchar&&num){
        element.style.borderColor="green";
      }*/
      $scope.password = unval;
       
    }
    if(elementid=="cpassword")
    {
      flag =false;
    }
    if(elementid=="cpassword" && $scope.password==unval)
    {
      flag = true;
    }
    if(true)
    {
       if(flag)
        {
           element.style.borderColor="green";
        }else{
          element.style.borderColor="red";
        }
    }
  }
 $scope.techRegister = function(register)
  {
      var name = document.querySelector("#name").value;
      var email = document.querySelector("#email").value;
     var mobile = document.querySelector("#mobile").value;
      var insttype =document.querySelector("input[name='itype']:checked").value;
      var gender =document.querySelector("input[name='gender']:checked").value;
      var institute = document.querySelector("#institute").value;
      var year = document.querySelector("#year").value;
      var branch = document.querySelector("#stream").value;
      var password = document.querySelector("#password").value;
      var cpassword = document.querySelector("#cpassword").value;
      var val =(name!="")&&(email!="")&&(insttype!="")&&(gender!="")&&(institute!="")&&(year!="")&&(branch!="")&&(password!="")&&(cpassword!="");
      //console.log(val);
       if((password==cpassword)&&val)
       {
        //alert("Name : "+name+",Email : "+email+",Mobile : "+mobile+",Gender : "+gender+",Insttype : "+insttype+",Institute : "+institute+",Year : "+year+",Stream : "+branch+",Pass : "+password+",Cpass : "+cpassword);
          $http({
            method:'POST',
            url:"../php/register.php",
            data:{"verify":"done","name":name,"email":email,"mobile":mobile,"gender":gender,"insttype":insttype,"institute":institute,"year":year,"stream":branch,"password":password}
      
         }).then(function(res){
            if(res.data=="Successfull")
             $location.url('/regsuccessphp');
            else
              $scope.err=res.data;
         },function(err){
            console.log(err);
         });
       }
       else
       {
          $scope.err = "Please enter valid data";
       }
        
  }
});
regapp.controller("loginCntrl",function($scope,$http,$location){
    $scope.ok = [];
    var valid = true;
    $scope.emailprt = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/ ;
  $scope.loginDataValidate = function(elementid)
  { 
    var element =  document.querySelector("#"+elementid);
    var unval =element.value; 
    var flag = true;
    $scope.err="";
    if(unval.length=="")
    {
       flag = false;
    }
    if(!$scope.emailprt.test(unval) && elementid=="username")
    {
      flag = false;
    }
    if(flag)
    {
       valid = true;
       element.style.borderColor="green";
    }else{
      valid =false;
      element.style.borderColor="red";
    }
  }
  $scope.accountLogin = function(login)
  {
      $scope.username = document.querySelector("#username").value;
      $scope.password = document.querySelector("#password").value;
      if(valid)
      {
        $http({
            method:'POST',
            url:"../php/login.php",
            data:{"login":login,"username":$scope.username,"password":$scope.password}  
         }).then(function(res){
         // console.log(res);
          if(res.data=="successadmin")
            window.location='privateregister.php';
          else if(res.data=="successuser")
            window.location='protectedregister.php';
          else
            $scope.err = res.data;
           
         },function(err){
            alert("error");
            console.log(err);
         });
      }
         
  }
});
regapp.controller("fgpwdCntrl",function($scope,$http,$location){
     $scope.fgPassword = function(fgpwd)
     {
        $scope.username = document.querySelector("#username").value;
        $scope.techid = document.querySelector("#techid").value;
        $http({
            method:'POST',
            url:"../php/forgetpassword.php",
            data:{"fgpwd":fgpwd,"username":$scope.username,"techid":$scope.techid}  
         }).then(function(res){
         // console.log(res);
          if(res.data=="Successfull")
           $location.url('/fgrequest');
          else
            $scope.err = res.data;
           
         },function(err){
            //alert("error");
            console.log(err);
         });
     }
});
regapp.controller("update",function($scope,$http,$interval){

     $http({
            method:'POST',
            url:"../php/getnotification.php",
            data:{header:true}
      
         }).then(function(res){
            
            $scope.allnotice=res.data.notification;
         },function(err){
            //alert("error");
            console.log(err);
         });
});




