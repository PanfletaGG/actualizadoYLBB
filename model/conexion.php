<?php

class conexion{
    public function get_conexion(){
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "ylbb";
        $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
        return $conexion;
    }
}

?>