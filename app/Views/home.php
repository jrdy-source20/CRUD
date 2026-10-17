<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
    <h1 class="display-5 fw-bold">Bienvenido</h1>
    <p class="lead">Gestiona tus tareas</p>

    <?php if (! session()->get('user_id')): ?>
        <a href="<?= site_url('login') ?>" class="btn btn-primary btn-lg">Iniciar sesión</a>
        <a href="<?= site_url('signup') ?>" class="btn btn-outline-primary btn-lg">Registrarse</a>
    <?php else: ?>
        <p>Hola, <?= esc(session()->get('name')) ?>.</p>
        <a href="<?= site_url('tasks') ?>" class="btn btn-primary btn-lg">Ver mis tareas</a>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>