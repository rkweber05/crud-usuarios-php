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
            echo "Usuário inválido: $usuario";
            exit();
        }

        $stmt = $pdo-> prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt-> execute([$id]);

        sendSlackNotification("Usuário deletado: {$usuario['nome']} ({$usuario['email']})");
    } 
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Deletar Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container mt-5">
      <h2>Deletar Usuário</h2>
      <form action="delete.php" method="post" class="mt-4">
        <div class="mb-3">
          <label for="id" class="form-label">ID do Usuário</label>
          <input type="number" name="id" id="id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger">Deletar</button>
        <a href="dashboard.php" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </body>
</html>
