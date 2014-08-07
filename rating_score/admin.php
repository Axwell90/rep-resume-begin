<?php

require_once('appvars.php');
require_once('connectvars.php');

	$db_server = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$query = "SELECT * FROM guitarwars";
	$result = mysqli_query($db_server, $query);

	$row = mysqli_fetch_array($result);

	echo '<table>';

	while ($row=mysqli_fetch_array($result)) {
		echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
		echo '<td>' . $row['date'] . '</td>';
		echo '<td>' . $row['score'] . '</td>';
		echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' . $row['date'] . 
		'&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] . 
		'&amp;screenshot=' . $row['screenshot'] . '">Delete</a></td></tr>';

	}

	echo '</table>';
