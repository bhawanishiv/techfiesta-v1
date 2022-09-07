 <div ng-controller="loginCntrl">
          
            <div class="ltitle">Login into Techfiesta'17</div>

          <br/>
          <div style="color: red;text-align: center;">{{err}}</div>
          <br/>  
            <input id="username" class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="email" type="email" name="email" required ng-blur="loginDataValidate('username');">
            <input id="password" class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="password" type="password" name="password" required ng-mouseout="loginDataValidate('password');">
              <br/><br/>
            <input type="button" class="inputb btn btn-primary btn-sm col-xs-3 col-ms-3 col-md-2 col-md-offset-5 col-xs-offset-5"  name="login" value="Login" ng-click="accountLogin('login');">
             <br/><br/>  
<a class="forgetlink col-ms-6 col-md-6   pull-left" ng-click="changePage('fgpwd')">Forgot Password ?</a>
</div>
 