<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Editar usuario</h1>

    <form action="<?= site_url('users/update/' . $user['id']) ?>" method="post">
        <?= csrf_field() ?>

        <label>Nombre</label><br>
        <input type="text" name="name" value="<?= esc(old('name', $user['name'])) ?>"><br><br>

        <label>Correo</label><br>
        <input type="email" name="email" value="<?= esc(old('email', $user['email'])) ?>"><br><br>

        <label>Nueva contraseña (opcional)</label><br>
        <input type="password" name="password"><br><br>

        <label>Repetir contraseña</label><br>
        <input type="password" name="repeat"><br><br>

        <label><input type="checkbox" name="active" value="1" <?= $user['active'] ? 'checked' : '' ?>> Activo</label><br>
        <label><input type="checkbox" name="is_admin" value="1" <?= $user['is_admin'] ? 'checked' : '' ?>> Administrador</label><br><br>

        <button type="submit">Guardar</button>
        <a href="<?= site_url('users') ?>">Cancelar</a>
    </form>
<?= $this->endSection() ?>