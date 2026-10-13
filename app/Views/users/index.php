<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Usuarios</h1>
    <p><a href="<?= site_url('users/new') ?>">+ Nuevo usuario</a></p>

    <table>
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
                    <a href="<?= site_url('users/' . $u['id']) ?>">Ver</a> |
                    <a href="<?= site_url('users/edit/' . $u['id']) ?>">Editar</a> |
                    <a href="<?= site_url('users/delete/' . $u['id']) ?>" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?= $pager->links() ?>
<?= $this->endSection() ?>