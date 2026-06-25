<?php

$username =
    $_SESSION['nombre']
    ?? 'Usuario';

$propiedades =
    $propiedades ?? [];

$totalPropiedades =
    count($propiedades);

$propiedadesActivas =
    count(
        array_filter(
            $propiedades,
            function ($p) {
                return !empty(
                    $p['activa']
                );
            }
        )
    );

$pageTitle =
    'Panel de Propietario | PNK Inmobiliaria';

$pageStyle =
    'dashboard-owner.css';

require __DIR__ . '/layouts/head.php';
require __DIR__ . '/layouts/header.php';

$totalPropiedades =
    count($propiedades);

$propiedadesActivas =
    count(
        array_filter(
            $propiedades,
            fn($p) => $p['activa']
        )
    );

?>

<main>

    <div class="dashboard">

        <div class="dashboard-header">

            <h1>
                Bienvenido,
                <?= htmlspecialchars($username) ?>
            </h1>

            <p>
                Administra tus propiedades y revisa las solicitudes recibidas.
            </p>

        </div>

        <section class="stats">

            <div class="card">

                <h2>
                    Mis Propiedades
                </h2>

                <span>
                    <?= $totalPropiedades ?>
                </span>

            </div>

            <div class="card">

                <h2>
                    Activas
                </h2>

                <span>
                    <?= $propiedadesActivas ?>
                </span>

            </div>

            <div class="card">

                <h2>
                    Solicitudes
                </h2>

                <span>
                    0
                </span>

            </div>

            <div class="card">

                <h2>
                    Visitas Pendientes
                </h2>

                <span>
                    0
                </span>

            </div>

        </section>

        <section class="quick-actions">

            <a
                href="/owner/property/create"
                class="action-btn"
            >
                🏠 Publicar Propiedad
            </a>

            <a
                href="/owner/properties"
                class="action-btn"
            >
                📋 Mis Propiedades
            </a>

            <a
                href="/visits"
                class="action-btn"
            >
                📅 Solicitudes
            </a>

            <a
                href="/profile"
                class="action-btn"
            >
                👤 Mi Perfil
            </a>

        </section>

        <section class="table-section">

            <div class="section-header">

                <h2>
                    Mis Propiedades
                </h2>

                <input
                    type="text"
                    placeholder="Buscar propiedad..."
                    class="search-input"
                >

            </div>

            <table>

                <thead>

                    <tr>

                        <th>
                            Código
                        </th>

                        <th>
                            Tipo
                        </th>

                        <th>
                            Precio
                        </th>

                        <th>
                            Estado
                        </th>

                        <th>
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php if (empty($propiedades)): ?>

                        <tr>

                            <td colspan="5">
                                No tienes propiedades registradas.
                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($propiedades as $propiedad): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars(
                                        $propiedad['codigo_publicacion']
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $propiedad['tipo_propiedad']
                                    ) ?>
                                </td>

                                <td>

                                    $

                                    <?= number_format(
                                        $propiedad['precio_pesos'],
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </td>

                                <td>

                                    <?php if ($propiedad['activa']): ?>

                                        Activa

                                    <?php else: ?>

                                        Inactiva

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <a
                                        href="/house?id=<?= $propiedad['id_propiedad'] ?>"
                                    >
                                        👁️
                                    </a>

                                    <a
                                        href="/owner/property/edit?id=<?= $propiedad['id_propiedad'] ?>"
                                    >
                                        ✏️
                                    </a>

                                    <a
                                        href="/owner/property/delete?id=<?= $propiedad['id_propiedad'] ?>"
                                        onclick="return confirm('¿Eliminar propiedad?');"
                                    >
                                        🗑️
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </section>

        <section class="table-section">

            <div class="section-header">

                <h2>
                    Solicitudes de Visita
                </h2>

            </div>

            <table>

                <thead>

                    <tr>

                        <th>
                            Propiedad
                        </th>

                        <th>
                            Visitante
                        </th>

                        <th>
                            Correo
                        </th>

                        <th>
                            Fecha
                        </th>

                        <th>
                            Estado
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td colspan="5">
                            Próximamente conectado a solicitudes_visita.
                        </td>

                    </tr>

                </tbody>

            </table>

        </section>

    </div>

</main>

<?php require __DIR__ . '/layouts/footer.php'; ?>