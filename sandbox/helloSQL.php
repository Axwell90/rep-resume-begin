<html>
 <head>
 	 <?php 
 	 header('Content-Type: text/html; charset=utf-8');
 	 ?>
  <title>hello</title>
 </head>
 <body>

<?php

$db_server = mysqli_connect('localhost','arch','q1w2e3r4','publications'); // устанавл

//mysqli_query($db_server, "INSERT into customers (name,isbn) VALUES ('moscow','12')"); // добавляет
//mysqli_query($db_server, "DELETE FROM customers WHERE isbn = '8789'"); // удаляет
//mysqli_query($db_server, "UPDATE customers SET name = 'moscow' WHERE isbn = '87898'"); // редактирует

    /*  $query = "DELETE FROM customers WHERE isbn = '87'";
          if (!$query)
          echo "DELETE failed: $query<br />" . mysqli_error() . "<br /><br />";   // ЧЕРЕЗ ПЕРЕМЕННУЮ!!!!
      echo mysqli_query($db_server, $query); */

$query = "SELECT * FROM classics";
$result = mysqli_query($db_server, $query);


$rows = mysqli_num_rows($result);

for ($j = 0 ; $j < $rows ; ++$j)
{
  $row = mysqli_fetch_row($result);
  echo 'Author: ' . $row[0] . '<br />';
  echo 'Title: ' . $row[1] . '<br />';
  echo 'Category: ' . $row[2] . '<br />';
  echo 'Year: ' . $row[3] . '<br />';
  echo 'ISBN: ' . $row[4] . '<br />'.'<br />';

}

   mysqli_free_result($result);


 /* $query = "SELECT * FROM classics";

if ($result = mysqli_query($db_server, $query)) {

    while ($row = mysqli_fetch_assoc($result)) {
        printf ("%s %s %s %s %s \n" . '<br />', 
          $row["author"],
          $row["title"], 
          $row["category"], 
          $row["year"], 
          $row["isbn"]);
    }

    mysqli_free_result($result);
}


   mysqli_free_result($result);


    // $row = mysqli_fetch_assoc($result)
$rows = mysqli_num_rows($result);
for ($j = 0 ; $j < $rows ; ++$j)
{
  $row = mysqli_field_count($result);
  echo 'Author: ' . $row[0] . '<br />';
  echo 'Title: ' .  $row[1] . '<br />';
  echo 'Category: ' . $row[2] . '<br />';
  echo 'Year: ' .   $row[3] . '<br />';
  echo 'ISBN: ' .   $row[4] . '<br /><br />';
}
*/
mysqli_close($db_server); // устанавл


?>

 </body>
</html>


