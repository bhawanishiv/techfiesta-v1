<?php

//$stdid ='159011001055';
  
            if(true)
		{
	//------------------------------------------------------------------------------  
	  date_default_timezone_set('asia/kolkata');  //Time jone
	  echo $date = Date('Y-m-d H:i:s');                //Login Time
          echo "<br>";

	//------------------------------------------------------------------------------  
	 echo $ip = $_SERVER['REMOTE_ADDR'];             // Obtains the IP address
      $dname = gethostbyaddr($ip);               //Host name
	 // echo $ip = bin2hex(inet_pton("$ip"));    //Hexdecimal IP 
 echo "<br>";
	//------------------------------------------------------------------------------
	ob_start();
		//system('ipconfig /all');
	 
	// Capture the output into a variable
		// $mycom=ob_get_contents();
	// Clean (erase) the output buffer
		//	ob_clean();
	 
	$findme = "Physical";
	//Search the "Physical" | Find the position of Physical text
		//$pmac = strpos($mycom, $findme);
	 
	// Get Physical Address
		$mac=  '0000000000';//substr($mycom,($pmac+36),17);
	//Display Mac Address
	//------------------------------------------------------------------------------
	   echo $last = "update students set lastlogin = '$date',raddrip='$ip',device='$dname',mac='$mac' where regid = '$stdid'"; 
	 // $log =mysqli_query($conn,$last);
	  //echo "<br/>";
	  //echo inet_ntop(hex2bin( $ip));
	  
  }

?>

