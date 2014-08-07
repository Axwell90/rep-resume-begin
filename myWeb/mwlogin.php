<?php // mwlogin.php
include_once 'mwheader.php';
echo "<h3>member Log in</h3>"; // вход на сайт
$error = $user = $pass = "";

if(isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);

	if ($user == "" || $pass == "")
	{
		$error = "Not all fields were entered1<br />";
	}
	else
	{
		$query = "SELECT user, pass FROM mwmembers WHERE 
		user='$user' AND pass='$pass'";

		if (mysqli_num_rows(queryMysql($db_server, $query)) == 0)
		{
			$error = "Username/password invalid<br />";
		}
		else
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			die ("You are now logged in. Please
				<a href='mwmembers.php?view=$user'>click here</a>");
		}

	}
}

echo <<<_END
<form method='post' action='mwlogin.php'>$error
Username <input type='text' maxlenght='16' name='user'
	value='$user' /><br />
Password <input type='password' maxlenght='16' name='pass'
	value='$pass' /><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type='submit' value='Login' />
</form>
_END;
?>