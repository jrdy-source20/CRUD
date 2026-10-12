<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Tareas</h1>
<a href="<?= site_url('tasks/new') ?>">+ Nueva tarea</a>

<form action="<?= site_url('tasks') ?>" method="get">
    <input type="text" name="q" placeholder="Buscar..." value="<?= esc($q ?? '') ?>">
    <button>Buscar</button>
    <?php if (!empty($q)): ?>
        <a href="<?= site_url('tasks') ?>">Limpiar</a>
    <?php endif; ?>
</form>

<?php if (empty($tasks)): ?>
    <p>No existen tareas</p>
<?php else: ?>
    <table border="1" cellpadding="8" style="width:100%">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Creada</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['id']) ?></td>
                <td><?= esc($task['description']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
                <td>
                    <a href="<?= site_url('tasks/edit/' . $task['id']) ?>">Editar</a> |
                    <a href="<?= site_url('tasks/delete/' . $task['id']) ?>"
                       onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?= $this->endSection() ?>