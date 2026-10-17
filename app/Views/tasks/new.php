<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Nueva tarea</h1>

<form action="<?= site_url('tasks/create') ?>" method="post">
    <?= csrf_field() ?>
    <label class="form-label">Descripción</label>
    <input type="text" name="description" class="form-control mb-3" value="<?= esc(old('description')) ?>">
    <button type="submit" class="btn btn-primary">Guardar tarea</button>
    <a href="<?= site_url('tasks') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>