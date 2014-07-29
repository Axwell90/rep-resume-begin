<?php // smarty.php
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

$smarty->assign("title","Тестовая веб-страница",true); // не обяз true
$smarty->display('index.tpl');                         // сразу из templates
?>