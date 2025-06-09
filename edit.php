<?php 
    require_once 'db.php';
    require_once 'slack.php';

    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "Id inválido: $id";
        exit();
    }

    $stmt = $pdo-> prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt-> execute([$id]);
    $usuario = $stmt-> fetch();

    if (!$usuario) {
        echo "Usuário não encontrado: $usuario";
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $stmt = $pdo-> prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
        $stmt-> execute($nome, $email, $id);

        sendSlackNotification("Usuário atualizado: $nome ($email)");

        header ("Location: dashboard.php");
        exit();
    }
?>

<h2>Editar usuário</h2>

<form action="" method="post">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>">
    <br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>">
    <br>
    <button type="submit">Salvar alterações</button>
</form>