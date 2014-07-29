<!DOCTYPE html>
<html>
<head>
   <title>Form Test</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body style="background-color:gray;"> 


<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/Smarty/Smarty.class.php";

$smarty = new Smarty();

/*
$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
*/

$smarty->template_dir = "$path/temp/smarty/templates";
$smarty->compile_dir  = "$path/temp/smarty/templates_c";
$smarty->cache_dir    = "$path/temp/smarty/cache";
$smarty->config_dir   = "$path/temp/smarty/configs";

$db_server = mysqli_connect('localhost','arch','q1w2e3r4','publications');
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error());


if (isset($_POST['mail'])
	
			// echo $isbn;        // тупо из за этого удаляет


	$mail = get_post('mail');



	

	else
	{
		$query = "INSERT INTO mails VALUES ('$mail')";

		if (!mysqli_query($db_server, $query))
		{
		echo "Сбой при вставке: $query<br>" .
		mysqli_error() . "<p>";
		}

	}


mysqli_close($db_server);

$smarty->assign('mail',$mail);  					// из примера смарти (работает)
$smarty->display('zadanie.tpl');

 function get_post($mail)
{
	//echo "post : ".$_POST[$mail]; 							//  не обязатательно(проверка)
		echo mysqli_fetch_array ($_POST[$mail]);
	//	echo "after : ".$_POST[$mail]; 
	//	return mysqli_fetch_array ($_POST[$mail]);		//	в примере
		return $_POST[$mail];
}

?>


</body>
</html>


