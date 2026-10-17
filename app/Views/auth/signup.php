<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 mb-4 text-center">Registro</h1>
                <form action="<?= site_url('signup') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="<?= esc(old('name')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" value="<?= esc(old('email')) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Repetir contraseña</label>
                        <input type="password" name="repeat" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                    <a href="<?= site_url('/') ?>" class="btn btn-secondary">Cancelar</a>
                </form>
                <p class="text-center mt-3 mb-0">
                    ¿Ya tienes cuenta? <a href="<?= site_url('login') ?>">Inicia sesión</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>