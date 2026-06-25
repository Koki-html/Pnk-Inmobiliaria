<?php

$pageTitle =
    'Buscar Propiedades | PNK Inmobiliaria';

$pageStyle =
    'search.css';

require __DIR__ .
    '/layouts/head.php';

require __DIR__ .
    '/layouts/header.php';

?>

<main>

    <div id="Main-Container">

        <?php require __DIR__ .
            '/components/property-filters.php'; ?>

        <div id="Houses-Container">

            <h1 id="Main-Title">
                Tu hogar ideal a 2 pasos
            </h1>

            <hr
                style="
                    border-color:
                    var(--primary);
                "
            >

            <div id="House-Grid">

                <?php if (!empty($propiedades)): ?>

                    <?php foreach (
                        $propiedades
                        as $propiedad
                    ): ?>

                        <?php require __DIR__ .
                            '/components/property-card.php'; ?>

                    <?php endforeach; ?>

                <?php else: ?>

                    <div
                        class="empty-results"
                    >

                        <h2>
                            No se encontraron
                            propiedades
                        </h2>

                        <p>
                            Intenta modificar
                            los filtros de
                            búsqueda.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</main>

<?php

require __DIR__ .
    '/layouts/footer.php';

?>