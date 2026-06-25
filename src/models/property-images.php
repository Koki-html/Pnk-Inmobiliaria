<?php

$pageTitle =
    'Administrar Imágenes';

$pageStyle =
    'owner-property-form.css';

require __DIR__ .
    '/layouts/head.php';

require __DIR__ .
    '/layouts/header.php';

$idPropiedad =
    (int) ($_GET['id'] ?? 0);

?>

<main>

    <section class="form-container">

        <h1>
            Administrar Imágenes
        </h1>

        <form
            action="/owner/image/upload"
            method="POST"
            enctype="multipart/form-data"
            class="property-form"
        >

            <input
                type="hidden"
                name="id_propiedad"
                value="<?= $idPropiedad ?>"
            >

            <div class="form-group">

                <label>
                    Selecciona hasta 10 imágenes
                </label>

                <input
                    type="file"
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

<?php require __DIR__ .
'/layouts/footer.php'; ?>