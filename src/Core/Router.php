<?php
    namespace App\Core;

    class Router {
        public function run () {
            $url = $_GET['url'] ?? 'login';
            $url = rtrim($url, '/');

            $segments = explode('/', $url);

            $controllerName = ucfirst($segments[0]) .  'Controller';
            $method = $segments[1] ?? 'index';

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $method)) {
                    $controller->$method();
                    return;
                }
            }

            http_response_code(404);
            echo "Página não encontrada!";
        }
    }