<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Guitar Wars - High Scores</h2>
  <p>Welcome, Guitar Warrior, do you have what it takes to crack the high score list? If so, just 
    <a href="addscore.php">add your own score</a>.</p>
  <hr />
<?php

require_once('appvars.php');
require_once('connectvars.php');

  $db_server = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
  or die ('ошибка дб'.mysqli_error());
  
  $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
  $data = mysqli_query($db_server, $query);

  echo '<table>';
  $i = 0;
  while ($row = mysqli_fetch_array($data)) {

    if ($i==0) {
      echo '<tr><td class="topscoreheader">Best score:' . $row['score'] . '</tr></td>';
    }
    
    echo '<tr><td class="scoreinfo">';
    echo '<span class="score">' . $row['score'] . '</span><br />';
    echo '<strong>Name:</strong> ' . $row['name'] . '<br />';
    echo '<strong>Date:</strong> ' . $row['date'] . '<br />';

    if (is_file(UPLOADPATH . $row['screenshot']) && filesize(UPLOADPATH . $row['screenshot'])>0) {
    echo '<td><img src=" ' . UPLOADPATH . $row['screenshot'] . '" alt="confirm" /></td></tr>';
  }
    else {
    echo '<td><img src="' . UPLOADPATH . 'unverified.gif' .'" alt="not confirm"</td></tr>';
  }
  $i++;
}
  echo '</table>';

  mysqli_close($db_server);
?>

</body> 
</html>

<?php /*      // ADD IMAGE ON DB

  $db_server = mysqli_connect('localhost', 'arch', 'q1w2e3r4', 'rating_score') 
      or die ('ошибка дб'.mysqli_error());

  $query = "UPDATE guitarwars SET screenshot = 'pacosscore.gif' WHERE id=1";
  $result = mysqli_query($db_server, $query);
  echo 'add'.'<br />';
  mysqli_close($db_server);