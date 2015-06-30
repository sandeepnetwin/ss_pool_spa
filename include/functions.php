<?php
/**
* @Programmer: SMW
* @Created: 25 Mar 2015
* @Modified: 
* @Description: Functions for display and set the relay valve values.
**/


include("config.php");



//Inser tquery function
function insertQuery($tblName, $insertData, $disQuery) {
    $fields = array_keys($insertData);
    $qry = "INSERT INTO " . $tblName . "
	    (`" . implode('`,`', $fields) . "`)
            VALUES('" . implode("','", $insertData) . "')";

    //for display query
    if (!empty($disQuery)) {
        echo $qry; //die;
    }

    //execute query
    $result = mysql_query($qry);

    if (@mysql_errno() == '0') {
        return mysql_insert_id();
    } else {
        return 1;
    }
}



//Update query function
function updateQuery($tblName, $updateCol, $updateWhere, $disQuery) {
    $qry = "UPDATE " . $tblName . " SET " . $updateCol;

    if ($updateWhere != '')
        $qry .= " WHERE " . $updateWhere;

    //for display query
    if (!empty($disQuery)) {
        echo $qry;
        die;
    }

    //execute query
    $result = mysql_query($qry);
    if (@mysql_errno() == '0' && @mysql_num_rows($result) > '0') {
        return 0;
    } else {
        return 1;
    }
}



//Delete query function
function deleteQuery($tblName, $where, $disQuery) {

    $qry = "DELETE FROM " . $tblName . " WHERE " . $where;

    //for display query
    if (!empty($disQuery)) {
        echo $qry;
        die;
    }

    //execute query
    $result = mysql_query($qry);
    if (@mysql_errno() == 0) {
        return 1;
    } else {
        return 0;
    }
}


//SQL FUNCTIONS SECTION
//Select Query
function selectQuery($tblName, $disCol, $where, $order_col, $order_by, $group_by, $disQuery) {
    $qry = "SELECT " . $disCol . " FROM " . $tblName;

    if ($where != '')
        $qry .= " WHERE " . $where;

    if ($order_col != '')
        $qry .= " ORDER BY " . $order_col;

    if ($order_by != '')
        $qry .= $order_by;

    if ($group_by != '')
        $qry .= ' GROUP BY ' . $group_by;

    //for display query
    if (!empty($disQuery)) {
        echo $qry;
        die;
    }

    //execute query
    $result = mysql_query($qry);

    if (@mysql_errno() == '0' && mysql_num_rows($result) > '0') {
        return $result;
    } else {
        return array();
    }
}

  function check_temp_responding($url_ip)
   {
		
		$url_info = explode(":", $url_ip);
		$host = $url_info['0'];
		$port = isset($url_info['1'])?$url_info['1']:'80';
		if($socket =@ fsockopen($host,$port, $errno, $errstr, 3)) {
		 return 'online';
		 fclose($socket);
		} else {
		 return'offline';
		}
   }
?>