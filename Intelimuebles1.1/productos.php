<?php

session_start();


$autenticado = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Categorias</title>
</head>

<body class="pagina-p">
    <?php include 'includes/header.php';?>
    <div>
        <h2 class="titulo">Nuestros Productos</h2>
    </div>
    <div class="contenedor-productos">
        <div class="producto">
            <a href="menu_categoria.php?id=6">
                <img src="/src/img/gallery/5.png" alt="Producto 1" class="imagen-producto">
            </a>
            <h3>Ver escaleras</h3>
            <p class="producto_descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p class="producto_precio">300</p>
        </div>
        <div class="producto">
            <a href="menu_categoria.php?id=7">
                <img src="/src/img/gallery/3.png" alt="Producto 2" class="imagen-producto">
            </a>
            <h3>Ver bases de cama</h3>
            <p class="producto_descripcion">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            <p class="producto_precio">500</p>
        </div>
        <div class="producto">
            <a href="menu_categoria.php?id=3">
                <img src="/src/img/gallery/1.png" alt="Producto 3" class="imagen-producto">
            </a>
            <h3>Ver puertas</h3>
            <p class="producto_descripcion">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p class="producto_precio">1800</p>
        </div>
        <div class="producto">
            <a href="menu_categoria.php?id=4">
                <img src="/src/img/gallery/2.png" alt="Producto 4" class="imagen-producto">
            </a>
            <h3>Ver ventanas</h3>
            <p class="producto_descripcion">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p class="producto_precio">1000</p>
        </div>
        <div class="producto">
            <a href="menu_categoria.php?id=5">
                <img src="/src/img/gallery/4.png" alt="Producto 5" class="imagen-producto">
            </a>
            <h3>Ver armarios</h3>
            <p class="producto_descripcion">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p class="producto_precio">2000</p>
        </div>
        <div class="producto">
            <a href="menu_categoria.php?id=2">
                <img src="/src/img/gallery/6.png" alt="Producto 6" class="imagen-producto">
            </a>
            <h3>Ver mesas</h3>
            <p class="producto_descripcion">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p class="producto_precio">1500</p>
        </div>
        <div class="producto">
            <a href="menu_categoria.php?id=1">
                <img src="/src/img/gallery/7.png" alt="Producto 6" class="imagen-producto">
            </a>
            <h3>Ver sillas</h3>
            <p class="producto_descripcion">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p class="producto_precio">500</p>
        </div>
    </div>

</body>
<footer class="footer">
    <div class="footer-contenido">
        <p class="texto_footer">
            Copyright 2026 | Todos los derechos reservados
        </p>
    </div>
    <img src="src/img/logo.jpeg" alt="Logo_empresa" class="logo_footer">
</footer>
<script src="src/js/app.js"></script>
</html>
