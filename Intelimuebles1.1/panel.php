<?php

session_start();


$autenticado = $_SESSION['login'] ?? false;

if ($autenticado == false || $_SESSION['rol'] !== 'administrador') {
    header('Location: login.php');
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administración</title>
</head>
<body>
    
</body>
</html>