<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("jiwantravels") or die(mysql_error());
$action 				= $_POST['action'];
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){

	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {

		$query = "UPDATE _information SET displayOrder = " . $listingCounter . " WHERE information_id = " . $recordIDValue;
		//$q.="UPDATE newah_information SET displayOrder = " . $listingCounter . " WHERE information_id = " . $recordIDValue . "  AND parentInfo=".$parent;
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;
	}
}
?>