<?php
/**
* @Programmer: AES
* @Created: 29 June 2015
* @Modified: 
* @Description: Restart Raspberrypi device 
* Please change ':8080' ip address. 
**/
include("include/functions.php");
	$tblName = 'ss_restart_system_log';
	$disCol = "*";
	$where = "";
	$returnResourceContent = selectQuery($tblName, $disCol, $where, $order_col = '', $order_by = '', $group_by = '', $disQuery = '');

	//$aResultFilterTotal = mysql_fetch_assoc($returnResourceContent);
	
	//print_r($aResultFilterTotal);
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
		<title>WELCOME | Securedshowing Restart System Log</title>
		
		<!--<link href="css/styles.css" rel="stylesheet" type="text/css" />-->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		
		<!--[if lt IE 9]>
		  <script src="js/html5shiv.min.js"></script>
		  <script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body >
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h2 class="panel-title">Restart System Log</h2>
		  </div>
		</div>
		<div class="container" >
			

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="col-md-1">Row</th>
                <th class="col-md-2">Restart Time</th>
                <th class="col-md-3">Action</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$i= 1;
		if(!empty($returnResourceContent))
	   {
			while ($aRow = mysql_fetch_array($returnResourceContent)) 
			{
			?>
				<tr>
					<td><?php  echo $i;?></td>
					<td><?php echo date('m/d/Y H:i A',strtotime($aRow['sr_restart_time']));  ?></td>
					<td><?php print_r($aRow['status']); ?></td>
				</tr>
			<?php 
			$i++;
			} 
		}else
		{
		?>
		<tr>
					<td colspan='3' align='middle'><div class="alert alert-danger">No Records</div></td>
					
				</tr>
		<?php } ?>		
			</tbody>

    </table>


		</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>