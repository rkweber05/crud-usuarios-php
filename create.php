<?php 
    require_once 'db.php';
    require_once 'slack.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $stmt = $pdo -> prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt -> execute([$nome, $email, $senha]);

        sendSlackNotification("Novo usuário criado: $nome");

        echo "Usuário criado com sucesso !";
        header ("Location dashboard.php");
    }
?>

<form action="" method="post">
    Nome: <input type="text" name="nome" id=""> 
    <br>
    Email: <input type="email" name="email" id="">
    <br>
    Senha: <input type="password" name="senha" id="">
    <br>
    <button type="submit">Criar usuário</button>
</form>