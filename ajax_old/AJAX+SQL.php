<?php
$q = intval($_GET['q']);  // возвращает целое значение переменной

$db_server = mysqli_connect('localhost','arch','q1w2e3r4','publications');
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

// mysqli_select_db($db_server,"publications");  если нужно сменить ДБ во время подключения

$query = "SELECT * FROM mails WHERE No = '".$q."'";
$result = mysqli_query($db_server, $query);

echo "<table border='1'>
<tr>
<th>No</th>
<th>Mail</th>
<th>X</th>
<th>Y</th>
</tr>";

while($row = mysqli_fetch_array($result)) //Выбирает одну строку из результир набора и помещ ее в массив
{
  echo "<tr>";
  echo "<td>" . $row['No'] . "</td>";
  echo "<td>" . $row['mail'] . "</td>";
  echo "<td>" . $row['x'] . "</td>";
  echo "<td>" . $row['y'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($db_server);

?>