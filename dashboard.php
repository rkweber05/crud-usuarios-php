<?php 
    session_start();

    if (!isset($_SESSION["usuario_id"])) {
        header ("Location: index.php");
        exit();
    }

    require_once "db.php";

    $stmt = $pdo-> query ("SELECT * FROM usuarios ORDER BY criado_em DESC");
    $usuarios = $stmt-> fetchAll();
?>

<h2>Bem-Vindo, <?php $_SESSION["usuario_nome"] ?></h2>
<a href="create.php"> + Novo usuário</a> | <a href="logout.php">Sair</a>

<ul>
    <?php foreach($usuarios as $usuario): ?>
        <li> <?= $usuario['nome'] ?> | <?= $usuario['email'] ?>
            [<a href="edit.php?id=<?= $usuario['id'] ?>">Editar</a>]
            <a href="delete.php?id=<?= $usuario['id']?>">Excluir</a>
        </li>
<?php endforeach;?>
</ul>