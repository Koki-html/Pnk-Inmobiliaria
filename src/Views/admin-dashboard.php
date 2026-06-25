
<?php
$pageStyle = 'dashboard-admin.css';
require __DIR__ . '/layouts/head.php';
?>
<!-- CSS part -->

<?php
require __DIR__ . '/layouts/header.php';
?>
<!-- Main content of the webpage -->
<main>

    
    <!-- USUARIOS -->

    <section class="table-section">

        <div class="section-header">

    <h2>
        Gestión de Usuarios
    </h2>

    <div class="filters-container">

        <input
            type="text"
            placeholder="Buscar usuario..."
            class="search-input"
            id="UserSearch"
        >

        <select
            id="RoleFilter"
            class="role-filter"
        >

            <option value="">
                Todos los Roles
            </option>

            <option value="Administrador">
                Administrador
            </option>

            <option value="Propietario">
                Propietario
            </option>

            <option value="Gestor Free">
                Gestor Free
            </option>

        </select>

        <select
            id="StatusFilter"
            class="status-filter"
        >

            <option value="">
                Todos los Estados
            </option>

            <option value="Activo">
                Activo
            </option>

            <option value="Pendiente">
                Pendiente
            </option>

        </select>

    </div>

</div>

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <?php if (!empty($usuarios)): ?>

                    <?php foreach ($usuarios as $usuario): ?>

                        <tr
                            data-role="<?=
                                match ((int)$usuario['id_rol']) {

                                    1 => 'Administrador',
                                    2 => 'Propietario',
                                    3 => 'Gestor Free',

                                    default => 'Desconocido'
                                }
                            ?>"
                            data-status="<?=
                                $usuario['estado']
                                ?? 'Pendiente'
                            ?>"
                        >

                            <td>
                                <?= $usuario['id_usuario'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($usuario['nombre_completo']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($usuario['correo']) ?>
                            </td>

                            <td>

                                <?=
                                    match (
                                        (int) $usuario['id_rol']
                                    ) {

                                        1 => 'Administrador',

                                        2 => 'Propietario',

                                        3 => 'Gestor Free',

                                        default => 'Desconocido'
                                    };
                                    ?>
                            </td>

                            <td>

                                <?php if (
                                    ($usuario['estado'] ?? '') === 'Activo'
                                ): ?>

                                    <span class="status-active">
                                        Activo
                                    </span>

                                <?php else: ?>

                                    <span class="status-pending">
                                        <?= htmlspecialchars(
                                            $usuario['estado'] ?? 'Pendiente'
                                        ) ?>
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a
                                    href="/admin/user/view?id=<?= $usuario['id_usuario'] ?>"
                                    class="table-action view"
                                >
                                    👁️
                                </a>

                                <a
                                    href="/admin/user/edit?id=<?= $usuario['id_usuario'] ?>"
                                    class="table-action edit"
                                >
                                    ✏️
                                </a>

                                <a
                                    href="/admin/user/delete?id=<?= $usuario['id_usuario'] ?>"
                                    class="table-action reject"
                                >
                                    🗑️
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="6">
                            No hay usuarios registrados.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </section>

    <!-- PROPIEDADES -->

    <section class="table-section">

        <div class="section-header">

            <h2>
                Gestión de Propiedades
            </h2>

            <a
                href="/owner/property/create"
                class="table-action approve"
            >
                ➕ Nueva Propiedad
            </a>

        </div>

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Tipo</th>
                    <th>Comuna</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <?php if (!empty($propiedades)): ?>

                    <?php foreach ($propiedades as $propiedad): ?>

                        <tr>

                            <td>
                                <?= $propiedad['id_propiedad'] ?>
                            </td>

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
                                <?= htmlspecialchars(
                                    $propiedad['comuna'] ?? 'Sin comuna'
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

                                <?php if (
                                    !empty(
                                        $propiedad['activa']
                                    )
                                ): ?>

                                    <span class="status-active">
                                        Activa
                                    </span>

                                <?php else: ?>

                                    <span class="status-pending">
                                        Inactiva
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <a
                                    href="/house/<?= $propiedad['id_propiedad'] ?>"
                                    class="table-action view"
                                >
                                    👁️
                                </a>

                                <a
                                    href="/owner/property/edit/<?= $propiedad['id_propiedad'] ?>"
                                    class="table-action edit"
                                >
                                    ✏️
                                </a>

                                <a
                                    href="/owner/property/disable/<?= $propiedad['id_propiedad'] ?>"
                                    class="table-action approve"
                                >
                                    🔒
                                </a>

                                <a
                                    href="/owner/property/delete/<?= $propiedad['id_propiedad'] ?>"
                                    class="table-action reject"
                                >
                                    🗑️
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="7">
                            No hay propiedades registradas.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </section>

</main>
<!-- Footer of the webpage, no change. -->
<script>

document.addEventListener(
    'DOMContentLoaded',
    () => {

        const search =
            document.getElementById(
                'UserSearch'
            );

        const roleFilter =
            document.getElementById(
                'RoleFilter'
            );

        const statusFilter =
            document.getElementById(
                'StatusFilter'
            );

        function filterUsers(){

            const query =
                search.value
                    .toLowerCase();

            const role =
                roleFilter.value;

            const status =
                statusFilter.value;

            document
                .querySelectorAll(
                    '.table-section:first-of-type tbody tr'
                )
                .forEach(row => {

                    const text =
                        row.innerText
                            .toLowerCase();

                    const rowRole =
                        row.dataset.role;

                    const rowStatus =
                        row.dataset.status;

                    const matchesSearch =
                        text.includes(
                            query
                        );

                    const matchesRole =
                        !role ||
                        rowRole === role;

                    const matchesStatus =
                        !status ||
                        rowStatus === status;

                    row.style.display =
                        (
                            matchesSearch &&
                            matchesRole &&
                            matchesStatus
                        )
                        ? ''
                        : 'none';
                });
        }

        search?.addEventListener(
            'input',
            filterUsers
        );

        roleFilter?.addEventListener(
            'change',
            filterUsers
        );

        statusFilter?.addEventListener(
            'change',
            filterUsers
        );
    }
);

</script>
<?php
require __DIR__ . '/layouts/footer.php';
?>