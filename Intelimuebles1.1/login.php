<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = '';
$aviso = '';

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header('Location: index.php');
    exit; 
}

if (isset($_GET['alerta']) && $_GET['alerta'] === 'login') {
        $aviso = "Para ver los detalles o comprar un producto, necesitas iniciar sesión.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    require 'conexion.php'; 

    try {
        $email = trim($_POST['email']);
        $password_ingresada = $_POST['password'];

        $consulta = $conexion->prepare("SELECT IdUsuario, Nombre, Contraseña FROM Usuario WHERE Correo = :email");
        $consulta->bindParam(':email', $email);
        $consulta->execute();
        
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password_ingresada, $usuario['Contraseña'])) {
            
            $consultaAdmin = $conexion->prepare("SELECT IdAdministrador, ClaveDeAcceso FROM Administrador WHERE IdUsuario = :id");
            $consultaAdmin->bindParam(':id', $usuario['IdUsuario']);
            $consultaAdmin->execute();
            
            $esAdmin = $consultaAdmin->fetch(PDO::FETCH_ASSOC);
            
            if ($esAdmin) {

                $_SESSION['temp_id_usuario'] = $usuario['IdUsuario'];
                $_SESSION['temp_id_admin'] = $esAdmin['IdAdministrador'];
                $_SESSION['temp_clave_hash'] = $esAdmin['ClaveDeAcceso'];
                
                header("Location: validar_admin.php"); 
            } else {

                $_SESSION['IdUsuario'] = $usuario['IdUsuario'];
                $_SESSION['nombreUsuario'] = $usuario['Nombre'];
                $_SESSION['rol'] = 'cliente';
                $_SESSION['login'] = true;
                
                header("Location: compras.php"); 
            }
            exit;
            
        } else {
            $error = "El correo o la contraseña son incorrectos. Usuario: " . ($usuario ? 'encontrado' : 'no encontrado') . ", Password verify: " . (password_verify($password_ingresada, $usuario['Contraseña'] ?? '') ? 'true' : 'false');
        }

    } catch(PDOException $e) {
        $error = "Error en la consulta: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Iniciar sesión</title>
</head>

<body class="login">
    <div class="panel">
        <h2>Iniciar sesión</h2>
        <div class="panel-login">
            
            <?php if($error): ?>
                <div style="background-color: #ffcccc; color: #cc0000; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; text-align: center; font-weight: bold;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if($aviso): ?>
                <div style="background-color: #cce5ff; color: #004085; border: 1px solid #b8daff; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; text-align: center; font-weight: bold;">
                    <?php echo $aviso; ?>
                </div>
            <?php endif; ?>
            

            <form method="POST" action="login.php" class="panel-login">
                <div class="campo">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="campo">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="area-boton">
                    <button type="submit" class="boton-login">Iniciar sesión</button>
                </div>
                <div class="registrar-area">
                    <p class="registrar">¿No tienes una cuenta? <a href="crear.php" class=''>Regístrate aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>