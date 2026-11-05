<?php
// 1. Reanudamos la sesión actual
session_start();

// 2. Vaciamos el arreglo de la sesión (borramos los datos)
$_SESSION = [];

// 3. Destruimos la sesión en el servidor
session_destroy();

// 4. Lo redirigimos a la página principal
header('Location: index.php');
exit;