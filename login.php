<?php 
    session_start();
    require_once 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo-> prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt-> execute([$email]);
        $user = $stmt-> fetch();

        if ($user && password_verify($senha, $user["senha"])) {
            $_SESSION["usuario_id"] = $user["id"];
            $_SESSION["usuario_nome"] = $user["nome"];

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Login inválido !";
        }
    }
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
      <h4 class="mb-4 text-center">Login de Usuário</h4>
      <form action="login.php" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required placeholder="seu@email.com">
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" required placeholder="Digite sua senha">
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
