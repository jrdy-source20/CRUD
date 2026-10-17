<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1>Tareas</h1>
<a href="<?= site_url('tasks/new') ?>" class="btn btn-success mb-3">+ Nueva tarea</a>

<form action="<?= site_url('tasks') ?>" method="get" class="d-flex gap-2 mb-3">
    <input type="text" name="q" class="form-control" placeholder="Buscar..." value="<?= esc($q ?? '') ?>">
    <button class="btn btn-primary">Buscar</button>
    <?php if (!empty($q)): ?>
        <a href="<?= site_url('tasks') ?>" class="btn btn-secondary">Limpiar</a>
    <?php endif; ?>
</form>

<?php if (empty($tasks)): ?>
    <p>No existen tareas</p>
<?php else: ?>
    <table class="table table-striped table-hover bg-white">
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
                    <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="<?= site_url('tasks/delete/' . $task['id']) ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?= $this->endSection() ?>