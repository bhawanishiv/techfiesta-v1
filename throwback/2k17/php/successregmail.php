
<?php
 $subject = "Your Registration Ok";
 $message = "
    <html>
	    <head>
		  <meta charset='utf-8'>
		</head>
	    <body style='background:#ffa500; text-align:center;border-radius: 5px;'>
		 <div style='width:100%;margin:5px auto;font-size:2.2em;height:600px;'>
		  <p><strong>Congratulations, ABC<strong></p><p><i> You are successfully register in TECHFIESTA17</i></p>
		  <div style=' border-style: none;
              border-bottom: 2px solid blue;'></div>
		  <br/>
		  <span style=' border-style: none;
              border-bottom: 2px solid green;'>Your registered details 
		  </span>
		  <br/>
          <br/>		  
			<table style='margin:5px auto;font-size:1.2em;'>
				  <tr>
					<th>Reg. Id. </th>
					<td>76</td>
				  </tr>
				  <tr>
					<th>Techfiesta Id </th>
					<td >SAC/TF17/CLG/86</td>
				  </tr>
				  <tr>
					<th>Name  </th>
					<td>Sunil Kumar</td>
				  </tr>
				  <tr>
					<th>Username</th>
					<td>sunilarangi6561@gmail.com</td>
				  </tr>
				  <tr>
					<th>Institution Name</th>
					<td>Ramgarh Engineering College, Ramgarh</td>
				  </tr>
			   <tr>
					<th>Gender</th>
					<td>Male</td>
				  </tr>
				  <tr>
					<th>Year</th>
					<td>2nd</td>
				  </tr>
				  <tr>
					<th>Stream</th>
					<td >CSE</td>
				  </tr>
				   </tbody>
			</table>
			<p>Further, any query 
			<a href='http://techfiesta.org/contact_us.php'>click here</a>
			</p>
			<div style='float:left'>
			 <div>Thanks & Regards</div>
             <div>Techfiesta Team</div>	
		  </div> 
		</div>
       	
	    </body>
	</html>
	";
	$toid=array('sunilarangi6561@gmail.com');
	$toname=array('Sunil Kumar');
	 require_once("techmailsend.php");
	if($ok)
		echo "MAIL SENT";
	else 
		echo "MAIL NOT SENT";
	
?>