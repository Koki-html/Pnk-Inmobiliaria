<?php

$pageTitle = 'Detalle Propiedad | PNK Inmobiliaria';
$pageStyle = 'house.css';

require __DIR__ . '/layouts/head.php';
require __DIR__ . '/layouts/header.php';

?>

<main>

    <div id="Data-Container">

        <section id="Property-Hero">

            <?php require __DIR__ . '/components/property-gallery.php'; ?>

            <?php require __DIR__ . '/components/property-summary.php'; ?>

        </section>

        <?php require __DIR__ . '/components/property-details.php'; ?>

    </div>

</main>

<script src="/js/house.js"></script>

<?php require __DIR__ . '/layouts/footer.php'; ?>