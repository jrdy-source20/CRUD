<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organizador de tareas</title>
</head>
<body>

<nav>
    <a href="<?= site_url('/') ?>">Inicio</a>
    <a href="#">English</a>
    <a href="#">Español</a>

    <?php if (session()->get('user_id')): ?>
        Hola, <?= esc(session()->get('name')) ?>
        <a href="<?= site_url('tasks') ?>">Tareas</a>
        <?php if (session()->get('is_admin')): ?>
            <a href="<?= site_url('users') ?>">Usuarios</a>
        <?php endif; ?>
        <a href="<?= site_url('logout') ?>">Cerrar sesión</a>
    <?php else: ?>
        <a href="<?= site_url('signup') ?>">Registrarse</a>
        <a href="<?= site_url('login') ?>">Iniciar sesión</a>
    <?php endif; ?>
</nav>

<main>
    <?php foreach (['success' => 'ok', 'error' => 'err'] as $tipo => $clase): ?>
        <?php if ($mensaje = session()->getFlashdata($tipo)): ?>
            <div class="msg <?= $clase ?>"><?= esc($mensaje) ?></div>
        <?php endif; ?>
    <?php endforeach; ?>

    <?= $this->renderSection('content') ?>
</main>

</body>
</html>