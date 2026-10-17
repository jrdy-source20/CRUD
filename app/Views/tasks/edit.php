<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Editar tarea</h1>

<form action="<?= site_url('tasks/update/' . $task['id']) ?>" method="post">
    <?= csrf_field() ?>
    <label class="form-label">Descripción</label>
    <input type="text" name="description" class="form-control mb-3"
           value="<?= esc(old('description', $task['description'])) ?>">
    <button type="submit" class="btn btn-primary">Editar</button>
    <a href="<?= site_url('tasks') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>