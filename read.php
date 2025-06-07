<?php 
    require_once 'db.php';
    require_once 'slack.php';

    $stmt = $pdo-> query(
        "SELECT * FROM usuarios"
    );
    $usuarios = $stmt-> fetchAll();

    sendSlackNotification("Lista de usuários acessada ");

    foreach ($usuarios as $usuario) {
        echo "ID: {$usuario['id']} - Nome: {$usuario['nome']} - Email: {$usuaario['email']} <br>";
    }
?>