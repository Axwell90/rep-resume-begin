<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json, text/javascript');

$article_id = intval($_POST['article_id']);			// Добавляет в $(".qwe").html(article_id);  // возвращает целое значение переменной
$arr = array('data', 'data2' => 'more data', 'data3' => array('even', 'more', 'data'));


$db_server = mysqli_connect('localhost','arch','q1w2e3r4','publications');
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error());

//$query1 = "SELECT mail FROM mails WHERE No = '".$article_id."'";


$result1 = mysqli_query($db_server, $query1);


echo json_encode($arr[data2]." kj  ".$article_id."".$result1." 1");			// Отдаёт обратно в ф success