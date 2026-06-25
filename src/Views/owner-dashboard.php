<?php 
    $username = "Usuario"
?>

<?php
$pageStyles = '<link rel="stylesheet" href="/css/dashboard-owner.css">';
require __DIR__ . '/layouts/head.php';
?>
<!-- CSS part -->

<?php
require __DIR__ . '/layouts/header.php';
?>
<!-- Main content of the webpage -->
<main>
    <div class="dashboard-container">
        <h2>Bienvenido <?=  $username ?></h1>
    </div>
</main>
<!-- Footer of the webpage, no change. -->

<?php
require __DIR__ . '/layouts/footer.php';
?>