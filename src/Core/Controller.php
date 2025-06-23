<?php
    namespace App\Core;

    class Controller {
        protected function view($view, $data = []) {
            extract($data);
            require_once __DIR__ . "/../View/{$view}.php";
        }

        protected function header($url) {
            header("Location: /crud-usuarios-php/public/$url");
        }
    }