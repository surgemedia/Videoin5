<?
	@ $db = mysql_connect("localhost","vid5surg_vduser","91BhZsLw9L04");
	if (!$db)
	{
		echo "Database connection error! Please try again.";
		exit;
	}
	mysql_query("SET NAMES 'utf8'"); 
	mysql_select_db("vid5surg_db");
?>