<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Cambiar imagen de perfil</h1>

<form action="<?= site_url('profile/image') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="file" name="profile_image" class="form-control mb-3" accept="image/*">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('profile') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>