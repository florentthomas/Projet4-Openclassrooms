<?php
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

require(ROOT.'controllers/Router.php');

$route=new Router;
$route->getController();
