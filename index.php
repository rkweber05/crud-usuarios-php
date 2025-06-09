<?php 
    session_start();
    require_once 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo-> prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt-> execute([$email]);
        $user = $stmt-> fetch();

        if ($user && $password_verify($senha, $user["senha"])) {
            $_SESSION["usuario_id"] = $user["id"];
            $_SESSION["usuario_nome"] = $user["nome"];

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Login inválido !";
        }
    }
?>

<form action="" method="post">
    Email: <input type="email" name="email" id="">
    <br>
    Senha <input type="password" name="senha" id="">
    <br>
    <button type="submit">Entrar</button>
</form>