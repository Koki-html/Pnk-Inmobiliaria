<?php
require __DIR__ . '/layouts/head.php';
?>
<!-- CSS part -->
<link rel="stylesheet" href="/css/login.css">
<head>

<!-- Main content of the webpage -->
<body>
    <main>
        <div id="login-container">
            <h1>Inicio de Sesión</h1>
            <hr>
            <div id="credential-div">
                <section class="credentials-section">
                    <label for="mail-input"><h2 class="credential-text">Correo Electrónico</h2>
                    <input id="mail-input" class="credential-input" type="text" name="" id="">
                </section>

                <section class="credentials-section">
                    <label for="psswd-input"><h2 class="credential-text">Contraseña</h2></label>
                    <input id="psswd-input" class="credential-input" type="password" name="" id="">
                </section>
                    <button>Iniciar Sesión</button>
                <br>
                <a href="/forgot-password">Olvide mi contraseña.</a>
            </div>
        </div>
    </main>
</body>
<!-- Footer of the webpage, no change. -->
<script src="js/darkmode.js"></script>
