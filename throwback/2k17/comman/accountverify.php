<?php
  session_start();
  if(isset($_SESSION['access']))
  {
    if(!empty($_SESSION['username'])&&$_SESSION['access']=='yes')
    {
?>	
<div class="col-md-offset-1" ng-controller="proregisterContrl">
   <div style="color: red;text-align: center;">{{err}}</div>
    <div class="row">
          <div>
            <label for="regid" class="col-ms-4" style="padding-right: 10px;">Reg Id</label>
            <input type="text" class="inputf col-md-offset-1 col-ms-6" name="regid" id="regid">
          </div>
          <br/>
          <div>
            <label for="email" class="col-ms-4">Email Id</label>
            <input class="inputf col-md-offset-1 col-ms-6 " type="text" name="email" id="email">
          </div>
           <br/>
          <div>
            <input type="button" class="btn btn-primary col-md-offset-3 col-xs-offset-4" name="search" value="Search" id="search" ng-click="accountVerity('verify');">
          </div>
    </div>
    <hr/>  
    <div class="row">
      <div>
          <table>
             <tbody>
              <tr>
                <th>Reg. Id. </th>
                <td>{{vid}}</td>
              </tr>
              <tr>
                <th>Techfiesta Id </th>
                <td >{{vtechid}}</td>
              </tr>
              <tr>
                <th>Name  </th>
                <td>{{vname}}</td>
              </tr>
              <tr>
                <th>Email </th>
                <td>{{vemail}}</td>
              </tr>
              <tr>
                <th>Institution Name</th>
                <td>{{vinstitute}}</td>
              </tr>
           <tr>
                <th>Gender</th>
                <td>{{vgender}}</td>
              </tr>
              <tr>
                <th>Year</th>
                <td>{{vyear}}</td>
              </tr>
              <tr>
                <th>Stream</th>
                <td >{{vstream}}</td>
              </tr>
               </tbody>
        </table>
      </div>   
    </div>
     <hr/>
    <div class="row">
      <div>
          <label for="email" class="col-ms-4">Your Tech Id</label>
          <input class=" col-ms-6" type="text" name="techid" id="admintechid">
          </div>
          <br/>
          <div>
            <input type="button" class="btn btn-primary col-md-offset-3 col-xs-offset-4" value="Verify" name="verify" ng-blur="verifyDone(vid,vemail)" id="verify">
          </div>
     </div>
</div> 	
<?php  
    }else{
		header("location:http://techfiesta.org/registerall.php#!/login");
      echo "<div style='color: red;text-align: center;'>You are not permited to enter this zone</div>";
    }
  }
?>
