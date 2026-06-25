<?php
/** @var array $propiedad */
?>

<div class="house-info">

    <a href="/house?id=<?= $propiedad['id'] ?>">

        <div
            class="house-image"
            style="
                background-image: url('<?= $propiedad['imagen'] ?>');
                background-size: cover;
                background-position: center;
            "
        ></div>

        <hr>

        <p class="house-text">
            <?= htmlspecialchars($propiedad['tipo']) ?>
            en
            <?= htmlspecialchars($propiedad['comuna']) ?>
        </p>

        <p class="house-price">
            $<?= number_format($propiedad['precio'], 0, ',', '.') ?>
        </p>

        <button class="details-button">
            Ver detalles
        </button>

    </a>

</div>