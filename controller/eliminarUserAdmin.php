<?php


require_once("../model/conexion.php");
require_once("../model/consultas.php");
//aterrizamos la variable que enviamos desde el metodo get
$id= $_GET['id'];

$objConsultas = new Consultas();
$result = $objConsultas->eliminarUserAdmin($id);

?>