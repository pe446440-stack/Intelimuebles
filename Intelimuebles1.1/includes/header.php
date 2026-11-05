<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$autenticado = $_SESSION['login'] ?? false;
?>

<header class="header">
        <div class="contenedor contenido-header">
            <h1><a href="index.php" class="enlace-header">Intelimuebles</a></h1>
            <nav class="navegacion-principal">
                <a href="productos.php">Productos</a>
                <a href="#whatsapp">Personalizados</a>
                <?php if($autenticado): ?>
                    <a href="carrito.php">Mi carrito</a>
                    <a href="perfil.php">Perfil <?php echo $_SESSION['nombre']; ?></a>
                    <a href="cerrar_sesion.php" class="btn-rojo">Cerrar sesión</a>
                <?php else: ?>
                    <a href="crear.php">Crear cuenta</a>
                    <a href="login.php">Iniciar sesión</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>