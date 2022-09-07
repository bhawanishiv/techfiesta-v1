<div ng-controller="registerCntrl">
    <!--  <div class="ltitle">Register into Techfiesta'17</div> -->
    <div style="color: red;text-align: center;">{{err}}</div>
      <br/>
      <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="name" type="text" name="name" id="name" required ng-blur="regDataValidate('name');">
      <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="email" type="email" name="email" id="email" required ng-blur="regDataValidate('email');">
      <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="mobile" type="number" id="mobile" name="mobile" ng-blur="regDataValidate('mobile');">
       <div class="form-group col-md-offset-1">
        <label for="gender" class="col-xs-4 col-ms-3 col-md-3 btngender control-lavel">Gender</label>
        <input class=" col-xs-1 col-ms-1 col-md-1" type="radio" name="gender" id="male"checked value="male">
        <label for="male" class="col-xs-3 col-ms-3 col-md-3 btngender control-lavel">Male</label>
       <input class="col-xs-1 col-ms-1 col-md-2 " type="radio" name="gender" id="female" value="female">
       <label for="female" class="col-xs-3 col-ms-3 col-md-3 btngender control-lavel">Female</label>
       </div>
       <div class="form-group col-md-offset-1">
        <label for="gender" class="col-xs-4 col-ms-3 col-md-3  btngender control-lavel">Institution</label>
       <input class=" col-xs-1 col-ms-1 col-md-1 col-xs-offset-1" type="radio" name="itype" id="college" value="college" checked>
        <label for="college" class="col-xs-3 col-md-3 btngender control-lavel" >College</label>
       <input class="col-xs-1 col-ms-1 col-md-2" type="radio" name="itype" id="school" value="school">
       <label for="school" class="col-xs-3 btngender col-md-3 control-lavel">School</label>
       </div>
       <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="institute" type="text" id="institute" name="institute" required ng-blur="regDataValidate('institute');">
       <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="year" type="text" id="year" name="year" required ng-blur="regDataValidate('year');">
       <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="stream" type="text" id="stream" name="stream" ng-blur="regDataValidate('stream');">
       <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="password" type="password" id="password" name="password" required ng-change="regDataValidate('password');" ng-model="pass">
       <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="confirm password" type="password" id="cpassword" name="cpassword" required ng-change="regDataValidate('cpassword');" ng-model="cpass">
        <div id="ok">
          <input type="button" class="inputb btn btn-primary btn-sm col-xs-3 col-ms-3 col-md-2 col-md-offset-5 col-xs-offset-5"  name="register" value="Register" ng-click="techRegister('register')">
        </div>  
</div>