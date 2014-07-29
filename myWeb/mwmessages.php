<?php // mwmessages.php
include_once 'mwheader.php';

if (isset($SESSION['user'])) die("<br /><br />You need to login to view this page"); 
$user = $_SESSION['user'];

if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
else $view = $user;

if (isset($_POST['text']))
{
    $text = sanitizeString($_POST['text']);

    if ($text != "")
    {
        $pm   = substr(sanitizeString($_POST['pm']),0,1);
        $time = time();
        queryMysql($db_server, "INSERT INTO mwmessages VALUES(NULL, '$user',
            '$view', '$pm', $time, '$text')");
    }
}

if ($view != "")
{
    if ($view == $user) 
    {
        $name1 = $name2 = "Your";
    }
    else
    {
        $name1 = "<a href='mwmembers.php?view=$view'>$view</a>s";
        $name2 = "$view";
    }

    echo "<h3>$name1 Messages</h3>";
    showProfile($db_server, $view);
    
    echo <<<_END
<form method='post' action='mwmessages.php?view=$view'>
Type here to leave a message:<br />
<textarea name='text' cols='40' rows='3'></textarea><br />
Public<input type='radio' name='pm' value='0' checked='checked' />
Private<input type='radio' name='pm' value='1' />
<input type='submit' value='Post Message' /></form><br />
_END;

    if (isset($_GET['erase']))
    {
        $erase = sanitizeString($_GET['erase']);
        queryMysql($db_server, "DELETE FROM mwmessages WHERE id='$erase' AND recip='$user'");
    }
    
    $query  = "SELECT * FROM mwmessages WHERE recip='$view' ORDER BY time DESC";
    $result = queryMysql($db_server, $query);
    $num    = mysqli_num_rows($result);
    
    for ($j = 0 ; $j < $num ; ++$j)
    {
        $row = mysqli_fetch_row($result);

        if ($row[3] == 0 || $row[1] == $user || $row[2] == $user)
        {
            echo date('M jS \'y g:sa:', $row[4]);
            echo " <a href='mwmessages.php?";
            echo "view=$row[1]'>$row[1]</a> ";

            if ($row[3] == 0)
            {
                 echo "wrote: &quot;$row[5]&quot; ";
            }
            else
            {
                echo "whispered: <i><font
                color='#006600'>&quot;$row[5]&quot;</font></i> ";
            }

            if ($row[2] == $user)
            {
                echo "[<a href='mwmessages.php?view=$view";
				echo "&erase=$row[0]'>erase</a>]";
            }
            echo "<br>";
        }
    }
}

if (!$num) echo "<li>No messages yet</li><br />";

echo "<br><a href='mwmessages.php?view=$view'>Refresh messages</a>";

echo " | <a href='mwfriends.php?view=$view'>View $name2 friends</a>";
?>
