<?php
session_start();
require 'conexion.php';

$autenticado = $_SESSION['login'] ?? false;
$idCategoria = $_GET['id'] ?? null;

if($idCategoria){
    try {

        $sql = "SELECT p.*, c.NombreCategoria AS NombreC FROM Producto p INNER JOIN Categoria c ON p.IdCategoria = c.IdCategoria WHERE p.IdCategoria = :id";
        $consulta = $conexion -> prepare($sql);
        $consulta -> bindParam(':id', $idCategoria, PDO::PARAM_INT);
        $consulta -> execute();

        $productos = $consulta ->fetchAll(PDO::FETCH_ASSOC);
        $tituloPagina = $productos[0]['NombreC'] ?? "Categoria";
    } catch(PDOExeception $e){
        echo "Error en la consulta: " . $e->getMessage();
    }
}else{
    $productos = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Productos</title>
</head>
<body>
    <?php include 'includes/header.php';?>
    <main class="contenedor">
        <h1 class="titulo">Explora nuestra sección de: <?php echo $tituloPagina; ?></h1>
        <div class="grid-productos">
            <?php if(!empty($productos)): ?>
                <?php foreach($productos as $producto): ?>
                    <div class="producto">
                        <img src="src/img/gallery/<?php echo $producto['Imagen']; ?>" alt="<?php echo $producto['Nombre']; ?>">
                    
                        <h3><?php echo $producto['Nombre']; ?></h3>
                    
                        <p class="precio">$<?php echo number_format($producto['Precio'], 2); ?> MXN</p>
                    
                        <a href="login.php?alerta=login" class="btn-comprar">Comprar ahora</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aún no tenemos muebles en esta sección, ¡vuelve pronto!</p>
            <?php endif; ?>
        </div>
    </main>
</body>