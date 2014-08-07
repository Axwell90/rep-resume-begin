<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - Add Your High Score</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>Guitar Wars - Add Your High Score</h2>

<?php

require_once('appvars.php');
require_once('connectvars.php');

  if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $score = $_POST['score'];
    $screenshot = $_FILES['screenshot']['name'];
    $screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size'];

      if (!empty($name) && !empty($score) && !empty($screenshot)) {



        if ((($screenshot_type=='image/gif') || ($screenshot_type=='image/jpeg') || ($screenshot_type=='image/png')) 
          && ($screenshot_size > 0) && ($screenshot_size <= MAXFILESIZE)) {

        $target = UPLOADPATH.$screenshot;
          
            if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {

            $db_server = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
            or die ('ошибка дб'.mysqli_error());

            $query = "INSERT INTO guitarwars VALUES (0, NOW(), '$name', '$score', '$screenshot')";
            mysqli_query($db_server, $query);

            echo '<p>Thanks for adding your new high score!</p>';
            echo '<p><strong>Name:</strong> ' . $name . '<br />';
            echo '<strong>Score:</strong> ' . $score . '</p>';
            echo '<img src=" ' . UPLOADPATH.$screenshot . '" alt="confirm image" /><br />';
            echo '<p><a href="head.php">&lt;&lt; Back to high scores</a></p>';

            $name = "";
            $score = "";
            $screenshot = "";

            mysqli_close($db_server);
            }

            else { echo 'no upload'; 
            }
        }

        else { echo '<p class="error">The screenshot must be a GIF, JPEG,
                or PNG file and no greater than ' . (MAXFILESIZE / 1024) . ' KB in size.</p>';
        }
      }

      else { echo '<p class="error">Please enter all of the information to add your high score.</p>';
      }
  }
?>

  <hr />
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
    <input type="hidden" name="MAX_FILE_SIZE" value="3276800">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
    <label for="score">Score:</label>
    <input type="text" id="score" name="score" value="<?php if (!empty($score)) echo $score; ?>" />
    <br />
    <label for="screenshot">File image:</label>
    <input type="file" id="screenshot" name="screenshot">
    <hr />
    <input type="submit" value="Add" name="submit" />
  </form>
</body> 
</html>
