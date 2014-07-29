<?php // mwheader.php
include 'mwfunctions.php';
session_start();
if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$loggedin = TRUE;
}
else $loggedin = FALSE;
echo "<html><head><tittle>$appname";
if ($loggedin) echo " ($user)";
echo "</title></head><body><font face='verdana' size='2'>";
echo "<h2>$appname</h2>";
if ($loggedin)
{
	echo "<b>$user</b>;
	 <a href='mwmembers.php?view=$user'>Home</a> |
	 <a href='mwmembers.php'>Members</a> |
	 <a href='mwfriends.php'>Friends</a> |
	 <a href='mwmessages.php'>Messages</a> |
	 <a href='mwprofile.php'>Profile</a> |
	 <a href='mwlogout.php'>Log out</a>";
}
else
{
	echo "<a href='mwindex.php'>Home</a> |
	<a href='mwsignup.php'>Signup</a> |
	<a href='mwlogin.php'>Log in</a>";
}
?>
