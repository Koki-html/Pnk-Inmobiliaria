<div id="Filters-Container">

    <h2 id="Filter-Title">
        Encuentra tu hogar ideal
    </h2>

    <hr style="border-color: var(--primary);">

    <form id="Filters-Grid" method="GET" action="/search">

        <select
            class="filter-select"
            name="orden"
            id="Filter-Orden"
        >
            <option value="">Ordenar por</option>
            <option value="precio-asc">Precio: Menor a Mayor</option>
            <option value="precio-desc">Precio: Mayor a Menor</option>
            <option value="recientes">Más Recientes</option>
        </select>

        <select
            class="filter-select"
            name="tipo"
            id="Filter-Type"
        >
            <option value="">Tipo de propiedad</option>
            <option value="casa">Casa</option>
            <option value="departamento">Departamento</option>
            <option value="terreno">Terreno</option>
        </select>

        <select
            class="filter-select"
            name="comuna"
            id="Filter-Location"
        >
            <option value="">Comuna</option>
            <option value="la-serena">La Serena</option>
            <option value="coquimbo">Coquimbo</option>
            <option value="ovalle">Ovalle</option>
        </select>

        <select
            class="filter-select"
            name="habitaciones"
            id="Filter-Rooms"
        >
            <option value="">Habitaciones</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5+</option>
        </select>

        <select
            class="filter-select"
            name="banos"
            id="Filter-Bathrooms"
        >
            <option value="">Baños</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </form>
</div>

