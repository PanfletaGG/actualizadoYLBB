<?php




session_start();
if (!isset($_SESSION['AUTENTICADO'])) {
    echo '<script> alert("Por favor inicie sesión")</script>';
    echo '<script> location.href="../../theme/login.php"</script>';
}

if ($_SESSION['rol'] != "Cliente") {
    echo '<script> alert("No posee permisos para acceder a esta interfaz")</script>';
    
    // Verificamos si existe la información de la página anterior
    if (isset($_SERVER['HTTP_REFERER'])) {
        echo '<script> location.href="' . $_SERVER['HTTP_REFERER'] . '"</script>';
    } else {
        // Si no hay información de página anterior, redirigimos a una página por defecto
        echo '<script> location.href="../../theme/login.php"</script>';
    }
}




?> 