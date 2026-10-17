<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Nuevo usuario</h1>

<form action="<?= site_url('users/create') ?>" method="post">
    <?= csrf_field() ?>

    <label class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control mb-3" value="<?= esc(old('name')) ?>">

    <label class="form-label">Correo</label>
    <input type="email" name="email" class="form-control mb-3" value="<?= esc(old('email')) ?>">

    <label class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control mb-3">

    <label class="form-label">Repetir contraseña</label>
    <input type="password" name="repeat" class="form-control mb-3">

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('users') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>