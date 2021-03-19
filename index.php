<?php
session_start();
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
define('URL', str_replace('index.php', '', (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));


use \Projet4\Controller\Router;

spl_autoload_register(function($class){
    
    $namespace= explode('\\', $class);
    $class=end($namespace);
    
    $files = array(ROOT.'controllers/'.$class.'.php',
                    ROOT.'models/'.$class.'.php',
                    ROOT.'views/'.$class.'.php',
                    ROOT.$class.'.php');
    
    foreach ($files as $file)
    {
        if (file_exists($file))
        {       
            require_once($file);
        }
    }
});

$route=new Router;
$route->getController();
