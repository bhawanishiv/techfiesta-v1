<?php
  session_start();
  if(empty($_SESSION['username']))
	header("location:http://localhost:100/project/registerall.html#!/login");  
?>
<div ng-controller="loginCntrl">

   <h2 class="ltitle">You are Successfully Register in Techfiesta'17</h2>
      <table>
          
          <tr>
            <th>Reg. Id. </th>
            <td><?php echo $_SESSION['regid'];?></td>
          </tr>
          <tr>
            <th>Techfiesta Id </th>
            <td ><?php if(isset($_SESSION['techid'])) echo $_SESSION['techid'];?></td>
          </tr>
          <tr>
            <th>Name  </th>
            <td><?php echo $_SESSION['name'];?></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><?php echo $_SESSION['username'];?></td>
          </tr>
          <tr>
            <th>Institution Name</th>
            <td><?php echo $_SESSION['institute'];?></td>
          </tr>
		   <tr>
            <th>Gender</th>
            <td><?php echo $_SESSION['gender'];?></td>
          </tr>
          <tr>
            <th>Year</th>
            <td><?php echo $_SESSION['year'];?></td>
          </tr>
          <tr>
            <th>Stream</th>
            <td ><?php echo $_SESSION['stream'];?></td>
          </tr>
           </tbody>
    </table>
</div>         