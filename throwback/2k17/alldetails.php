<?php
  session_start();
  if(empty($_SESSION['username']))
	header("location:http://localhost:100/project/registerall.html#!/login");  
?>

<!DOCTYPE html>
<html>
	<head>
		<title>TECHFIESTA 2017</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width" initial-scale-1.0>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/comman/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="js/lib/jquery.js"></script>
    <script type="text/javascript" src="js/lib/angular.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<style>
	
	@media (min-width:668px){
	  .col1,.col4,.col5{
		  width:120px;
	  }
	  .col2,.col3{
		width:300px;
	  }
	  .col6,.col7{
		  width:385px;
	  }
	}
	@media (max-width:668px){
	  .col1,.col4,.col5{
		  width:100px;
	  }
	  .col2,.col3{
		width:200px;
	  }
	  .col6,.col7{
		  width:285px;
	  }
	}
	  tr{
		  padding:30px 10px !important;
		  color:#fff;
		  background:#000;
		  border-top:1px #fff;
	  }
	  .tablecontent{
		  overflow:auto;
	  }
	</style>
	</head>
<body>
    <div ng-app="proregister">
      
      <div ng-include="'comman/header.php'" ></div>
      <div ng-include="'comman/update.php'" ></div>   
<!-- Register Coading  Start --> 
    
                   
    <div class="col-md-10 col-xs-12 col-ms-11">
      <div class="tablecontent">
        <!-- <div ng-view></div>  -->
		    <table>
			    <tr>
				  <th class="col1">V.Id</th><th class="col2">Name</th><th class="col3">Tech. Id</th><th class="col4">Year</th><th class="col5">Stream</th><th class="col6">Email</th><th class="col7">Institution</th>
				</tr>
				<?php
                  require_once("particepantsdb.php");
				  
				  $select_qry = "select id,name,username,techid,year,stream,institute,access from verifiedaccount";
				  $res = mysql_query($select_qry);
				  while($data = mysql_fetch_assoc($res))
				  {
				?>
					 <tr>
					  <th class="col1"><?php echo $data['id']; ?></th><th class="col2"><?php echo $data['name']; ?></th><th class="col3"><?php echo $data['techid']; ?></th><th class="col4"><?php echo $data['year']; ?></th><th class="col5"><?php echo $data['stream']; ?></th><th class="col6"><?php echo $data['username']; ?></th><th class="col7"><?php echo $data['institute']; ?></th>
					</tr>
					
				<?php
				  }
				?>
			</table>

  </div> 
</div>        
<!-- Register Coading End  -->
   
      <div ng-include="'comman/footer.php'" ></div>   
  </div>
</div>       
       <script type="text/javascript" src="js/header/header.js"></script>
	</body>
</html>