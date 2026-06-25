<?php

$pageTitle =
    'Registrar Propiedad | PNK Inmobiliaria';

$pageStyle =
    'owner-property-form.css';

require __DIR__ . '/layouts/head.php';
require __DIR__ . '/layouts/header.php';

?>

<main>

    <section class="form-container">

        <h1>
            Registrar Nueva Propiedad
        </h1>

        <form
            action="/owner/property/store"
            method="POST"
            class="property-form"
        >

            <div class="form-group">

                <label for="codigo_publicacion">
                    Código de Publicación
                </label>

                <input
                    type="text"
                    id="codigo_publicacion"
                    name="codigo_publicacion"
                    required
                >

            </div>

            <h2>
                Ubicación
            </h2>

            <div class="form-group">

                <label for="comuna">
                    Comuna
                </label>

                <select
                    id="comuna"
                    name="comuna"
                    required
                >

                    <option value="">
                        Seleccione una comuna
                    </option>

                    <option value="La Serena">
                        La Serena
                    </option>

                    <option value="Coquimbo">
                        Coquimbo
                    </option>

                    <option value="Andacollo">
                        Andacollo
                    </option>

                    <option value="Vicuña">
                        Vicuña
                    </option>

                    <option value="Paihuano">
                        Paihuano
                    </option>

                    <option value="Ovalle">
                        Ovalle
                    </option>

                    <option value="Monte Patria">
                        Monte Patria
                    </option>

                    <option value="Punitaqui">
                        Punitaqui
                    </option>

                    <option value="Río Hurtado">
                        Río Hurtado
                    </option>

                    <option value="Combarbalá">
                        Combarbalá
                    </option>

                    <option value="Illapel">
                        Illapel
                    </option>

                    <option value="Salamanca">
                        Salamanca
                    </option>

                    <option value="Los Vilos">
                        Los Vilos
                    </option>

                    <option value="Canela">
                        Canela
                    </option>

                </select>

            </div>

            <div class="form-group">

            <div class="form-group">

                <label for="direccion">
                    Dirección
                </label>

                <input
                    type="text"
                    id="direccion"
                    name="direccion"
                >

            </div>

            <h2>
                Información General
            </h2>

            <div class="form-group">

                <label for="tipo_propiedad">
                    Tipo de Propiedad
                </label>

                <select
                    id="tipo_propiedad"
                    name="tipo_propiedad"
                    required
                >

                    <option value="Casa">
                        Casa
                    </option>

                    <option value="Departamento">
                        Departamento
                    </option>

                    <option value="Terreno">
                        Terreno
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label for="descripcion">
                    Descripción
                </label>

                <textarea
                    id="descripcion"
                    name="descripcion"
                    rows="6"
                    required
                ></textarea>

            </div>

            <div class="form-row">

                <div class="form-group">

                    <label for="dormitorios">
                        Dormitorios
                    </label>

                    <input
                        type="number"
                        id="dormitorios"
                        name="dormitorios"
                        value="0"
                        min="0"
                    >

                </div>

                <div class="form-group">

                    <label for="banos">
                        Baños
                    </label>

                    <input
                        type="number"
                        id="banos"
                        name="banos"
                        value="0"
                        min="0"
                    >

                </div>

            </div>

            <div class="form-row">

                <div class="form-group">

                    <label for="area_terreno">
                        Área Terreno (m²)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        id="area_terreno"
                        name="area_terreno"
                    >

                </div>

                <div class="form-group">

                    <label for="area_construida">
                        Área Construida (m²)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        id="area_construida"
                        name="area_construida"
                    >

                </div>

            </div>

            <div class="form-row">

                <div class="form-group">

                    <label for="precio_pesos">
                        Precio CLP
                    </label>

                    <input
                        type="number"
                        id="precio_pesos"
                        name="precio_pesos"
                        required
                    >

                </div>

                <div class="form-group">

                    <label for="precio_uf">
                        Precio UF
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        id="precio_uf"
                        name="precio_uf"
                    >

                </div>

            </div>

            <div class="form-row">

                <div class="form-group">

                    <label for="latitud">
                        Latitud
                    </label>

                    <input
                        type="number"
                        step="0.00000001"
                        id="latitud"
                        name="latitud"
                    >

                </div>

                <div class="form-group">

                    <label for="longitud">
                        Longitud
                    </label>

                    <input
                        type="number"
                        step="0.00000001"
                        id="longitud"
                        name="longitud"
                    >

                </div>

            </div>

            <h2>
                Características
            </h2>

            <div class="checkbox-grid">

                <label>
                    <input
                        type="checkbox"
                        name="bodega"
                    >
                    Bodega
                </label>

                <label>
                    <input
                        type="checkbox"
                        name="estacionamiento"
                    >
                    Estacionamiento
                </label>

                <label>
                    <input
                        type="checkbox"
                        name="logia"
                    >
                    Logia
                </label>

                <label>
                    <input
                        type="checkbox"
                        name="cocina_amoblada"
                    >
                    Cocina Amoblada
                </label>

                <label>
                    <input
                        type="checkbox"
                        name="antejardin"
                    >
                    Antejardín
                </label>

                <label>
                    <input
                        type="checkbox"
                        name="patio_trasero"
                    >
                    Patio Trasero
                </label>

                <label>
                    <input
                        type="checkbox"
                        name="piscina"
                    >
                    Piscina
                </label>

                <br>
                </div>
                
                <div>
                    <h2>
                        Fotografías
                    </h2>
                    <div class="form-group">
                        <br>
                        <label for="imagenes">
                            Seleccionar Imágenes
                        </label>

                        <input
                            type="file"
                            id="imagenes"
                            name="imagenes[]"
                            accept=".jpg,.jpeg,.png,.webp"
                            multiple
                        >

                        <small>
                            Puedes subir hasta 10 imágenes.
                        </small>

                    </div>
                </div>
            </div>

            <button
                type="submit"
                class="submit-btn"
            >
                Registrar Propiedad
            </button>

        </form>

    </section>

</main>

<?php require __DIR__ . '/layouts/footer.php'; ?>