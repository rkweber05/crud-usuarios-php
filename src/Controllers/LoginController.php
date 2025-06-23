<?php
    namespace App\Controllers;

    use App\Core\Controller;

    class LoginController extends Controller {
        public function index() {
            $this-> view('login');
        }

        public function autenticar() {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            if ($usuario == 'admin' && $senha == '123') {
                $_SESSION['usuario'] = $usuario;
                $this->redirect('dashboard');
            } else {
                echo "Login inválido !";
            }
        }

        public function sair() {
            session_destroy();
            $this-> redirect('login');
        }
    }