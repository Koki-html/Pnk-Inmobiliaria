<?php
$pageStyles = '<link rel="stylesheet" href="/css/register-owner.css">';
require __DIR__ . '/layouts/head.php';
?>

<main class="register-page">
    <section class="register-panel">
        <div class="register-header">
            <div>
                <span class="register-badge">Registro</span>
                <h1>Regístrate como Propietario o Gestor Inmobiliario Free</h1>
                <p>Selecciona el tipo de cuenta y completa tus datos básicos. El propietario quedará en estado pendiente hasta la verificación del administrador.</p>
            </div>
        </div>

        <div class="register-tabs" role="tablist">
            <button type="button" class="register-tab active" data-target="owner-form">Registrarme como PROPIETARIO</button>
            <button type="button" class="register-tab" data-target="manager-form">Registrarme como GESTOR INMOBILIARIO FREE</button>
        </div>

        <div class="register-forms">
            <form id="owner-form" class="register-form active" action="/register-owner" method="post">
                <input type="hidden" name="account_type" value="owner">
                <div class="register-grid">
                    <div class="form-group">
                        <label for="owner-rut">RUT</label>
                        <input id="owner-rut" class="form-input" type="text" name="rut" placeholder="12.345.678-9" required>
                    </div>
                    <div class="form-group">
                        <label for="owner-name">Nombre completo</label>
                        <input id="owner-name" class="form-input" type="text" name="full_name" placeholder="Tu nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label for="owner-birthdate">Fecha de nacimiento</label>
                        <input id="owner-birthdate" class="form-input" type="date" name="birthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="owner-email">Correo electrónico</label>
                        <input id="owner-email" class="form-input" type="email" name="email" placeholder="tucorreo@ejemplo.com" required>
                    </div>
                    <div class="form-group">
                        <label for="owner-password">Contraseña</label>
                        <input id="owner-password" class="form-input" type="password" name="password" placeholder="Tu contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="owner-gender">Sexo</label>
                        <select id="owner-gender" class="form-select" name="gender" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="female">Femenino</option>
                            <option value="male">Masculino</option>
                            <option value="other">Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="owner-phone">Teléfono móvil</label>
                        <input id="owner-phone" class="form-input" type="tel" name="mobile" placeholder="+56 9 1234 5678" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="owner-property-number">N° de propiedad según registro de Bienes Raíces</label>
                        <input id="owner-property-number" class="form-input" type="text" name="property_number" placeholder="Número de la propiedad" required>
                    </div>
                </div>
                <div class="register-actions">
                    <button type="submit" class="register-button">Registrarme como PROPIETARIO</button>
                </div>
            </form>

            <form id="manager-form" class="register-form" action="/register-owner" method="post" enctype="multipart/form-data">
                <input type="hidden" name="account_type" value="manager">
                <div class="register-grid">
                    <div class="form-group">
                        <label for="manager-rut">RUT</label>
                        <input id="manager-rut" class="form-input" type="text" name="rut" placeholder="12.345.678-9" required>
                    </div>
                    <div class="form-group">
                        <label for="manager-name">Nombre completo</label>
                        <input id="manager-name" class="form-input" type="text" name="full_name" placeholder="Tu nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label for="manager-birthdate">Fecha de nacimiento</label>
                        <input id="manager-birthdate" class="form-input" type="date" name="birthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="manager-email">Correo electrónico</label>
                        <input id="manager-email" class="form-input" type="email" name="email" placeholder="tucorreo@ejemplo.com" required>
                    </div>
                    <div class="form-group">
                        <label for="manager-password">Contraseña</label>
                        <input id="manager-password" class="form-input" type="password" name="password" placeholder="Tu contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="manager-gender">Sexo</label>
                        <select id="manager-gender" class="form-select" name="gender" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="female">Femenino</option>
                            <option value="male">Masculino</option>
                            <option value="other">Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="manager-phone">Teléfono móvil</label>
                        <input id="manager-phone" class="form-input" type="tel" name="mobile" placeholder="+56 9 1234 5678" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="manager-backgrounds">Certificado de antecedentes</label>
                        <input id="manager-backgrounds" class="form-file" type="file" name="background_certificate" accept=".pdf,.jpg,.png" required>
                    </div>
                </div>
                <div class="register-actions">
                    <button type="submit" class="register-button">Registrarme como GESTOR INMOBILIARIO FREE</button>
                </div>
            </form>
        </div>
    </section>
</main>

<script src="/js/darkmode.js"></script>
<script>
    const tabs = document.querySelectorAll('.register-tab');
    const forms = document.querySelectorAll('.register-form');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(item => item.classList.remove('active'));
            tab.classList.add('active');
            forms.forEach(form => {
                form.classList.toggle('active', form.id === tab.dataset.target);
            });
        });
    });
</script>
