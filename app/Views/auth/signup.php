<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Registro</h1>
    <form action="<?= site_url('signup') ?>" method="post">
        <?= csrf_field() ?>
        <label>Nombre</label><br>
        <input type="text" name="name" value="<?= esc(old('name')) ?>"><br><br>
        <label>Correo</label><br>
        <input type="email" name="email" value="<?= esc(old('email')) ?>"><br><br>
        <label>Contraseña</label><br>
        <input type="password" name="password"><br><br>
        <label>Repetir contraseña</label><br>
        <input type="password" name="repeat"><br><br>
        <button type="submit">Registrarse</button>
        <a href="<?= site_url('/') ?>">Cancelar</a>
    </form>
<?= $this->endSection() ?>