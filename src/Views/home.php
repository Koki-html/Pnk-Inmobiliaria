<?php

$pageTitle = 'PNK Inmobiliaria';
$pageStyle = 'index.css';

require __DIR__ . '/layouts/head.php';
require __DIR__ . '/layouts/header.php';

?>

<main>
    <section id="Carrusel-Section">
        <!-- principal banner of the webpage -->
        <div id="Carrusel-Container">
        </div>
    </section>

    <section id="Search-Secction">
        <!-- Search bar for properties -->
        <div id="Search-Main-Container">
            <div id="Search-Container">

                <label for="Selling-Options">
                    <select name="Opciones" id="Selling-Options" class="search-input">
                        <option value="Buy">Venta</option>
                        <option value="Rent">Arriendo</option>
                        <option value="Temporal-Rent">Arriendo Temporal</option>
                    </select>
                </label>

                <label for="Type-Options">
                    <select name="Options" id="Type-Options" class="search-input">
                        <option value="House">Casa</option>
                        <option value="Apartment">Apartamento</option>
                        <option value="Office">Oficina</option>
                        <option value="Store">Locales</option>
                    </select>
                </label>

                <input
                    type="text"
                    class="search-input"
                    id="Search-Bar"
                    placeholder="Busca tu propiedad ideal..."
                >

                <a href="/search">
                    <button class="search-input" id="Search-Button">
                        Buscar
                    </button>
                </a>

            </div>
        </div>
    </section>

    <section>

        <div id="Main-Container">

            <div id="Content-Container" class="data-container">

                <h1>Propiedades Destacadas</h1>

                <hr>

                <div id="Properties-Container">

                    <div class="propertie-info">
                        <a href="/house">
                            <h3>En venta</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">

                            <div class="info-house">
                                <p>
                                    Detalles de la propiedad
                                    <br>
                                    Departamento de 32 m² con 3 habitaciones y 2 baños
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="propertie-info">
                        <a href="/house">
                            <h3>En alquiler</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">

                            <div class="info-house">
                                <p>
                                    Detalles de la propiedad
                                    <br>
                                    Apartamento de 50 m² con 2 habitaciones y 1 baño
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="propertie-info">
                        <a href="/house">
                            <h3>En venta</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">

                            <div class="info-house">
                                <p>
                                    Detalles de la propiedad
                                    <br>
                                    Terreno de 120 m² con 1 habitación y 1 baño
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="propertie-info">
                        <a href="/house">
                            <h3>En alquiler</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">

                            <div>
                                <p>
                                    Detalles de la propiedad
                                    <br>
                                    Departamento de 32 m² con 3 habitaciones y 2 baños
                                </p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>

            <div id="Agency-Container" class="data-container">

                <h1>Agencias Inmobiliarias</h1>

                <hr>

                <div id="Agency-Contents">

                    <a href="/redirect">
                        <button class="agency-info" id="inmobiliaria-1">
                        </button>
                    </a>

                    <a href="/redirect">
                        <button class="agency-info" id="inmobiliaria-2">
                        </button>
                    </a>

                    <a href="/redirect">
                        <button class="agency-info" id="inmobiliaria-3">
                        </button>
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>

<?php require __DIR__ . '/layouts/footer.php'; ?>