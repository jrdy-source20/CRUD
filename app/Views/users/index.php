<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>
<body>

    <h1>Lista de usuarios</h1>

    <?php if (empty($users)): ?>

        <p>No hay usuarios registrados.</p>

    <?php else: ?>

        <?php foreach ($users as $user): ?>

            <div>
                <strong>ID:</strong>
                <?= esc($user['id']) ?>

                <br>

                <strong>Nombre:</strong>
                <?= esc($user['name']) ?>

                <br>

                <strong>Email:</strong>
                <?= esc($user['email']) ?>

                <hr>
            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</body>
</html>