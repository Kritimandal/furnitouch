<?Php
	require("constants.php");
	function dbconnection()
	{
		mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die("Connection failed");
		mysql_select_db(DB_NAME) or die("Database cannot be connected") ;
	
	}
	
?>