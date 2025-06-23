<?php
    namespace App\Controllers;

    use App\Core\Controller;
    use App\Models\User;

    class UserController extends Controller {
        public function index() {
            $this-> authGuard();

            $userModel = new User();
            $usuarios = $userModel->all();

            $this-> view('dashboard', ['usuarios' => $usuarios]);
        }

        public function create() {
            $this-> authGuard();
            $this-> view('users/create');
        }

        public function store() {
            $userModel = new User();
            $userModel-> create($_POST['nome']);
            $this->redirect('users');
        }

        private function authGuard() {
            if(!isset($_SESSION['usuario'])) {
                $this->redirect('login');
            }
        }
    }