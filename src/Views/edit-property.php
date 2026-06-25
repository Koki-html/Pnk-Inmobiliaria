<?php

if (!isset($propiedad)) {

    die(
        'Error: la propiedad no fue enviada a la vista.'
    );
}

$pageTitle =
    'Editar Propiedad | PNK Inmobiliaria';

require __DIR__ . '/layouts/head.php';
require __DIR__ . '/layouts/header.php';

?>

<main>

    <section class="form-container">

        <h1>
            Editar Propiedad
        </h1>

        <form
            action="/owner/property/update?id=<?= $propiedad['id_propiedad'] ?>"
            method="POST"
        >

            <div class="form-group">

                <label>
                    Descripción
                </label>

                <textarea
                    name="descripcion"
                    rows="6"
                    required
                ><?= htmlspecialchars($propiedad['descripcion'] ?? '') ?></textarea>

            </div>

            <br>

            <div class="form-group">

                <label>
                    Precio CLP
                </label>

                <input
                    type="number"
                    name="precio_pesos"
                    value="<?= htmlspecialchars($propiedad['precio_pesos'] ?? '') ?>"
                    required
                >

            </div>

            <br>

            <div class="form-group">

                <label>
                    Precio UF
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="precio_uf"
                    value="<?= htmlspecialchars($propiedad['precio_uf'] ?? '') ?>"
                >

            </div>

            <br>

            <div class="form-group">

                <label>

                    <input
                        type="checkbox"
                        name="activa"
                        <?= !empty($propiedad['activa']) ? 'checked' : '' ?>
                    >

                    Propiedad Activa

                </label>

            </div>

            <br>

            <button
                type="submit"
                class="submit-btn"
            >
                Guardar Cambios
            </button>

        </form>

    </section>

</main>

<?php require __DIR__ . '/layouts/footer.php'; ?>