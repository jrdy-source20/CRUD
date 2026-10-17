<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Cambiar contraseña</h1>

<form action="<?= site_url('profile/password') ?>" method="post">
    <?= csrf_field() ?>
    <label class="form-label">Contraseña actual</label>
    <input type="password" name="current" class="form-control mb-3">

    <label class="form-label">Nueva contraseña</label>
    <input type="password" name="password" class="form-control mb-3">

    <label class="form-label">Repetir nueva contraseña</label>
    <input type="password" name="repeat" class="form-control mb-3">

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('profile') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>