<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Usuarios</h1>
<a href="<?= site_url('users/new') ?>" class="btn btn-success mb-3">+ Nuevo usuario</a>

<table class="table table-striped table-hover bg-white">
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Activo</th>
        <th>Administrador</th>
        <th>Creado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= esc($u['name']) ?></td>
            <td><?= esc($u['email']) ?></td>
            <td><?= $u['active'] ? 'Sí' : 'No' ?></td>
            <td><?= $u['is_admin'] ? 'Sí' : 'No' ?></td>
            <td><?= esc($u['created_at']) ?></td>
            <td>
                <a href="<?= site_url('users/' . $u['id']) ?>" class="btn btn-sm btn-info">Ver</a>
                <a href="<?= site_url('users/edit/' . $u['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="<?= site_url('users/delete/' . $u['id']) ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $pager->links() ?>
<?= $this->endSection() ?>