<?php
$host = 'localhost';
$dbname = 'intelimuebles';
$username = 'admin_muebles';
$password_db = 'panda';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password_db);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {

    die("Error crítico de conexión: " . $e->getMessage());
}