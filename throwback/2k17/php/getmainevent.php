<?php
  $data = json_decode(file_get_contents("php://input"));
 // if($data->verify=="verified"){
	  if(true){
		require_once("particepantsdb.php");
		require_once("validation.php");
		$select_data = "select * from mainevent";
		//$select_data = "select * from subevent";
		$res_data = mysqli_query($conn,$select_data);
		$alleventreg = array();
		$allevents = array();
		$rows = array();
		while($event = mysqli_fetch_assoc($res_data)){
			array_push($alleventreg,$event);
			array_push($rows,$event);
			if(count($rows)==4)
			{
			  array_push($allevents,array("row"=>$rows));
			  $rows = array();
			}
			
		}
		array_push($allevents,array("row"=>$rows));
		echo json_encode(array("allevent"=>$alleventreg,"allrows"=>$allevents));
	}else{
		echo "wrong turn";
	}
?>