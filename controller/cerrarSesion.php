<?php

require_once ("../model/conexion.php");
require_once ("../model/consultas.php");

$objSesion = new ValidarSesion();
$result = $objSesion->cerrarSesion();

?>