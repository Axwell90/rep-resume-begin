<?php // mwmembers.php
include_once 'mwheader.php';

if (!isset($_SESSION['user']))
    die("<br /><br />You must be logged in to view this page");
$user = $_SESSION['user'];

if (isset($_GET['view']))
{
    $view = sanitizeString($_GET['view']);
    
    if ($view == $user) $name = "Your";
    else $name = "$view";
    
    echo "<h3>$name Page</h3>";
    showProfile($db_server, $view);
	echo "<a href='mwmessages.php?view=$view'>$name Messages</a><br />";
    die("<a href='mwfriends.php?view=$view'>$name Friends</a><br />");
}

if (isset($_GET['add']))
{
    $add = sanitizeString($_GET['add']);
    $query = "SELECT * FROM mwfriends WHERE user='$add' AND friend='$user'";

    if (!mysqli_num_rows(queryMysql($db_server, $query)))
    {
        $query = "INSERT INTO mwfriends VALUES ('$add', '$user')";
        queryMysql($db_server, $query);
    }
}
elseif (isset($_GET['remove']))
{
    $remove = sanitizeString($_GET['remove']);
    queryMysql($db_server, "DELETE FROM mwfriends WHERE user='$remove' AND friend='$user'");
}






$result = queryMysql($db_server, "SELECT user FROM mwmembers ORDER BY user");
$num    = mysqli_num_rows($result);

echo "<h3>Other Members</h3><ul>";

for ($j = 0 ; $j < $num ; ++$j)
{
    $row = mysqli_fetch_row($result);
    if ($row[0] == $user) continue;
    
    echo "<li><a href='mwmembers.php?view=$row[0]'>$row[0]</a>";
    $query = "SELECT * FROM mwfriends WHERE user='$row[0]' AND friend='$user'";

    $t1 = mysqli_num_rows(queryMysql($db_server, $query));
    $query = "SELECT * FROM mwfriends WHERE user='$user' AND friend='$row[0]'";
    $t2 = mysqli_num_rows(queryMysql($db_server, $query));
    $follow = "follow";

    if (($t1 + $t2) > 1)
    { 
        echo " &harr; is a mutual friend";
    }
    elseif ($t1)
    {
        echo " &larr; you are following";
    }
    elseif ($t2)       
    {
        $follow = "recip";
        echo " &rarr; is following you";
	}
    
    if (!$t1)
    {
        echo " [<a href='mwmembers.php?add=".$row[0]    . "'>$follow</a>]";
    }
    else
    {
        echo " [<a href='mwmembers.php?remove=".$row[0] . "'>drop</a>]";
    }
}
?>
