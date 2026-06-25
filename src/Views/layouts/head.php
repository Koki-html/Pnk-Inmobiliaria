<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="PNK Inmobiliaria - Plataforma de gestión y publicación de propiedades."
    >

    <meta
        name="author"
        content="PNK Inmobiliaria"
    >

    <title>
        <?= $pageTitle ?? 'PNK Inmobiliaria' ?>
    </title>

    <!-- Favicon -->
    <link
        rel="shortcut icon"
        href="/img/icon/Pnk.ico"
        type="image/x-icon"
    >

    <!-- Estilos Globales -->
    <link rel="stylesheet" href="/css/ColorPalette.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/main.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Estilos específicos de la página -->

    <?php if (isset($pageStyle)): ?>
        <link rel="stylesheet" href="/css/<?= htmlspecialchars($pageStyle) ?>">
    <?php endif; ?>


</head>

<body>