<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();

}

$autenticado = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Intelimuebles</title>
</head>

<body class="pagina-p">
    <?php include 'includes/header.php'; ?>
    <div class="imagen">
        <div>
            <div class="contenedor contenido-imagen">
                <h2>Intelimuebles</h2>
                <p>Construyendo tus comodidades</p>
            </div>
        </div>
    </div>
    <section class="diseño">
        <div class="img-info">
            <img src="/src/img/silla.png" alt="informacion" />
        </div>

        <div class="diseño-contenido">
            <h2>Diseñando tu ambiente</h2>
            <p class="subtitulo">Calidad y diseño</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam aut assumenda ullam facilis sapiente
                dolore ipsam optio cumque laboriosam animi. Doloribus esse libero, quos facilis voluptatem omnis
                eligendi magni provident?</p>
        </div>
    </section>
    <section class="nosotros">
        <div class="nosotros-contenido">
            <h2>Sobre nosotros</h2>
            <p class="subtitulo">Nuestra historia</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam aut assumenda ullam facilis sapiente
                dolore ipsam optio cumque laboriosam animi. Doloribus esse libero, quos facilis voluptatem omnis
                eligendi magni provident?</p>
        </div>
        <div class="img-info">
            <img src="/src/img/silla.png" alt="informacion" />
        </div>
    </section>
    <section class="galeria">
        <h2>Galeria</h2>
        <div class="galeria_imagenes"></div>
    </section>

</body>
<footer class="footer">
    <div class="footer-contenido">
        <p class="texto_footer">
            Copyright 2026 | Todos los derechos reservados
        </p>
    </div>
    <img src="src/img/logo.jpeg" alt="Logo_empresa" class="logo_footer">
</footer>
<script src="build/js/app.js"></script>
</html>