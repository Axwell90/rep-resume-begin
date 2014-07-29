<?php //mwsignup.php
include_once 'mwheader.php';

echo <<<_END
<script>
function checkUser(user)
{
    if (user.value == '')
    {
        document.getElementById('info').innerHTML = ''
        return
    }

    params  = "user=" + user.value
    request = new ajaxRequest()
    request.open("POST", "mwcheckuser.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")

    
    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
        {
            if (this.status == 200)
            {
                if (this.responseText != null)
                {
                    document.getElementById('info').innerHTML = this.responseText
                }
                else alert("Ошибка Ajax: Данные не получены")
            }
        	else alert("Ошибка Ajax: "+this.statusText)
        }
    }
    request.send(params)
}

function ajaxRequest()
{
	try
	{
		var request = new XMLHttpRequest()
	}
	catch(e1)
	{
		try
		{
			request = new ActiveXObject("Msxml2.XMLHTTP")
		}
		catch(e2)
		{
			try
			{
				request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch(e3)
			{
				request = false
			}
		}
	}
	return request
}
</script>
<h3>Sign up Form</h3>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);

	if ($user == "" || $pass == "")
	{
        $error = "Not all fields were entered<br /><br />";
    }
	else
	{
		$query = "SELECT * FROM mwmembers WHERE user='$user'";

		if (mysqli_num_rows(queryMysql($db_server, $query)))
		{
			$error = "This name is already in use<br />";
		}
		else
		{
			$query = "INSERT INTO mwmembers VALUES('$user','$pass')";
			queryMysql($db_server, $query);
		}

		die ("<h4>Account created</h>Please Log in."); // созд учетной записи
	}
}

echo <<<_END
<form method='post' action='mwsignup.php'>$error
Username <input type='text' maxlength='16' name='user' value='$user'
	onBlur='checkUser(this)'/><span id='info'></span><br />
Password <input type='text' maxlength="16" name='pass' value='$pass'><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type='submit' value='Signup' />
</form>
_END;
?>


