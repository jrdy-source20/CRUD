<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Editar tarea</h1>

    <form action="<?= site_url('tasks/update/' . $task['id']) ?>" method="post">
        <?= csrf_field() ?>
        <label>Descripción</label><br>
        <input type="text" name="description"
               value="<?= esc(old('description', $task['description'])) ?>" style="width:100%"><br><br>
        <button type="submit">Editar</button>
        <a href="<?= site_url('tasks') ?>">Cancelar</a>
    </form>
<?= $this->endSection() ?>