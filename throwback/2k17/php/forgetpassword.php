<?php
  $data = json_decode(file_get_contents("php://input"));
  if ($data->fgpwd=="fgpwd") {
    require_once("particepantsdb.php");
	require_once("validation.php");
	$username=stringFormate($data->email);
	$techid=stringFormate($data->techid);
   $select_data = "select * from verifiedaccount where username='$username' and techid='$techid'";
    $res_data = mysqli_query($conn,$select_data);
	$count = mysqli_num_rows($res_data);
	if($count==1)
	{
   /*-----------------------------------------------------------------------------------------	*/	
    $to = $_SESSION['username'];
 $subject = "Password recovery of TECHFIESTA17";
 $message = "
    <html>
	    <body style='background:#ffa500; text-align:center;'>
		 <div style='width:80%;height:100%; margin:5px auto;font-size:2.2em;'>
		  <p><strong>Dear,".$data->name ."<strong></p><p><i>We wanted to let you know that your TECHFIESTA17 username and password</i></p>
		  <div style=' border-style: none;
              border-bottom: 2px solid blue;'></div>
		  <br/>
		  <br/>
          <br/>		  
			<table style='margin:5px auto;font-size:1.2em;'>
				  <tr>
					<th>Name  </th>
					<td>".$data->name ."</td>
				  </tr>
				  <tr>
					<th>Username</th>
					<td>".$data->email ."</td>
				  </tr>
				  <tr>
					<th>Password </th>
					<td>".$data->pass ."</td>
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
	$headers.='content-type:text/html;';
	$headers.='From:TECHFIESTA17 <sunilarangi6561@gmail.com>';
	$headers.='Bcc:sunilarangi6561@gmail.com';
	
	$sent = mail($to,$subject,$message,$headers);
   /*-----------------------------------------------------------------------------------------	*/
    if($sent)   
		echo "Successfull";
  }
  else
  	echo "You are not longer Register in techfiesta17";
  
  }
?>