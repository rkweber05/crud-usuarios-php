<?php
    namespace App\Controllers;
    use App\Core\Controller;

    class LoginController extends Controller {
        public function index() {
            $this->view('login');
        }

        public function autenticar() {
            // Adicionar lógica de autenticação
        }
    }