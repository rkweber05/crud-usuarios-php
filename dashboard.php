<?php 
    session_start();

    if (!isset($_SESSION["usuario_id"])) {
        header ("Location: login.php");
        exit();
    }

    require_once "db.php";

    $stmt = $pdo-> query ("SELECT * FROM usuarios ORDER BY criado_em DESC");
    $usuarios = $stmt-> fetchAll();
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container py-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Bem-vindo, <?= $_SESSION["usuario_nome"] ?></h2>
        <div>
          <a href="create.php" class="btn btn-success">Novo Usuário</a>
          <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
      </div>

      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          Lista de Usuários
        </div>
        <ul class="list-group list-group-flush">
          <?php foreach($usuarios as $usuario): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <strong><?= $usuario['nome'] ?></strong><br>
                <small><?= $usuario['email'] ?></small>
              </div>
              <div>
                <a href="edit.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="delete.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-outline-danger">Excluir</a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>