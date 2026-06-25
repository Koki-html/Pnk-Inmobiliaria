<?php

if (!isset($propiedad)) {
    return;
}

?>

<div id="house-summary">

    <span class="property-code">
        Código:
        <?= htmlspecialchars(
            $propiedad['codigo_publicacion'] ?? ''
        ) ?>
    </span>

    <h2>
        <?= htmlspecialchars(
            $propiedad['tipo_propiedad'] ?? ''
        ) ?>
    </h2>

    <div class="property-price">

        $

        <?= number_format(
            (float) (
                $propiedad['precio_pesos']
                ?? 0
            ),
            0,
            ',',
            '.'
        ) ?>

        CLP

    </div>

    <div class="property-features">

        <span>
            🛏
            <?= $propiedad['dormitorios'] ?? 0 ?>
            Habitaciones
        </span>

        <span>
            🚿
            <?= $propiedad['banos'] ?? 0 ?>
            Baños
        </span>

        <span>
            📐
            <?= $propiedad['area_construida'] ?? 0 ?>
            m²
        </span>

        <?php if (
            !empty(
                $propiedad['estacionamiento']
            )
        ): ?>

            <span>
                🚗 Estacionamiento
            </span>

        <?php endif; ?>

    </div>

    <a
        href="/redirect"
        class="property-button"
    >
        📅 Agendar Visita
    </a>

</div>