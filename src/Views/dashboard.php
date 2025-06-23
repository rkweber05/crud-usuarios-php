<h1>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h1>
<a href="/crud-usuarios-php/public/user/create">Novo usuário</a>
<a href="/crud-usuarios-php/public/login/sair">Sair</a>

<ul>
    <?php foreach ($usuarios as $usuario): ?>
        <li><?= htmlspecialchars($usuario['nome']) ?></li>
    <?php endforeach; ?>
</ul>
