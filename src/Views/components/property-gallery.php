<div id="Gallery-Container">

    <?php if (
        isset($imagenes) &&
        !empty($imagenes)
    ): ?>

        <?php foreach (
            $imagenes as $index => $imagen
        ): ?>

            <?php

            $ruta =
                !empty(
                    $imagen['ruta_imagen']
                )
                ? $imagen['ruta_imagen']
                : '/img/Casa-pnk1.webp';

            ?>

            <div
                class="gallery-slide <?= $index === 0 ? 'active' : '' ?>"
                style="background-image:url('<?= htmlspecialchars($ruta) ?>')"
            ></div>

        <?php endforeach; ?>

        <button id="Prev-Image">
            ❮
        </button>

        <button id="Next-Image">
            ❯
        </button>

        <div id="Gallery-Thumbnails">

            <?php foreach (
                $imagenes as $index => $imagen
            ): ?>

                <?php

                $ruta =
                    !empty(
                        $imagen['ruta_imagen']
                    )
                    ? $imagen['ruta_imagen']
                    : '/img/Casa-pnk1.webp';

                ?>

                <img
                    src="<?= htmlspecialchars($ruta) ?>"
                    class="gallery-thumb <?= $index === 0 ? 'active-thumb' : '' ?>"
                    onerror="this.src='/img/Casa-pnk1.webp'"
                >

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div
            class="gallery-slide active"
            style="background-image:url('/img/Casa-pnk1.webp')"
        ></div>

    <?php endif; ?>

</div>