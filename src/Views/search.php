<?php
require __DIR__ . '/layouts/head.php';
?>
<!-- CSS part -->
<link rel="stylesheet" href="css/search.css">
<?php
require __DIR__ . '/layouts/header.php';
?>
<!-- Main content of the webpage -->
<main>
    <div id="Main-Container">
        <div id="Filters-Container">
            <h2 id="Filter-Title">Encuentra tu hogar ideal</h2>
            <hr style="border-color: var(--primary);">
            <div id="Filters-Grid">
                <select class="filter-select" id="Filter-Orden">
                    <option value="" disabled selected>Ordenar por</option>
                    <option value="precio-asc">Precio: Menor a Mayor</option>
                    <option value="precio-dsc">Precio: Mayor a Menor</option>
                    <option value="recientes">Más Recientes</option>
                </select>
                <br>
                <select class="filter-select" id="Filter-Type">
                    <option value="" disabled selected>Tipo de propiedad</option>
                    <option value="casa">Casa</option>
                    <option value="departamento">Departamento</option>
                    <option value="terreno">Terreno</option>
                </select>
                <br>
                <select class="filter-select" id="Filter-Location">
                    <option value="" disabled selected>Comuna</option>
                    <option value="andacollo">Andacollo</option>
                    <option value="canela">Canela</option>
                    <option value="combarbalá">Combarbalá</option>
                    <option value="coquimbo">Coquimbo</option>
                    <option value="illapel">Illapel</option>
                    <option value="la-higuera">La Higuera</option>
                    <option value="la-serena">La Serena</option>
                    <option value="los-vilos">Los Vilos</option>
                    <option value="monte-patria">Monte Patria</option>
                    <option value="ovalle">Ovalle</option>
                    <option value="paihuano">Paihuano</option>
                    <option value="punitaqui">Punitaqui</option>
                    <option value="río-hurtado">Río Hurtado</option>
                    <option value="salamanca">Salamanca</option>
                    <option value="vicuña">Vicuña</option>
                </select>
                <br>
                <select class="filter-select" id="Filter-Rooms">
                    <option value="" disabled selected>N° de habitaciones</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
                </select>
                <br>
                <select class="filter-select" id="Filter-Bathrooms">
                    <option value="" disabled selected>N° de baños</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
                </select>
                <br>
                <div id="Filter-Input">
                    <label class="filter-label" for="Min-Price">Precio Mínimo</label>
                    <br>
                    <input class="filter-input" type="number" id="Min-Price" placeholder="0">
                    <br>
                    <label class="filter-label" for="Max-Price">Precio Máximo</label>
                    <br>
                    <input class="filter-input" type="number" id="Max-Price" placeholder="0">
                    <br>
                    <label class="filter-label" for="Min-Terrain">Superficie Terreno minima</label>
                    <br>
                    <input class="filter-input" type="number" id="Min-Terrain" placeholder="0">
                    <br>
                    <label class="filter-label" for="Max-Terrain">Superficie Terreno maxima</label>
                    <br>
                    <input class="filter-input" type="number" id="Max-Terrain" placeholder="0">
                </div>
                <br>
                <div id="Buttons-Container">
                    <button id="Search-Btn">Buscar</button>
                    <button id="Filter-Reset-Btn">Restablecer Filtros</button>
                </div>
            </div>
        </div>
        <div id="Houses-Container">
            <h1 id="Main-Title">Tu hogar ideal a 2 pasos</h1>
            <hr style="border-color: var(--primary);">
            <div id="House-Grid">
                <div class="house-info" id="house-one">
                    <a href="/House">
                        <div src="img/Casa-pnk1.webp" alt="Casa-Pnk" class="house-image" id="House-One"></div>
                        <hr>
                        <p class="house-text" id="Text-One">Casa en <span id="Comuna-One">Comuna</span>, <span id="Region-One">Región</span></p>
                        <p class="house-price" id="Price-One">En: $<span id="Price-Value-One">0</span></p>
                        <button id="Button-One">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-two">
                    <a href="/House">
                        <div src="img/Casa-pnk2.webp" alt="Casa-Pnk" class="house-image" id="House-Two"></div>
                        <hr>
                        <p class="house-text" id="Text-Two">Casa en <span id="Comuna-Two">Comuna</span>, <span id="Region-Two">Región</span></p>
                        <p class="house-price" id="Price-Two">En: $<span id="Price-Value-Two">0</span></p>
                        <button id="Button-Two">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-three">
                    <a href="/House">
                        <div src="img/Casa-pnk3.webp" alt="Casa-Pnk" class="house-image" id="House-Three"></div>
                        <hr>
                        <p class="house-text" id="Text-Three">Casa en <span id="Comuna-Three">Comuna</span>, <span id="Region-Three">Región</span></p>
                        <p class="house-price" id="Price-Three">En: $<span id="Price-Value-Three">0</span></p>
                        <button id="Button-Three">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-four">
                    <a href="/House">
                        <div src="img/Casa-pnk1.webp" alt="Casa-Pnk" class="house-image" id="House-Four"></div>
                        <hr>
                        <p class="house-text" id="Text-Four">Casa en <span id="Comuna-Four">Comuna</span>, <span id="Region-Four">Región</span></p>
                        <p class="house-price" id="Price-Four">En: $<span id="Price-Value-Four">0</span></p>

                        <button id="Button-Four">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-five">
                    <a href="/House">
                        <div src="img/Casa-pnk2.webp" alt="Casa-Pnk" class="house-image" id="House-Five"></div>
                        <hr>
                        <p class="house-text" id="Text-Five">Casa en <span id="Comuna-Five">Comuna</span>, <span id="Region-Five">Región</span></p>
                        <p class="house-price" id="Price-Five">En: $<span id="Price-Value-Five">0</span></p>
                        <button id="Button-Five">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-six">
                    <a href="/House">
                        <div src="img/Casa-pnk3.webp" alt="Casa-Pnk" class="house-image" id="House-Six"></div>
                        <hr>
                        <p class="house-text" id="Text-Six">Casa en <span id="Comuna-Six">Comuna</span>, <span id="Region-Six">Región</span></p>
                        <p class="house-price" id="Price-Six">En: $<span id="Price-Value-Six">0</span></p>
                        <button id="Button-Six">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-seven">
                    <a href="/House">
                        <div src="img/Casa-pnk1.webp" alt="Casa-Pnk" class="house-image" id="House-Seven"></div>
                        <hr>
                        <p class="house-text" id="Text-Seven">Casa en <span id="Comuna-Seven">Comuna</span>, <span id="Region-Seven">Región</span></p>
                        <p class="house-price" id="Price-Seven">En: $<span id="Price-Value-Seven">0</span></p>
                        <button id="Button-Seven">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-eight">
                    <a href="/House">
                        <div src="img/Casa-pnk2.webp" alt="Casa-Pnk" class="house-image" id="House-Eight"></div>
                        <hr>
                        <p class="house-text" id="Text-Eight">Casa en <span id="Comuna-Eight">Comuna</span>, <span id="Region-Eight">Región</span></p>
                        <p class="house-price" id="Price-Eight">En: $<span id="Price-Value-Eight">0</span></p>
                        <button id="Button-Eight">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-nine">
                    <a href="/House">
                        <div src="img/Casa-pnk3.webp" alt="Casa-Pnk" class="house-image" id="House-Nine"></div>
                        <hr>
                        <p class="house-text" id="Text-Nine">Casa en <span id="Comuna-Nine">Comuna</span>, <span id="Region-Nine">Región</span></p>
                        <p class="house-price" id="Price-Nine">En: $<span id="Price-Value-Nine">0</span></p>
                        <button id="Button-Nine">Ver detalles</button>

                    </a>
                </div>
                <div class="house-info" id="house-ten">
                    <a href="/House">
                        <div src="img/Casa-pnk1.webp" alt="Casa-Pnk" class="house-image" id="House-Ten"></div>
                        <hr>
                        <p class="house-text" id="Text-Ten">Casa en <span id="Comuna-Ten">Comuna</span>, <span id="Region-Ten">Región</span></p>
                        <p class="house-price" id="Price-Ten">En: $<span id="Price-Value-Ten">0</span></p>
                        <button id="Button-Ten">Ver detalles</button>

                    </a>
                </div>
                <div class="house-info" id="house-eleven">
                    <a href="/House">
                        <div src="img/Casa-pnk2.webp" alt="Casa-Pnk" class="house-image" id="House-Eleven"></div>
                        <hr>
                        <p class="house-text" id="Text-Eleven">Casa en <span id="Comuna-Eleven">Comuna</span>, <span id="Region-Eleven">Región</span></p>
                        <p class="house-price" id="Price-Eleven">En: $<span id="Price-Value-Eleven">0</span></p>
                        <button id="Button-Eleven">Ver detalles</button>

                    </a>
                </div>
                <div class="house-info" id="house-twelve">
                    <a href="/House">
                        <div src="img/Casa-pnk3.webp" alt="Casa-Pnk" class="house-image" id="House-Twelve"></div>
                        <hr>
                        <p class="house-text" id="Text-Twelve">Casa en <span id="Comuna-Twelve">Comuna</span>, <span id="Region-Twelve">Región</span></p>
                        <p class="house-price" id="Price-Twelve">En: $<span id="Price-Value-Twelve">0</span></p>
                        <button id="Button-Twelve">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-thirteen">
                    <a href="/House">
                        <div src="img/Casa-pnk1.webp" alt="Casa-Pnk" class="house-image" id="House_Thirteen"></div>
                        <hr>
                        <p class="house-text" id="Text-Thirteen">Casa en <span id="Comuna-Thirteen">Comuna</span>, <span id="Region-Thirteen">Región</span></p>
                        <p class="house-price" id="Price-Thirteen">En: $<span id="Price-Value-Thirteen">0</span></p>
                        <button id="Button-Thirteen">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-fourteen">
                    <a href="/House">
                        <div src="img/Casa-pnk2.webp" alt="Casa-Pnk" class="house-image" id="House-Fourteen"></div>
                        <hr>
                        <p class="house-text" id="Text-Fourteen">Casa en <span id="Comuna-Fourteen">Comuna</span>, <span id="Region-Fourteen">Región</span></p>
                        <p class="house-price" id="Price-Fourteen">En: $<span id="Price-Value-Fourteen">0</span></p>
                        <button id="Button-Fourteen">Ver detalles</button>
                    </a>
                </div>
                <div class="house-info" id="house-fifteen">
                    <a href="/House">
                        <div src="img/Casa-pnk3.webp" alt="Casa-Pnk" class="house-image" id="House-Fifteen"></div>
                        <hr>
                        <p class="house-text" id="Text-Fifteen">Casa en <span id="Comuna-Fifteen">Comuna</span>, <span id="Region-Fifteen">Región</span></p>
                        <p class="house-price" id="Price-Fifteen">En: $<span id="Price-Value-Fifteen">0</span></p>
                        <button id="Button-Fifteen">Ver detalles</button>
                    </a>
                </div>
            </div>
        </div>
        </a>
    </div>
</main>
<!-- Footer of the webpage, no change. -->

<?php
require __DIR__ . '/layouts/footer.php';
?>