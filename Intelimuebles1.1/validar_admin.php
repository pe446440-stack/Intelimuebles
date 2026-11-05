<?php

session_start();

if (!isset($_SESSION['temp_id_admin'])) {
    header("Location: login.php");
    exit;
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $clave_ingresada = $_POST['claveAcceso'];
    $clave_hash_guardada = $_SESSION['temp_clave_hash'];

    if (password_verify($clave_ingresada, $clave_hash_guardada)) {
        
        $_SESSION['IdUsuario'] = $_SESSION['temp_id_usuario'];
        $_SESSION['rol'] = 'administrador';
        $_SESSION['login'] = true;
        
        unset($_SESSION['temp_id_usuario']);
        unset($_SESSION['temp_id_admin']);
        unset($_SESSION['temp_clave_hash']);
        
        header("Location: panel.php"); 
        exit;
        
    } else {
        $error = "La clave de acceso es incorrecta.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Validar Administrador</title>
</head>

<body class="login">
    <div class="panel">
        <h2>Validar Acceso</h2>
        <div class="panel-login">
            
            <?php if($error): ?>
                <div style="background-color: #ffcccc; color: #cc0000; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; text-align: center; font-weight: bold;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="validar_admin.php" class="panel-login">
                <div class="campo">
                    <label for="claveAcceso">Clave de acceso</label>
                    <input type="password" id="claveAcceso" name="claveAcceso" required>
                </div>
                <div class="area-boton">
                    <button type="submit" class="boton-login">Validar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>