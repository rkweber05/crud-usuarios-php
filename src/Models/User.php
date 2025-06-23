<?php
    namespace App\Models;

    use PDO;

    class User {
        private $pdo;

        public function __construct() {
            $this-> pdo = new PDO("mysql:host=localhost;dbname=crud_usuarios", "root", "root");
        }

        public function all() {
            return $this-> pdo-> query("SELECT * FROM usuarios")-> fetchAll(PDO::FETCH_ASSOC);
        }

        public function create($nome) {
            $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome) VALUES (:nome)");
            $stmt->bindParam(":nome", $nome);
            $stmt->execute();
        }
    }