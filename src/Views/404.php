<?php

$pageTitle = 'Error 404 | PNK Inmobiliaria';
$pageStyle = '404.css';

require __DIR__ . '/layouts/head.php';
require __DIR__ . '/layouts/header.php';

?>

<main>

    <div id="error-container">

        <div id="error-title-container">

            <h1 id="error-title">
                Error - 404
            </h1>

            <h2 id="error-title2">
                Página no encontrada
            </h2>

            <div>

                <p id="error-message">
                    Lo sentimos, la página que estás buscando no existe.
                </p>

                <br>

                <a
                    href="/"
                    id="error-link"
                >
                    Volver a la página principal
                </a>

            </div>

        </div>

    </div>

</main>

<?php require __DIR__ . '/layouts/footer.php'; ?>