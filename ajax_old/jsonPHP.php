<?php
$arr = array('data', 'data2' => 'more data', 'data3' => array('even', 'more', 'data'));
 
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($arr[data2]." kj");