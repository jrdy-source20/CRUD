<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Editar usuario</h1>

<form action="<?= site_url('users/update/' . $user['id']) ?>" method="post">
    <?= csrf_field() ?>

    <label class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control mb-3" value="<?= esc(old('name', $user['name'])) ?>">

    <label class="form-label">Correo</label>
    <input type="email" name="email" class="form-control mb-3" value="<?= esc(old('email', $user['email'])) ?>">

    <label class="form-label">Nueva contraseña (opcional)</label>
    <input type="password" name="password" class="form-control mb-3">

    <label class="form-label">Repetir contraseña</label>
    <input type="password" name="repeat" class="form-control mb-3">

    <div class="form-check">
        <input type="checkbox" name="active" value="1" class="form-check-input" id="active" <?= $user['active'] ? 'checked' : '' ?>>
        <label class="form-check-label" for="active">Activo</label>
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" name="is_admin" value="1" class="form-check-input" id="is_admin" <?= $user['is_admin'] ? 'checked' : '' ?>>
        <label class="form-check-label" for="is_admin">Administrador</label>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= site_url('users') ?>" class="btn btn-secondary">Cancelar</a>
</form>
<?= $this->endSection() ?>