<?php 
    require_once 'db.php';
    require_once 'slack.php';

    $stmt = $pdo-> query(
        "SELECT * FROM usuarios"
    );
    $usuarios = $stmt-> fetchAll();

    $mensagem = "Usuários cadastrados:\n";
    foreach ($usuarios as $usuario) {
        $mensagem .= "ID: {$usuario['id']} - Nome: {$usuario['nome']} - Email: {$usuario['email']} <br>";
    }

    sendSlackNotification($mensagem);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container mt-5">
      <h1 class="mb-4">Usuários Cadastrados</h1>

      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr>
              <td><?= htmlspecialchars($usuario['id']) ?></td>
              <td><?= htmlspecialchars($usuario['nome']) ?></td>
              <td><?= htmlspecialchars($usuario['email']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <a href="create.php" class="btn btn-primary mt-3">Cadastrar novo usuário</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

