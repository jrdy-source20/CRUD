<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Usuario</h1>
<a href="<?= site_url('users') ?>" class="btn btn-secondary mb-3">&laquo; Volver</a>

<p><b>Nombre:</b> <?= esc($user['name']) ?></p>
<p><b>Correo:</b> <?= esc($user['email']) ?></p>
<p><b>Activo:</b> <?= $user['active'] ? 'Sí' : 'No' ?></p>
<p><b>Administrador:</b> <?= $user['is_admin'] ? 'Sí' : 'No' ?></p>
<p><b>Creado:</b> <?= esc($user['created_at']) ?></p>
<p><b>Actualizado:</b> <?= esc($user['updated_at']) ?></p>

<a href="<?= site_url('users/edit/' . $user['id']) ?>" class="btn btn-warning">Editar</a>
<?= $this->endSection() ?>