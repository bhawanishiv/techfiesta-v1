<?php
  session_start();
  if(isset($_SESSION['access']))
  {
    if(!empty($_SESSION['username'])&&$_SESSION['access']=='yes')
    {
?>
<div ng-controller="proregisterContrl">
          
            <div class="ltitle">Update Notifications</div>
          <br/><br/>  
            <textarea id="message" class="col-xs-11 col-ms-11 col-md-10 col-md-offset-1" placeholder="write your message" name="message" required>
              
            </textarea>
           
              <br/><br/>
            <input type="button" class="sendbtn btn btn-primary btn-sm col-xs-3 col-ms-3 col-md-2 col-md-offset-5 col-xs-offset-5"  name="send" value="Send" ng-click="updateNotification('update');">
             <br/><br/>  
</div>
<?php  
    }else{
		header("location:http://techfiesta.org/registerall.php#!/login");
      echo "<div style='color: red;text-align: center;'>You are not permited to enter this zone</div>";
    }
  }
?>