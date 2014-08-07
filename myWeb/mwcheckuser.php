<?php // mwcheckuser.php
include_once 'mwfunctions.php';
if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$query = "SELECT * FROM mwmembers WHERE user='$user'";
	if (mysqli_num_rows(queryMysql($db_server, $query)))
	{
		echo "<font color=red>&nbsp;&larr;
			 Sorry, already taken</font>";
	} // имя занято
	else 
	{
		echo "<font color=green>&nbsp&larr;
			  Username available</font>";
	}  // имя доступно
}
?>

