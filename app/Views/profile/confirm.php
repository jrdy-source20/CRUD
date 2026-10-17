<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Ingresa tu contraseña para continuar</h1>

<form action="<?= site_url('profile/confirm') ?>" method="post">
    <?= csrf_field() ?>
    <label class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control mb-3">
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="<?= site_url('profile') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>