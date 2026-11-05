<?php

require 'conexion.php';

$error = '';
$mensaje = '';


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST['Nombre']); 
    $apellidoPaterno = trim($_POST['ApellidoPaterno']);
    $apellidoMaterno = trim($_POST['ApellidoMaterno']);
    $correo = trim($_POST['Correo']); 
    $password = trim($_POST['Contraseña']);
    $estado = trim($_POST['Estado']);
    $municipio = trim($_POST['Municipio']); 
    $calle = trim($_POST['Calle']);
    $numeroCasa = trim($_POST['NumeroCasa']);
    $telefono = trim($_POST['Telefono']);
    $colonia = trim($_POST['Colonia']);

    if (empty($nombre) || empty($correo) || empty($password) || empty($estado) || empty($municipio) || empty($calle) || empty($telefono) || empty($apellidoPaterno) || empty($apellidoMaterno) || empty($numeroCasa) || empty($colonia)) {
        $error = "Completa todos los campos.";
    } else {
        try {

            $consulta_existencia = $conexion->prepare("SELECT IdUsuario FROM Usuario WHERE Correo = :correo");
            $consulta_existencia->bindParam(':correo', $correo);
            $consulta_existencia->execute();

            if ($consulta_existencia->fetchColumn()) {
                $error = "Este correo electrónico ya está registrado.";
            } else {

                $password_hashed = password_hash($password, PASSWORD_DEFAULT);

                $insertar = $conexion->prepare("INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, Correo, Contraseña, Estado, Municipio, Calle, NumeroCasa, Telefono, Colonia) VALUES (:nombre, :apellidoPaterno, :apellidoMaterno, :correo, :password, :estado, :municipio, :calle, :numeroCasa, :telefono, :colonia)");
                $insertar->bindParam(':nombre', $nombre);
                $insertar->bindParam(':apellidoPaterno', $apellidoPaterno);
                $insertar->bindParam(':apellidoMaterno', $apellidoMaterno);
                $insertar->bindParam(':correo', $correo);
                $insertar->bindParam(':password', $password_hashed);
                $insertar->bindParam(':estado', $estado);
                $insertar->bindParam(':municipio', $municipio);
                $insertar->bindParam(':calle', $calle);
                $insertar->bindParam(':numeroCasa', $numeroCasa);
                $insertar->bindParam(':telefono', $telefono);
                $insertar->bindParam(':colonia', $colonia);

                if ($insertar->execute()) {
                    $para = $correo; 
                    $tema = "¡Bienvenido a Intelimuebles!";
                    $mensaje = "Hola " . $nombre . ".\n\nGracias por crear tu cuenta en Intelimuebles. Ya puedes disfrutar de nuestro catálogo completo. ;)\n\nNo respondas a este correo.";
                    $cabeceras = "From: contacto@intelimuebles.com";

                    @mail($para, $tema, $mensaje, $cabeceras);

                    $mensaje = "¡Registro exitoso! Ya puedes iniciar sesión.";
                    header("refresh:3;url=login.php"); 
                } else {
                    $error = "Ocurrió un error al crear la cuenta.";
                }
            }
        } catch(PDOException $e) {
            $error = "Error de base de datos: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Crear cuenta</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div>
        <h2 class="titulo">Crear cuenta</h2>
    </div>
    <section class="contenedor-crear">
    <div>
        <?php if($error): ?>
            <div class="alerta_error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if($mensaje): ?>
            <div class="alerta_exito">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="panel-crear">
        <form method="POST" action="crear.php" class="formulario-crear">
            
            <div class="campo">
                <label for="nombre">Nombre/nombres</label>
                <input type="text" id="nombre" name="Nombre" placeholder="Tu nombre" required>
            </div>

            <div class="campo">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" id="apellidoPaterno" name="ApellidoPaterno" placeholder="Tu apellido paterno" required>
            </div>

            <div class="campo">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" id="apellidoMaterno" name="ApellidoMaterno" placeholder="Tu apellido materno" required>
            </div>

            <div class="campo">
                <label for="correo">Correo electrónico</label> <input type="email" id="correo" name="Correo" placeholder="Tu correo electrónico" required>
            </div>

            <div class="campo">
                <label for="estado">Estado</label>
                <input type="text" id="estado" name="Estado" placeholder="Tu estado" required>
            </div>

            <div class="campo">
                <label for="municipio">Municipio</label>
                <input type="text" id="municipio" name="Municipio" placeholder="Tu municipio" required>
            </div>

            <div class="campo">
                <label for="calle">Calle</label>
                <input type="text" id="calle" name="Calle" placeholder="Tu calle" required>
            </div>

            <div class="campo">
                <label for="numeroCasa">Numero exterior</label>
                <input type="text" id="numeroCasa" name="NumeroCasa" placeholder="Numero exterior de tu casa" required>
            </div>

            <div class="campo">
                <label for="celular">Numero celular</label>
                <input type="text" id="celular" name="Telefono" placeholder="Tu numero de celular" required>
            </div>

             <div class="colonia">
                 <label for="colonia">Colonia</label>
                 <input type="text" id="colonia" name="Colonia" placeholder="Tu colonia" required>
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="Contraseña" required>
            </div>

            <div class="area-boton">
                <button type="submit" class="boton-crear">Registrarme</button>
            </div>
            
            <div class="registrar-area">
                <p class="crear-registrar">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
            </div>

        </form>
    </div>
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
</html>