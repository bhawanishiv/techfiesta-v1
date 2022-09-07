<?php
  $data = json_decode(file_get_contents("php://input"));
  session_start();
  if(isset($_SESSION['access'])&&($_SESSION['techid']==$data->admintechid)&&($_SESSION['access']=='yes'))
  { 
    require_once("particepantsdb.php");
	require_once("validation.php");
	$vid = stringFormate($data->vid);
	$vemail = stringFormate($data->vemail);
	$check_data = "select * from verifiedaccount where username= '$vemail'";
	$count = mysqli_num_rows(mysqli_query($conn,$check_data));
    if($count==0)
    {
		//$move_qry = "INSERT verifiedaccount SELECT techid,name,username,mobile,gender,type,year,stream,institute,pass,access,ipaddress,lastip from particepants where id='$vid' and username='$vemail'";
		$move_qry="INSERT INTO verifiedaccount(techid,name,username,mobile,gender,type,year,stream,institute,pass,access,ipaddress,lastip) SELECT techid,name,username,mobile,gender,type,year,stream,institute,pass,access,ipaddress,lastip from particepants where id='$vid' and username='$vemail'";
		$movedata = mysqli_query($conn,$move_qry);
		if($movedata){
			$lid_qry = "select * from verifiedaccount order by id desc limit 1";
			$lastid_res = mysqli_query($conn,$lid_qry);
            $lastid = mysqli_fetch_assoc($lastid_res);			
			if($lastid['type']=="college")
				$vftechid = "SAC/TF17/ABC/".$lastid['id'];
			else if($lastid['type']=="school")
				$vftechid = "SAC/TF17/XYZ/".$lastid['id'];	
			
		$update_qry1 = "update particepants set techid = '$vftechid' where id =$vid";
		$update_qry2 = "update verifiedaccount set techid = '$vftechid' where id =$lastid[id]";
		$ok1 = mysqli_query($conn,$update_qry1);
		$ok2 = mysqli_query($conn,$update_qry2);	
		if($movedata&&$ok1&&$ok2){
			$_SESSION['vsid']=$lastid['id'];
			$_SESSION['vstechid']=$vftechid;
			$_SESSION['vsusername']=$vemail;
			   /*-----------------------------------------------------------------------------------------	*/	
    $to = $_SESSION['vsusername'];
 $subject = "Account Verification of TECHFIESTA17";
 $message = "
    <html>
	    <body style='background:#ffa500; text-align:center;'>
		 <div style='width:80%;height:100%; margin:5px auto;font-size:2.2em;'>
		  <p><strong>Dear Particepants,<strong></p><p><i> Your TECHFIESTA17 account successfully verified</i></p>
		  <div style=' border-style: none;
              border-bottom: 2px solid blue;'></div>
		  <br/>
		  <span style=' border-style: none;
              border-bottom: 2px solid green;'>Your Verified detaild
		  </span>
		  <br/>
          <br/>		  
			<table style='margin:5px auto;font-size:1.2em;'>
				  <tr>
					<th>Verificaion Id </th>
					<td>".$_SESSION['vsid']."</td>
				  </tr>
				  <tr>
					<th>Techfiesta Id </th>
					<td >".$_SESSION['vstechid']."</td>
				  </tr>
				  <tr>
					<th>Username</th>
					<td>".$_SESSION['username']."</td>
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
    if($sent && $res)   
		echo "Successfull";
			
			
		}			
		}else{
			echo "Something went wrong in verification";
		}	
			
	}else{
			echo "Your account is already verified";
		}
  }else{
	  echo "You are not permited for verification this account";
  }	
?>