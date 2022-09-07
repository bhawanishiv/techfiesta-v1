<div ng-controller="fgpwdCntrl">
       
        <div class="ltitle">Reset Password</div>
      <br/><br/>  
       <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="email" type="email" name="username" id="username" required>
        <input class="inputf col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="techfiesta id" type="text" name="techid" id="techid" required>
        <div class="row">
        <input type="button" class="fbutton btn btn-primary btn-sm col-xs-3 col-ms-3 col-md-2 col-md-offset-3 col-xs-offset-3" ng-click="fgPassword('reset')" value="Reset">
        <a type="button" class="fbutton btn btn-primary btn-sm col-xs-3 col-ms-3 col-md-2 col-md-offset-1 col-xs-offset-1" href="contact_us.php">Contact Us</a>
        </div>
</div>