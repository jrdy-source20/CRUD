<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Bienvenido</h1>
    <p>Gestiona tus tareas</p>
    <?php if (! session()->get('user_id')): ?>
        <p>
            <a href="<?= site_url('login') ?>">Iniciar sesión</a> |
            <a href="<?= site_url('signup') ?>">Registrarse</a>
        </p>
    <?php else: ?>
        <p>Hola, <?= esc(session()->get('name')) ?>. Ve a <a href="<?= site_url('tasks') ?>">tus tareas</a>.</p>
    <?php endif; ?>
<?= $this->endSection() ?>