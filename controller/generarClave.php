<?php
    require_once("../model/conexion.php");
    require_once("../model/generarClaveModel.php");

    $identificacion= $_POST["identificacion"];
    $email= $_POST["email"];


    $objClave = new GenerarClave();
    $result =  $objClave->enviarNuevaClave($identificacion, $email);



?>