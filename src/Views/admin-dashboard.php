<?php 
    $username = "Administador";
    $adminmode = ""
    // $username es el usuario del Administrador ingresado
?>

<?php
$pageStyles = '<link rel="stylesheet" href="/css/dashboard-admin.css">';
require __DIR__ . '/layouts/head.php';
?>
<!-- CSS part -->

<?php
require __DIR__ . '/layouts/header.php';
?>
<!-- Main content of the webpage -->
<main>
    <div class="dashboard">
        <div class="tittle">
            <h1>Bienvenido <?php echo $username; ?></h1>
        </div>
        <hr>
        <br>
        <section>
        <button class="modebttm" class="usermode"> &#128100; Usuarios</button>
        <button class="modebttm" class="freemode"> &#127968; Gestor Freelance</button>
        <button class="modebttm" class="gestor"> &#127970; Gestor</button>
        <div class="content">
            <br>
            <h2>Administrar <?php echo $adminmode; ?></h2>

            <div class="filters">
                <input type="text" >
            </div>
        </div>
        </section>
    </div>
</main>
<!-- Footer of the webpage, no change. -->

<?php
require __DIR__ . '/layouts/footer.php';
?>