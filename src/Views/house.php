<?php
require __DIR__ . '/layouts/head.php';
?>
<!-- CSS part -->
<link rel="stylesheet" href="css/house.css">
<?php
require __DIR__ . '/layouts/header.php';
?>
<!-- Main content of the webpage -->
<main>

    <div id="Main-Container">
        <div id="Data-Container">
            <div id="Image-Container1"></div>
            <hr id="hr-lateral">
            <div id="property-information">
                <h2 id="House-Tittle">Casa de 250m² con ubicación privilegiada</h2>
                <br>
                <p>Esta casa de 250m² ofrece una ubicación privilegiada en uno de los barrios más exclusivos de la ciudad. Con espacios amplios y acabados de calidad, es el lugar perfecto para disfrutar de la vida en familia.</p>
                <br>
                <hr />
                <br>
                <h2>Características</h2>
                <div id="Caracteristicas-Container">
                    <ul>
                        <li>
                            <p><strong>Habitaciones: </strong> 4 </p>
                        </li>
                        <li>
                            <p><strong>Baños: </strong> 3 </p>
                        </li>
                        <li>
                            <p><strong>Metros cuadrados: </strong> 250 m² </p>
                        </li>
                        <li>
                            <p><strong>Precio: </strong> $150.000.000 CLP </p>
                        </li>
                        <li>
                            <p><strong>Precio en UF:</strong> 1,500 UF </p>
                        </li>
                        <li>
                            <p><strong>Otras características: </strong>
                            <ul>
                                <li>Garage</li>
                                <li>Jardín</li>
                                <li>Aire acondicionado</li>
                                <li>Gimnasio</li>
                                <li>Oficina</li>
                                <li>Estacionamiento</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <hr>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3458.560198354647!2d-71.26770781657714!3d-29.90577069580074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9691ca0da2493313%3A0xc8e0f7178a499a40!2sInacap%20La%20Serena!5e0!3m2!1ses!2scl!4v1779938233287!5m2!1ses!2scl" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <br>
                <hr>
                <a href="redirect-page.html"><button id="Contact-Button">
                        <h3>Comprar</h3>
                    </button></a>
            </div>
        </div>
    </div>
</main>

<!-- Footer of the webpage, no change. -->

<?php
require __DIR__ . '/layouts/footer.php';
?>