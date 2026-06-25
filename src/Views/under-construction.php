<?php
$pageStyles = '<link rel="stylesheet" href="/css/under-construction.css">';
require __DIR__ . '/layouts/head.php';
?>

<?php
require __DIR__ . '/layouts/header.php';
?>

<main class="construction-page">
    <section class="construction-card">
        <div class="construction-hero">
            <h1>Página en construcción</h1>
            <p>Estamos mejorando la experiencia para que vuelvas a encontrar tu propiedad ideal. Regresa dentro de poco para ver la versión actualizada.</p>
            <img src="/img/Under-Construction.gif" alt="Under Construction">
        </div>

        <div class="construction-actions">
            <a href="/" class="construction-button">Ir al inicio</a>
            <a href="/redirect" class="construction-link">Contactar soporte</a>
        </div>
    </section>

    <script src="/js/darkmode.js"></script>
</main>

<?php
require __DIR__ . '/layouts/footer.php';
?>
