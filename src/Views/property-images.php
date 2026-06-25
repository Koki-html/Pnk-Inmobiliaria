<?php

$pageTitle =
    'Imágenes de Propiedad | PNK Inmobiliaria';

$pageStyle =
    'property-images.css';

require __DIR__ . '/layouts/head.php';
require __DIR__ . '/layouts/header.php';

$idPropiedad =
    (int) ($_GET['id'] ?? 0);

?>

<main>

    <section class="image-upload-container">

        <h1>
            Administrar Imágenes
        </h1>

        <p>
            Sube fotografías para tu propiedad.
        </p>

        <form
            action="/owner/image/upload"
            method="POST"
            enctype="multipart/form-data"
        >

            <input
                type="hidden"
                name="id_propiedad"
                value="<?= $idPropiedad ?>"
            >

            <div class="form-group">

                <label for="imagenes">
                    Seleccionar Imágenes
                </label>

                <input
                    type="file"
                    id="imagenes"
                    name="imagenes[]"
                    accept=".jpg,.jpeg,.png,.webp"
                    multiple
                    required
                >

            </div>

            <button
                type="submit"
                class="submit-btn"
            >
                Subir Imágenes
            </button>

        </form>

    </section>

</main>

<?php require __DIR__ . '/layouts/footer.php'; ?>