<?php 
    require_once 'db.php';
    require_once 'slack.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $stmt = $pdo -> prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt -> execute([$nome, $email, $senha]);

        sendSlackNotification("Novo usuário criado: $nome ($email)");

        echo "Usuário criado com sucesso !";
        header ("Location: dashboard.php");

        exit();
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #f1f3f5;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .card {
        max-width: 450px;
        width: 100%;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
      }
    </style>
  </head>
  <body>

    <div class="card">
      <h3 class="text-center mb-4">Cadastro de Usuário</h3>
      <form method="post">
        <div class="mb-3">
          <label class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>