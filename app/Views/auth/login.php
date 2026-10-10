<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Iniciar sesión</h1>
    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>
        <label>Correo</label><br>
        <input type="email" name="email" value="<?= esc(old('email')) ?>"><br><br>
        <label>Contraseña</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Iniciar sesión</button>
    </form>
<?= $this->endSection() ?>