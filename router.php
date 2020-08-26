<?php
    class Router{
        private $routes;
        

        public function __construct(){
            $routesPath=root.'/routes.php';
            require_once($routesPath);
            $this->routes=getRoutes();
        }

        public function run(){
            $URI=$this->getURI();
           
            foreach ($this->routes as $pattern => $path){
                if(preg_match("~^$pattern$~", $URI)){
                    $internalPath = preg_replace("~^$pattern$~",$path, $URI);
                    $parts = explode('/', $internalPath);
                    $controller = array_shift($parts).'Controller';
                    $controller = ucfirst($controller);
                    $action = 'action'.ucfirst(array_shift($parts));
                    $controllerPath = root.'/controllers/'.$controller.'.php';
                    if (file_exists($controllerPath)){
                        include_once($controllerPath);
                    }
                    $object = new $controller;// создание объекта класса
                    $result = call_user_func_array(array($object, $action), $parts);
                    
                    if ($result != null){
                        break;
                    }
                    
                }
            }
        }


        private function getURI(){
            if (!empty($_SERVER['REQUEST_URI'])){
                return trim($_SERVER['REQUEST_URI'], '/');
            }
        }
    }

?>