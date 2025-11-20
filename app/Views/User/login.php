<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login de usuario</title>
</head>
<body>

    <h1>Iniciar sesión</h1>

    <!-- Mensaje de error si algo falla -->
    <?php if (!empty($error)): ?>
        <p style="color:red;">
            <?= esc($error) ?>
        </p>
    <?php endif; ?>

    <form action="/user/login" method="post">
        <div>
            <label for="login">Usuario (login):</label><br>
            <input type="text" name="login" id="login"
                   value="<?= isset($remember_login) ? esc($remember_login) : '' ?>">
        </div>

        <div>
            <label for="password">Contraseña:</label><br>
            <input type="password" name="password" id="password">
        </div>

        <br>

        <button type="submit">Entrar</button>
    </form>

    <script src="/js/login.js"></script>

</body>
</html>
