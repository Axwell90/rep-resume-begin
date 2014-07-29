<?php
if (is_ajax())
 {
	if (isset($_POST["action"]) && !empty($_POST["action"]))  //Checks if action value exists
	{
		$action = $_POST["action"];
		switch($action)  //Switch case for value of action
		{
			case "testOn": test(); break;
		}
	}
}

//Function to check if the request is an AJAX request (Определяет,пришёл ли ajax запрос)
function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

/*
Для того чтобы определить идёт ли к нам ajax запрос, 
следует использовать следующий параметр 
суперглобального массива $_SERVER['HTTP_X_REQUESTED_WITH']. 
Ajax запрос = запрос xmlhttprequest.

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
    // Если к нам идёт Ajax запрос, то ловим его
    echo 'Это ajax запрос!';
    exit;
}
//Если это не ajax запрос
echo 'Это не ajax запрос!';
*/


function test(){
	$return = $_POST;

	//Do what you need to do with the info. The following are some examples.
	//if ($return["favorite_beverage"] == ""){
	//	$return["favorite_beverage"] = "Coke";
	//}
	//$return["favorite_restaurant"] = "McDonald's";

	$return["json"] = json_encode($return);
	echo json_encode($return);
}

?>