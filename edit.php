<?php 
    require_once 'db.php';
    require_once 'slack.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];

        if (!is_numeric($id)) {
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

        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $stmt = $pdo-> prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
        $stmt-> execute(array($nome, $email, $id));

        sendSlackNotification("Usuário atualizado: $nome ($email)");

        header ("Location: dashboard.php");
        exit();
    }
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container mt-5">
      <h2 class="mb-4">Atualizar Usuário</h2>
      <form action="edit.php" method="post">
        <div class="mb-3">
          <label class="form-label">ID do Usuário</label>
          <input type="number" name="id" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar alterações</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
