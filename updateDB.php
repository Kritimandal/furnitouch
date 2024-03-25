<?php
error_reporting(0);
$dbhost							= "localhost";
$dbuser							= "c28usrfurnitouch";
$dbpass							= "awWD!a93";
$dbname							= "c28furnitouch";




$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to mysql");
mysql_select_db($dbname);

//require_once("configure_admin.php");
$action 				= $_POST['action'];
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {

		$query = "UPDATE productcategories SET displayOrder = " . $listingCounter . " WHERE CategoryID = " . $recordIDValue;
		 mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;
	}
}

?>
                            