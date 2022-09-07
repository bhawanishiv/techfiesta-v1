<?php
  $data = json_decode(file_get_contents("php://input"));
  if(true){
	// if(true){
	require_once("particepantsdb.php");
	require_once("validation.php");
  	//$select_data = "select * from subevent";
    $select_data = "select * from subevent where meid=$data->meid";
    $res_data = mysqli_query($conn,$select_data);
		$alleventreg = array();
		$allevents = array();
		$rows = array();
		while($event = mysqli_fetch_assoc($res_data)){
			$temp=array('id'=>$event['id'],'seid'=>$event['seid'],'meid'=>$event['meid'],'subevent_name'=>$event['subevent_name'],'max_num_part'=>$event['max_num_part'],'icons'=>$event['icons'],'event_time'=>$event['event_time'],'firstprize'=>$event['firstprize'],'secondprize'=>$event['secondprize'],'thirdprize'=>$event['thirdprize']);
			$temp['details'] = dataToArray($event['details']);
			$temp['about'] = dataToArray($event['about']);
			$temp['contact'] = dataToArray($event['contact']);
			$temp['rules'] = dataToArray($event['rules']);
			$temp['arena'] = dataToArray($event['arena']);
			$temp['specifications'] = dataToArray($event['specifications']);
			
			array_push($alleventreg,$temp);
			array_push($rows,$temp);
	/*		for($i=0;$i<count($exp);$i++)
				echo $exp[$i].'<br/>';
			echo '<br/><br/><br/>';  */
			//echo count($rows).'<br/>';
			if(count($rows)==4)
			{
			  array_push($allevents,array("row"=>$rows));
			  $rows = array();
			 // echo '<br/><br/><br/>';
			}
			
		}
		//print_r($rows);
		array_push($allevents,array("row"=>$rows));
		echo json_encode(array("allevent"=>$alleventreg,"allrows"=>$allevents));
	}else{
		echo "wrong turn";
	}
	
	function dataToArray($arr){
		return explode('@',$arr);
	}
?>