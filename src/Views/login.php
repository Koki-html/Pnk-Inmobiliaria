
<?php

$pageTitle = 'Iniciar Sesión | PNK Inmobiliaria';
$pageStyle = 'login.css';

require __DIR__ . '/layouts/head.php';
?>


<main class="login-page">
    <section class="login-card">

        <div class="login-brand">
            <img
                src="/img/icon/Pnk.png"
                alt="Pnk logo"
                class="login-logo"
            >

            <div>
                <span class="login-label">
                    Pnk Inmobiliaria
                </span>

                <h1>Inicio de sesión</h1>
            </div>
        </div>

        <p class="login-subtitle">
            Accede a tu cuenta y gestiona tus propiedades con un solo clic.
        </p>

        <?php if(isset($_SESSION['error'])): ?>

            <div class="login-error">
                <?= htmlspecialchars($_SESSION['error']) ?>
            </div>

            <?php unset($_SESSION['error']); ?>

        <?php endif; ?>

        <form
            action="/login"
            method="POST"
            class="login-form"
        >

            <div class="form-group">
                <label for="mail-input">
                    Correo electrónico
                </label>

                <input
                    id="mail-input"
                    class="form-input"
                    type="email"
                    name="correo"
                    placeholder="tucorreo@ejemplo.com"
                    required
                >
            </div>

            <div class="form-group">

                <label for="psswd-input">
                    Contraseña
                </label>

                <input
                    id="psswd-input"
                    class="form-input"
                    type="password"
                    name="password"
                    placeholder="Tu contraseña"
                    required
                >

            </div>

            <button
                type="submit"
                class="login-button"
            >
                Iniciar sesión
            </button>

            <p class="login-help">
                <a href="/register">
                    ¿No tienes cuenta? Regístrate
                </a>
            </p>

        </form>

    </section>
</main>

<script src="/js/darkmode.js"></script>

</body>
</html>