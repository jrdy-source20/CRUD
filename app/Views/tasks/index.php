<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Tareas</h1>

    <p><a href="<?= site_url('tasks/new') ?>">+ Nueva tarea</a></p>

    <?php if (empty($tasks)): ?>
        <p>No hay tareas registradas todavía.</p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%; background:#fff">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Creada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td><?= esc($task['description']) ?></td>
                        <td><?= esc($task['created_at']) ?></td>
                        <td>
                            <a href="<?= site_url('tasks/edit/' . $task['id']) ?>">Editar</a> |
                            <a href="<?= site_url('tasks/delete/' . $task['id']) ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?= $this->endSection() ?>