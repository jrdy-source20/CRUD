<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Usuario</h1>
    <p><a href="<?= site_url('users') ?>">&laquo; Volver</a></p>

    <p><b>Nombre:</b> <?= esc($user['name']) ?></p>
    <p><b>Correo:</b> <?= esc($user['email']) ?></p>
    <p><b>Activo:</b> <?= $user['active'] ? 'Sí' : 'No' ?></p>
    <p><b>Administrador:</b> <?= $user['is_admin'] ? 'Sí' : 'No' ?></p>
    <p><b>Creado:</b> <?= esc($user['created_at']) ?></p>
    <p><b>Actualizado:</b> <?= esc($user['updated_at']) ?></p>

    <a href="<?= site_url('users/edit/' . $user['id']) ?>">Editar</a>
<?= $this->endSection() ?>