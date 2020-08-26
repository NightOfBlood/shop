<?php
    session_start();
    define('root', dirname(__FILE__));
    require_once(root . '/autoload.php');
    
    $router= new Router();
    $router->run();

    
    
?>