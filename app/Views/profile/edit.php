<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Editar perfil</h1>

<form action="<?= site_url('profile/update') ?>" method="post">
    <?= csrf_field() ?>
    <label class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control mb-3" value="<?= esc(old('name', $user['name'])) ?>">

    <label class="form-label">Correo</label>
    <input type="email" name="email" class="form-control mb-3" value="<?= esc(old('email', $user['email'])) ?>">

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('profile') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>