<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Eliminar imagen de perfil</h1>
<p>¿Estás seguro?</p>

<form action="<?= site_url('profile/image/delete') ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
    <a href="<?= site_url('profile') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>