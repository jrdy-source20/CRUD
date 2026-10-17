<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h1>Perfil</h1>

<?php if ($user['profile_image']): ?>
    <img src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" width="150" class="rounded-circle mb-2">
<?php else: ?>
    <div style="width:150px;height:150px;border-radius:50%;background:#bbb;color:#fff;font-size:60px;text-align:center;line-height:150px">
        <?= esc(strtoupper(mb_substr($user['name'], 0, 1))) ?>
    </div>
<?php endif; ?>

<?php if ($user['profile_image']): ?>
    <a href="<?= site_url('profile/image/delete') ?>" class="btn btn-sm btn-danger my-2">Eliminar imagen</a>
<?php endif; ?>

<p class="mt-3"><b>Nombre:</b> <?= esc($user['name']) ?></p>
<p><b>Correo:</b> <?= esc($user['email']) ?></p>

<a href="<?= site_url('profile/confirm') ?>" class="btn btn-warning">Editar</a>
<a href="<?= site_url('profile/password') ?>" class="btn btn-primary">Cambiar contraseña</a>
<a href="<?= site_url('profile/image') ?>" class="btn btn-secondary">Cambiar imagen</a>
<?= $this->endSection() ?>