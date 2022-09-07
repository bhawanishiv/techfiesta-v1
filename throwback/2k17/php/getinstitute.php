<?php
require_once("particepantsdb.php");
 $type1 = 'college2';
 $type2 = 'school';
 if($type1=='college')
 {
	$get_clg_query = 'select * from college'; 
 }
 else
 {
	$get_clg_query = 'select * from particepants';  
 }
 $res_data = mysqli_query($conn,$get_clg_query);
 $result = array();
 while($data = mysqli_fetch_assoc($res_data))
 {
	array_push($result,$data);
 }
 echo json_encode(array("result"=>$result));
?>
