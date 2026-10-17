<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organizador de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('/') ?>">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav me-auto">
                <?php if (session()->get('user_id')): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('tasks') ?>">Tareas</a></li>
                    <?php if (session()->get('is_admin')): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('users') ?>">Usuarios</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <?php if (session()->get('user_id')): ?>
                    <li class="nav-item"><span class="nav-link">Hola, <?= esc(session()->get('name')) ?></span></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('profile') ?>">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('logout') ?>">Cerrar sesión</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('signup') ?>">Registrarse</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>">Iniciar sesión</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-4">
    <?php foreach (['success' => 'success', 'error' => 'danger'] as $tipo => $clase): ?>
        <?php if ($mensaje = session()->getFlashdata($tipo)): ?>
            <div class="alert alert-<?= $clase ?>"><?= esc($mensaje) ?></div>
        <?php endif; ?>
    <?php endforeach; ?>

    <?= $this->renderSection('content') ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>