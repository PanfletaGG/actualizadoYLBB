<!-- este archivo resive todas las consultas del modelo para mostrar informacion al administrador -->
<!-- esta funcion es la que se llama en la vista -->


<?php

require_once("../model/conexion.php");
require_once("../model/consultas.php");

$consultas = new consultas();
$msj = null;
$nombre= $_POST['nombre'];
$apellido= $_POST['apellidos'];
$email= $_POST['email'];
$telefono= $_POST['telefono'];
$id_producto= $_POST['id_producto'];

if (strlen($nombre) > 0) {
    $msj = $consultas ->modificarUsuarioAdmin("Nombres", $nombre, $id_producto);
    $msj = $consultas ->modificarUsuarioAdmin("Apellidos", $apellido, $id_producto);
    $msj = $consultas ->modificarUsuarioAdmin("Email", $email, $id_producto);
    $msj = $consultas ->modificarUsuarioAdmin("telefono", $telefono, $id_producto);
    echo $msj;
}else{
    echo "Error al modificar";
}
?>