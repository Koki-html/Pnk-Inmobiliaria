<?php

if (!isset($propiedad) || !is_array($propiedad)) {
    return;
}

?>

<section class="property-section">

    <h2>Descripción</h2>

    <p>
        <?= htmlspecialchars(
            $propiedad['descripcion'] ?? ''
        ) ?>
    </p>

</section>

<section class="property-section">

    <h2>Características</h2>

    <div id="Caracteristicas-Container">

        <ul>

            <li>
                <strong>Habitaciones:</strong>
                <?= $propiedad['dormitorios'] ?? 0 ?>
            </li>

            <li>
                <strong>Baños:</strong>
                <?= $propiedad['banos'] ?? 0 ?>
            </li>

            <li>
                <strong>Área Construida:</strong>
                <?= $propiedad['area_construida'] ?? 'No especificado' ?>
            </li>

            <li>
                <strong>Área Terreno:</strong>
                <?= $propiedad['area_terreno'] ?? 'No especificado' ?>
            </li>

            <li>
                <strong>Precio:</strong>

                $

                <?= number_format(
                    $propiedad['precio_pesos'] ?? 0,
                    0,
                    ',',
                    '.'
                ) ?>

                CLP
            </li>

            <?php if (!empty($propiedad['precio_uf'])): ?>

                <li>
                    <strong>Precio UF:</strong>
                    <?= $propiedad['precio_uf'] ?>
                    UF
                </li>

            <?php endif; ?>

            <?php if (!empty($propiedad['bodega'])): ?>
                <li>📦 Bodega</li>
            <?php endif; ?>

            <?php if (!empty($propiedad['estacionamiento'])): ?>
                <li>🚗 Estacionamiento</li>
            <?php endif; ?>

            <?php if (!empty($propiedad['logia'])): ?>
                <li>🧺 Logia</li>
            <?php endif; ?>

            <?php if (!empty($propiedad['cocina_amoblada'])): ?>
                <li>🍴 Cocina Amoblada</li>
            <?php endif; ?>

