<?php // mwfunctions.php
$db_hostname='localhost';
$db_username='arch';
$db_password='q1w2e3r4';
$db_database='mwsite';
$appname='myWebSite';

$db_server = mysqli_connect('localhost', 'arch', 'q1w2e3r4', 'mwsite') or die (mysqli_error());

function createTable($db_server, $name, $query)
	{
		global $db_server;
		if (tableExists($name))
		{
			echo "Таблица '$name' уже существует<br />";
		}
		else
		{
			queryMysql($db_server, "CREATE TABLE $name($query)");
			echo "Таблица '$name' создана <br />";
		}
	}

function tableExists($name)
	{
		global $db_server;
		$result = queryMysql($db_server, "SHOW TABLES LIKE '$name'");
		return mysqli_num_rows($result);
	}

function queryMysql($db_server, $query)
	{
		global $db_server;
		$result = mysqli_query($db_server, $query) or die (mysqli_error());
		return $result;
	}

function destroySession()
	{
		$_SESSION=array();
		if (session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(). ''. time()-2592000);
		session_destroy();
	}

function sanitizeString($var)
	{
		$var = strip_tags($var);
		$var = htmlentities($var);
		return stripslashes($var);
	}

function showProfile($db_server, $user)
	{
		global $db_server;
		if (file_exists("$user.jpg"))
		{
			echo "<img src='$user.jpg' border='1' align='left' />";
		}
		$result = queryMysql($db_server, "SELECT * FROM mwprofiles WHERE user='$user'");

		if (mysqli_num_rows($result))
		{
			$row = mysqli_fetch_row($result);
			echo stripslashes($row[1]) . "<br clear='left' /><br />";
		}
	}
?>