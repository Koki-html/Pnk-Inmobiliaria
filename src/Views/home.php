<?php
require __DIR__ . '/layouts/head.php';
?>

<link rel="stylesheet" href="/css/index.css">

<?php
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
                <!-- Searching input and button-->
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
                <input type="text" class="search-input" id="Search-Bar" placeholder="Busca tu propiedad ideal..." />
                <a href="/Search"><button class="search-input" id="Search-Button">Buscar</button></a>
            </div>
        </div>
    </section>
    <section>
        <!-- Featured properties -->
        <div id="Main-Container">
            <!-- Content container for featured properties -->
            <div id="Content-Container" class="data-container">
                <h1>Propiedades Destacadas</h1>
                <hr />
                <!-- Principal container for the properties-->
                <div id="Properties-Container">
                    <!-- All the properties with images and details -->

                    <!-- 1 -->
                    <div class="propertie-info">
                        <a href="/House">
                            <h3>En venta</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">
                            <div class="info-house">
                                <p>Detalles de la propiedad <br> Departamento de 32 m² con 3 habitaciones y 2 baños
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- 2 -->
                    <div class="propertie-info">
                        <a href="/House">
                            <h3>En alquiler</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">
                            <div class="info-house">
                                <p>Detalles de la propiedad <br> Apartamento de 50 m² con 2 habitaciones y 1 baños
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- 3 -->
                    <div class="propertie-info">
                        <a href="/House">
                            <h3>En venta</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">
                            <div class="info-house">
                                <p>Detalles de la propiedad <br> Terreno de 120 m² con 1 habitación y 1 baños
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- 4 -->
                    <div class="propertie-info">
                        <a href="/House">
                            <h3>En alquiler</h3>
                            <hr>
                            <img src="img/Casa-pnk1.webp" alt="house" class="house-image">
                            <div>
                                <p>Detalles de la propiedad <br> Departamento de 32 m² con 3 habitaciones y 2 baños
                                </p>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
            <!-- Real estate agency containers -->
            <div id="Agency-Container" class="data-container">
                <h1>Agencias Inmobiliarias</h1>
                <hr />
                <div id="Agency-Contents">
                    <a href="/Redirect">
                        <button class="agency-info" id="inmobiliaria-1">
                        </button>
                    </a>
                    <a href="/Redirect">
                        <button class="agency-info" id="inmobiliaria-2">
                        </button>
                    </a>
                    <a href="Redirect">
                        <button class="agency-info" id="inmobiliaria-3">
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
require __DIR__ . '/layouts/footer.php';
?>