<?php

require_once("../model/conexion.php");
require_once("../model/consultas.php");


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$clave = $_POST["clave"];
$con_clave = $_POST["con_clave"];
$rol = $_POST["rol"];


if ($clave == $con_clave) {
    if (strlen($email)>0 && strlen($clave)>0 && strlen($con_clave)>0) {
        $claveinc = md5($clave);
        $objConsulta = new consultas();
        $result = $objConsulta->insertarUsuarios($nombre,$apellido,$email,$telefono, $claveinc, $rol);
    }
}else{
    echo '<script> alert("Los campos estan incompletos o la controseña no coincide") </script>';
    echo '<script>location.href="../theme/register.php" </script>';
}

?>


