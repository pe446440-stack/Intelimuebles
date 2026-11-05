<?php
// 1. Revisamos si el usuario trae su "pulsera"
session_start();

// 2. Creamos una variable para saber si está logueado (si no existe, es false)
$autenticado = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Compras</title>
</head>
<body>
    <?php include 'includes/header.php';?>
    <div>
        <h2 class="titulo">¡Compras!</h2>
    </div>
</body>
</html>