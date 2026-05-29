<?php
require __DIR__ . '/layouts/head.php';
?>
<!-- CSS part -->
<link rel="stylesheet" href="css/404.css">

<?php
require __DIR__ . '/layouts/header.php';
?>
<!-- Main content of the webpage -->
<main>
    <div id="error-container">
        <div id="error-title-container">
            <h1 id="error-title">Error - 404 </h1>
                    <h2 id="error-title2"> Pagina no encontrada </h2>
                    <div>
                        <p id="error-message">Lo sentimos, la página que estás buscando no existe.</p>
                        <br><a href="/" id="error-link">Volver a la página principal</a>
                    </div>
        </div>
    </div>
</main>
<!-- Footer of the webpage, no change. -->
<?php
require __DIR__ . '/layouts/footer.php';
?>