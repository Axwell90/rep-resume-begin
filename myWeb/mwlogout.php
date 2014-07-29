<?php // mwlogout.php
include_once 'mwheader.php';

echo "<h3>Log out</h3>";

if (isset($_SESSION['user']))
{
    destroySession();
    echo "You have been logged out. Please " .
         "<a href='mwindex.php'>click here</a> to refresh the screen.";
}
else echo "You cannot log out because you are not logged in";
?>
