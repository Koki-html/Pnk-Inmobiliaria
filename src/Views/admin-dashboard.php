<?php 
    $username = "Administrador";
    $adminmode = "Usuarios";
?>

<?php
$pageStyles = '<link rel="stylesheet" href="/css/dashboard-admin.css">';
require __DIR__ . '/layouts/head.php';
?>

<?php
require __DIR__ . '/layouts/header.php';
?>

<main>
    <div class="dashboard">

    <div class="tittle">
        <h1>Bienvenido, <?php echo $username; ?></h1>
        <p>Panel de administración del sistema PNK Inmobiliaria</p>
    </div>

    <hr>

    <section>

        <div class="modes">

            <button class="modebttm usermode">
                &#128100; Usuarios
            </button>

            <button class="modebttm freemode">
                &#127968; Propietarios
            </button>

            <button class="modebttm gestor">
                &#127970; Gestores
            </button>

        </div>

        <div class="content">

            <h2>Administrar <?php echo $adminmode; ?></h2>

            <div class="filters">

                <input
                    type="text"
                    placeholder="Buscar..."
                >

                <button>
                    🔍 Buscar
                </button>

                <button>
                    ➕ Nuevo Registro
                </button>

            </div>

            <table class="dashboard-table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>juan@email.com</td>
                        <td>Activo</td>
                        <td>
                            <button>✏️</button>
                            <button>👁️</button>
                            <button>🗑️</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>María González</td>
                        <td>maria@email.com</td>
                        <td>Pendiente</td>
                        <td>
                            <button>✏️</button>
                            <button>👁️</button>
                            <button>🗑️</button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </section>

</div>

</main>

<?php
require __DIR__ . '/layouts/footer.php';
?>
