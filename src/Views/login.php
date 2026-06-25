<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí se procesaría la autenticación.
    // Después de validar credenciales, redirigimos a GET para evitar el aviso de reenvío.
    header('Location: /login');
    exit;
}

$pageStyles = '<link rel="stylesheet" href="/css/login.css">';
require __DIR__ . '/layouts/head.php';
?>
<main class="login-page">
    <section class="login-card">
        <div class="login-brand">
            <img src="/img/icon/Pnk.png" alt="Pnk logo" class="login-logo">
            <div>
                <span class="login-label">Pnk Inmobiliaria</span>
                <h1>Inicio de sesión</h1>
            </div>
        </div>

        <p class="login-subtitle">Accede a tu cuenta y gestiona tus propiedades con un solo clic.</p>

        <form action="/login" method="post" class="login-form">
            <div class="form-group">
                <label for="mail-input">Correo electrónico</label>
                <input id="mail-input" class="form-input" type="email" name="email" placeholder="tucorreo@ejemplo.com" required>
            </div>

            <div class="form-group">
                <label for="psswd-input">Contraseña</label>
                <input id="psswd-input" class="form-input" type="password" name="password" placeholder="Tu contraseña" required>
            </div>

            <button type="submit" class="login-button">Iniciar sesión</button>
            <p class="login-help"><a href="/forgot-password">Olvidé mi contraseña</a></p>
        </form>
    </section>
</main>
<script src="/js/darkmode.js"></script>
</body>
</html>
