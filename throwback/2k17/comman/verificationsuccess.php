<?php
  session_start();
  if(empty($_SESSION['username']))
	header("location:http://techfiesta.org/registerall.php#!/login");  
?>
<div ng-controller="proregisterContrl">
            <br/><br/><br/>
            <div class="ltitle">Your verification Successfully.</div>
            <br/>
			<table>
				  <tr>
					<th>Verification Id </th>
					<td><?php echo $_SESSION['vsid'];?></td>
				  </tr>
				  <tr>
					<th>Techfiesta Id </th>
					<td ><?php if(isset($_SESSION['vstechid'])) echo $_SESSION['vstechid'];?></td>
				  </tr>
				  <tr>
					<th>Username </th>
					<td><?php echo $_SESSION['vsusername'];?></td>
				  </tr>
            </table>
</div>