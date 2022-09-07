<?php
  $data = json_decode(file_get_contents("php://input"));
  if ($data->verify=="done") {
    require_once("particepantsdb.php");
	require_once("validation.php");
	$name=stringFormate($data->name);
	$username=stringFormate($data->email);
	$mobile=stringFormate($data->mobile);
	$gender=stringFormate($data->gender);
	$itype=stringFormate($data->insttype);
	$year=stringFormate($data->year);
	$stream=stringFormate($data->stream);
	$institute=stringFormate($data->institute);
	$pass=stringFormate($data->password);
	$ipadd = $_SERVER['REMOTE_ADDR'];
  	$inst_data = "insert into particepants(name,username,mobile,gender,type,year,stream,institute,pass,ipaddress) values('$name','$username','$mobile','$gender','$itype','$year','$stream','$institute','$pass','$ipadd')";
    $res = mysqli_query($conn,$inst_data);
	
  if($res)
  {
	    if(isset($_SESSION['username']))
		    session_destroy();
		session_start();
		$_SESSION['regid']=mysqli_insert_id($conn,);
		$_SESSION['name']=$data->name;
		$_SESSION['username']=$data->email;
		$_SESSION['institute']=$data->institute;
		$_SESSION['gender']=$data->gender;
		$_SESSION['stream']=$data->stream;
		$_SESSION['year']=$data->year;
   /*-----------------------------------------------------------------------------------------	*/	
    $to = $_SESSION['username'];
 $subject = "Registration in TECHFIESTA17";
 $message = "
    <html>
	    <body style='background:#ffa500; text-align:center;'>
		 <div style='width:80%;height:100%; margin:5px auto;font-size:1.2em;'>
		  <p><strong>Congratulations,".$_SESSION['name']."<strong></p><p><i> You are successfully register in TECHFIESTA17</i></p>
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
					<td>".$_SESSION['regid']."</td>
				  </tr>
				  <tr>
					<th>Techfiesta Id </th>
					<td >-----------</td>
				  </tr>
				  <tr>
					<th>Name  </th>
					<td>".$_SESSION['name']."</td>
				  </tr>
				  <tr>
					<th>Username</th>
					<td>".$_SESSION['username']."</td>
				  </tr>
				  <tr>
					<th>Institution Name</th>
					<td>".$_SESSION['institute']."</td>
				  </tr>
			   <tr>
					<th>Gender</th>
					<td>".$_SESSION['gender']."</td>
				  </tr>
				  <tr>
					<th>Year</th>
					<td>".$_SESSION['year']."</td>
				  </tr>
				  <tr>
					<th>Stream</th>
					<td >".$_SESSION['stream']."</td>
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
	$headers = 'MIME-Version:1.01';
	$headers.='content-type:text/html';
	$headers.='From:TECHFIESTA17 <sunilarangi6561@gmail.com>';
	$headers.='Bcc:sunilarangi6561@gmail.com';
	
	$sent = mail($to,$subject,$message,$headers);
   /*-----------------------------------------------------------------------------------------	*/
    if($sent && $res)   
		echo "Successfull";
  }
  else
  	echo "You are Already Register";
  
  }
?>