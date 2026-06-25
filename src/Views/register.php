<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí puedes procesar el registro y redirigir después.
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
                <h1>Crear cuenta</h1>
            </div>
        </div>

        <p class="login-subtitle">Regístrate para publicar y administrar propiedades en un solo lugar.</p>

        <form action="/register" method="post" class="login-form">
            <div class="form-group">
                <label for="name-input">Nombre completo</label>
                <input id="name-input" class="form-input" type="text" name="name" placeholder="Tu nombre completo" required>
            </div>

            <div class="form-group">
                <label for="email-input">Correo electrónico</label>
                <input id="email-input" class="form-input" type="email" name="email" placeholder="tucorreo@ejemplo.com" required>
            </div>

            <div class="form-group">
                <label for="password-input">Contraseña</label>
                <input id="password-input" class="form-input" type="password" name="password" placeholder="Tu contraseña" required>
            </div>

            <button type="submit" class="login-button">Registrarse</button>
        </form>
    </section>
</main>

<script src="/js/darkmode.js"></script>
