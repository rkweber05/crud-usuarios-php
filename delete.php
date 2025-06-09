<?php 
    require_once 'db.php';
    require_once 'slack.php';

    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "ID inválido: $id";
        exit();
    }

    $stmt = $pdo-> prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt-> execute([$id]);
    $usuario = $stmt-> fetch();

    if (!$usuario) {
        echo "Usuário não encontrado: $usuario";
        exit();
    }

    $stmt = $pdo-> prepare("DELETE usuarios WHERE id = ?");
    $stmt-> execute([$id]);

    sendSlackNotification("Usuário deletado: {$usuario['nome']} ({$usuario['email']})");

    header("Location: dashboard.php");
    exit();
?>