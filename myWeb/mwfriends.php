<?php // mwfriends.php
include_once 'mwheader.php';

if (!isset($_SESSION['user']))
    die ("<br /><br />You need to login to view this page");
$user = $_SESSION['user'];

if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
else $view = $user;

if ($view == $user)
{
    $name1 = $name2 = "Your";
    $name3 =          "You are";
}
else
{
    $name1 = "<a href='mwmembers.php?view=$view'>$view</a>s";
    $name2 = "$view";
    $name3 = "$view is";
}

echo "<h3>$name1 Friends</h3>";
showProfile($db_server, $view);

$followers = array();
$following = array();

$query = "SELECT * FROM mwfriends WHERE user='$view'";
$result = queryMysql($db_server, $query);
$num = mysqli_num_rows($result);

for ($j = 0 ; $j < $num ; ++$j)
{
    $row = mysqli_fetch_row($result);
    $followers[$j] = $row[1];
}

$query = "SELECT * FROM mwfriends WHERE friend='$view'";
$result = queryMysql($db_server, $query);
$num = mysqli_num_rows($result);

for ($j = 0 ; $j < $num ; ++$j)
{
    $row           = mysqli_fetch_row($result);
    $following[$j] = $row[0];
}

$mutual    = array_intersect($followers, $following);
$followers = array_diff($followers, $mutual);
$following = array_diff($following, $mutual);
$friends   = FALSE;

if (sizeof($mutual))
{
    echo "<b>$name2 mutual friends</b><ul>";
    foreach($mutual as $friend)
        echo "<li><a href='mwmembers.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
}

if (sizeof($followers))
{
    echo "<b>$name2 followers</b><ul>";
    foreach($followers as $friend)
        echo "<li><a href='mwmembers.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
}

if (sizeof($following))
{
    echo "<b>$name3 following</b><ul>";
    foreach($following as $friend)
        echo "<li><a href='mwmembers.php?view=$friend'>$friend</a>";
    //echo "</ul>";           //
    $friends = TRUE;
}

if (!$friends) echo "</ul><li>You don't have any friends yet";

echo "</ul><a href='mwmessages.php?view=$view'>View $name2 messages</a>";
?>