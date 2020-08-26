<?php
    function __autoload($class_name){
        $arrayPaths=array(
            '/models/','/'
        );

        foreach( $arrayPaths as $path){
            $path=root.$path.$class_name.'.php';
            if(is_file($path)){
                include_once($path);
            }
        }
    }
?>