<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Nueva tarea</h1>

    <form action="<?= site_url('tasks/create') ?>" method="post">
        <?= csrf_field() ?>
        <label>Descripción</label><br>
        <input type="text" name="description" value="<?= esc(old('description')) ?>" style="width:100%"><br><br>
        <button type="submit">Guardar tarea</button>
        <a href="<?= site_url('tasks') ?>">Cancelar</a>
    </form>
<?= $this->endSection() ?>