<?php

// Enlazamos las dependencias necesarias

    require_once("../model/conexion.php");
    require_once("../model/consultas.php");

// Aterrizamos en variables los datos ingresados por el usuario, los cuales viajan atravez del metodo "POST" y los names con los cambios

    $identificacion=$_POST["identificacion"];
    $tipo_de_dato=$_POST["tipo_de_dato"];
    $nombres=$_POST["nombres"];
    $apellidos=$_POST["apellidos"];
    $telefono=$_POST["telefono"];
    $email=$_POST["email"];
    $rol = $_POST["rol"];
    $estado= $_POST["estado"];
    $clave = $_POST["identificacion"];

// Verificamos que las claves coincidan






    
if (strlen($identificacion)>0 && strlen($tipo_de_dato)>0 && strlen($nombres)>0 && strlen($apellidos)>0 && strlen($email)>0 && strlen($telefono)>0 && strlen($clave)>0 && strlen($rol)>0 && strlen($estado)>0 ){

        // incriptmos la clave
        $claveMd = md5($clave);

        // creamos el objeto apartir de la clase
        // para enviar los argumentos a la función en el modelo (archivo conusltas)
        // creamos una varible para definir la ruta donde quedara alojada la imagen
        $foto = "../Uploads/usuarios/" .$_FILES['foto']['name'];
        // Movemos el archivo a la carpeta uploads
        $mover=move_uploaded_file($_FILES['foto'] ['tmp_name'], $foto);

        $foto2 = "../Uploads/usuarios/" .$_FILES['foto2']['name'];
        // Movemos el archivo a la carpeta uploads
        $mover2=move_uploaded_file($_FILES['foto2'] ['tmp_name'], $foto2);

        $foto3 = "../Uploads/usuarios/" .$_FILES['foto3']['name'];
        // Movemos el archivo a la carpeta uploads
        $mover3=move_uploaded_file($_FILES['foto3'] ['tmp_name'], $foto3);
        
        $objConsultas = new Consultas();
        $result = $objConsultas -> insertarUserAdmin($identificacion, $tipo_de_dato, $nombres, $apellidos, $email, $telefono, $claveMd ,$rol, $estado, $foto, $foto2, $foto3);





    }
    else{
        echo '<script> alert("Por favor complete todos los campos") </script>';
        echo "<script> location.href='../views/administrador/registrar_admin.php'</script>";
        
    }



?>