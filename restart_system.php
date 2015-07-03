<?php
session_start();
/**
* @Programmer: AES
* @Created: 29 June 2015
* @Modified: 
* @Description: Restart Raspberrypi device 
* Please change ':8080' ip address. 
**/

include("include/functions.php");

//$local_ip_address = $_SERVER[ 'SERVER_ADDR' ];  //142.136.226.205;
$host=gethostname();
$local_ip_address=gethostbyname($host);

$check_status = check_temp_responding($local_ip_address.':8080');
$tblName = 'ss_tbl_system_log';

if($check_status !='online')
{
	
	$disCol = "*";
	$where = "";
	$returnResourceContent = selectQuery($tblName, $disCol, $where, $order_col = '', $order_by = '', $group_by = '', $disQuery = '');
	
			
	 if (!empty($returnResourceContent)) 
	 {
		$data = mysql_fetch_row($returnResourceContent);
	 
		$updateCol = "sps_updated_time  ='" . date('Y-m-d H:i:s') . "'";
        $updateWhere = " sps_id   = " .$data['0'];
		$returnResource = updateQuery($tblName, $updateCol, $updateWhere, $disQuery = '');
		
	 }else
	 {
		
		//insert record in db.
			$insertData = array(
			'sps_updated_time' => date("Y-m-d H:i:s"),
			'sps_off_time' => date("Y-m-d H:i:s"),                        
			);
		//insert menu
		$returnResource = insertQuery($tblName, $insertData, $disQuery = '');
	 }

	$returnResourceContent = selectQuery($tblName, $disCol, $where, $order_col = '', $order_by = '', $group_by = '', $disQuery = '');
	$data = mysql_fetch_row($returnResourceContent);		
	 
	 $seconds = strtotime($data[2]) - strtotime($data[3]);
	 $hours = $seconds / 60 /  60;
	 $hours = round($hours);

	 // print_r($hours);exit;					
	if($hours >= 1)
	{
		$updateCol = '';
		$updateCol .= " sps_updated_time  ='" . date('Y-m-d H:i:s') ."',
					   sps_flag  ='1',
					   sps_off_time ='" . date('Y-m-d H:i:s') . "'";
        $updateWhere = " sps_id   = " .$data['0'];
		$returnResource = updateQuery($tblName, $updateCol, $updateWhere, $disQuery = '');
		
		
		//insert record in db.
			$tblName2 = "ss_restart_system_log";
			$insertData2 = array(
			'sr_restart_time' => date("Y-m-d H:i:s"),
			'status' => 'Device is Restart'
			
			);
		//insert menu
		$returnResource2 = insertQuery($tblName2, $insertData2, $disQuery = '');
		//executed restart device command
		//restart command here
		exec('sudo reboot');
		echo "restart command executed";
	}
} //if 
else
{
	$disCol = "*";
	$where = "";
	$returnResourceContent = selectQuery($tblName, $disCol, $where, $order_col = '', $order_by = '', $group_by = '', $disQuery = '');
	
	if(!empty($returnResourceContent))
	{
		$data = mysql_fetch_row($returnResourceContent);
		
		/*
		$seconds = strtotime($data[2]) - strtotime($data[3]);
		$hours = $seconds / 60 /  60;
		$hours = round($hours);
		if($hours >= 1)
		{
			
		}
		*/
		//insert record in db.
			$tblName2 = "ss_restart_system_log";
			$insertData2 = array(
			'sr_restart_time' => date("Y-m-d H:i:s"),
			'status' => 'Device is Online Now'
			
			);
		//insert menu
		$returnResource2 = insertQuery($tblName2, $insertData2, $disQuery = '');
		
		
		$deleteWhere = " sps_id   = " .$data['0'];
		$returnResource2 = deleteQuery($tblName, $deleteWhere, $disQuery = '');
	
	 	echo  "delete recored ";
	}	
	echo "device is online";


}
?>
