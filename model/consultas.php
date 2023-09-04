<?php

class consultas{
    public function insertarUsuarios($nombre,$apellido,$email,$telefono, $claveinc, $rol){
        $modelo = new conexion();
        $conexion = $modelo -> get_conexion();
        $consultas = "SELECT * FROM usuario WHERE email=:email";

        $result = $conexion->prepare($consultas);

        $result->bindParam(":email", $email); // Corrección aquí

        $result->execute();

        $f = $result->fetch();

        if($f){
            echo '<script> alert("Los datos del usuario ya se encuentra en el sistema") </script>';
            echo '<script>location.href="../theme/register.php" </script>';
        }else{
            $insertar = "INSERT INTO usuario (Nombre, Apellido, Email, Telefono, Clave, Rol) VALUES(:nombre, :apellido, :email, :telefono, :clave, :rol)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":apellido", $apellido);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":clave", $claveinc);
            $result->bindParam(":rol", $rol);

            $result->execute();
            echo '<script> alert("Usuario registrado con éxito") </script>';
            echo '<script>location.href="../theme/productos.php" </script>';
        }
    }
    public function insertarUsuariodesdeAdmin($nombre,$apellido,$email,$telefono, $claveinc, $rol, $foto){
        $modelo = new conexion();
        $conexion = $modelo -> get_conexion();
        $consultas = "SELECT * FROM usuario WHERE email=:email";

        $result = $conexion->prepare($consultas);

        $result->bindParam(":email", $email); // Corrección aquí

        $result->execute();

        $f = $result->fetch();

        if($f){
            echo '<script> alert("Los datos del usuario ya se encuentra en el sistema") </script>';
            echo '<script>location.href="../theme/register.php" </script>';
        }else{
            $insertar = "INSERT INTO usuario (Nombre, Apellido, Email, Telefono, Clave, Rol, foto) VALUES(:nombre, :apellido, :email, :telefono, :clave, :rol, :foto)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":nombre", $nombre);
            $result->bindParam(":apellido", $apellido);
            $result->bindParam(":email", $email);
            $result->bindParam(":telefono", $telefono);
            $result->bindParam(":clave", $claveinc);
            $result->bindParam(":rol", $rol);
            $result->bindParam(":foto", $foto);

            $result->execute();
            echo '<script> alert("Usuario registrado con éxito") </script>';
            echo '<script>location.href="../views/administrador/registrar_Usuario.php" </script>';
        }
    }
    public function insertarUserAdmin($identificacion, $tipo_de_dato, $nombres, $apellidos, $email, $telefono, $claveMd ,$rol, $estado, $foto, $foto2, $foto3){


        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();


        $consultar = "SELECT * FROM user WHERE identificacion=:identificacion or email=:email";

        // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCION ANTERIOR
        $result = $conexion->prepare($consultar);

        // CONVERTIMOS LOS ARGUMENTOS EN PARÁMETROS
        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":email", $email);

        // EJECUTAMOS EL SELECT (Corregimos el error tipográfico)
        $result->execute();

        $f = $result->fetch();

        if($f){
           echo '<script> alert("Los datos del usuario ya se encuentra en el sistema") </script>';
           echo "<script> location.href='../views/administrador/registrar_admin.php'</script>";
           

        }else{
           // Creamos la variable que contendra la consulta a ejecutar
           $insertar = "INSERT INTO user (identificacion, tipo_de_dato, nombres, apellidos, email, telefono, clave,rol,estado,foto, foto2, foto3) VALUES(:identificacion, :tipo_de_dato, :nombres, :apellidos, :email, :telefono, :claveMd ,:rol, :estado, :foto, :foto2, :foto3)";


           // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA FUNCION ANTERIOR

           $result= $conexion->prepare($insertar);


           // convertimos los argumentos en parametros

           $result->bindParam(":identificacion", $identificacion);
           $result->bindParam(":tipo_de_dato", $tipo_de_dato);
           $result->bindParam(":nombres", $nombres);
           $result->bindParam(":apellidos", $apellidos);
           $result->bindParam(":email", $email);
           $result->bindParam(":telefono", $telefono);
           $result->bindParam(":claveMd", $claveMd);
           $result->bindParam(":rol", $rol);
           $result->bindParam(":estado", $estado);
           $result->bindParam(":foto", $foto);
           $result->bindParam(":foto2", $foto2);
           $result->bindParam(":foto3", $foto3); 

           // ejecutamos el insert

           $result->execute();

           echo '<script> alert("Usuarios registrado con exito") </script>';
           echo "<script> location.href='../views/administrador/registrar_admin.php'</script>";

       }


    }
    public function mostrarUserAdmin(){


        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
 
         $consultar = "SELECT * FROM user order by Nombres asc";
 
         $result=$conexion->prepare($consultar);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
 
     }

     public function mostrarUsuario(){


        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
 
         $consultar = "SELECT * FROM usuario order by Nombre asc";
 
         $result=$conexion->prepare($consultar);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
 
     }


     public function verPerfilAdmin($id){
        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
 
         $consultar = "SELECT * FROM user where Identificacion=:id";
 
         $result=$conexion->prepare($consultar);

         $result->bindParam(':id', $id);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
     }

     public function verPerfilUsuario($id){
        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
 
         $consultar = "SELECT * FROM usuario where ID=:id";
 
         $result=$conexion->prepare($consultar);

         $result->bindParam(':id', $id);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
     }

     public function mostrarUsuarioPerfil(){


        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
 
         $consultar = "SELECT * FROM usuario order by Nombre asc";
 
         $result=$conexion->prepare($consultar);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
 
     }

     public function buscarUsuarioAdmin($arg_nombre){
        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
         $nombre = "%".$arg_nombre."%";
         $consultar = "SELECT * FROM user where Nombres like :nombre";
 
         $result=$conexion->prepare($consultar);

         $result->bindParam(":nombre", $nombre);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
     }
     public function buscarUsuario($arg_nombre){
        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
         $nombre = "%".$arg_nombre."%";
         $consultar = "SELECT * FROM usuario where Nombre like :nombre";
 
         $result=$conexion->prepare($consultar);

         $result->bindParam(":nombre", $nombre);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
     }

     public function eliminarUserAdmin ($id) {
        $objConexion = new Conexion();
        
        $conexion = $objConexion -> get_conexion();
      
        $eliminar= "DELETE from user where Identificacion = :id";
      
        $result = $conexion->prepare($eliminar);
        $result-> bindParam (":id", $id );
        
        $result->execute ();
        echo '<script> alert("Usuario eliminado con exito") </script>';
        echo "<script> location.href='../Views/Administrador/ver_usuario_admin.php' </script>";
      
      
      
      }
      public function eliminarUsuario ($id) {
        $objConexion = new Conexion();
        
        $conexion = $objConexion -> get_conexion();
      
        $eliminar= "DELETE from usuario where ID = :id";
      
        $result = $conexion->prepare($eliminar);
        $result-> bindParam (":id", $id );
        
        $result->execute ();
        echo '<script> alert("Usuario eliminado con exito") </script>';
        echo "<script> location.href='../Views/Administrador/ver_usuarioo.php' </script>";
      
      
      
      }
      public function cargarUsuario($arg_id_producto){
        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
 
         $consultar = "SELECT * FROM usuario where ID = :id_producto";
 
         $result=$conexion->prepare($consultar);

         $result->bindParam(":id_producto", $arg_id_producto);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
      }
      public function modificarUsuario($arg_campo, $arg_valor, $arg_id_producto){
        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();

        $consulta = "UPDATE usuario set $arg_campo = :valor WHERE ID = :id_producto";

        $result = $conexion ->prepare($consulta);

        $result->bindParam(":valor", $arg_valor);
        $result->bindParam(":id_producto", $arg_id_producto);

        if(!$result){
            return "Error al modificar el usuario";
        }else{
            $result -> execute();
            echo '<script> alert("Usuario actualizado exitosamente") </script>';
            echo "<script> location.href='../views/administrador/ver_usuarioo.php' </script>";
        }
        
      }
      public function cargarUsuarioAdmin($arg_id_producto){
        $f=null;
 
 
         $objConexion = new Conexion();
         $conexion = $objConexion -> get_conexion();
 
         $consultar = "SELECT * FROM user where Identificacion = :id_producto";
 
         $result=$conexion->prepare($consultar);

         $result->bindParam(":id_producto", $arg_id_producto);
 
        $result->execute();
        
 
        while ($resultado=$result->fetch()) {
         $f[] = $resultado;
        }
 
        return $f;
      }
      public function modificarUsuarioAdmin($arg_campo, $arg_valor, $arg_id_producto){
        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();

        $consulta = "UPDATE user set $arg_campo = :valor WHERE Identificacion = :id_producto";

        $result = $conexion ->prepare($consulta);

        $result->bindParam(":valor", $arg_valor);
        $result->bindParam(":id_producto", $arg_id_producto);

        if(!$result){
            return "Error al actualizar el usuario";
        }else{
            $result -> execute();
            echo '<script> alert("Usuario actualizado exitosamente") </script>';
            echo "<script> location.href='../views/administrador/ver_usuario_admin.php' </script>";
        }
        
      }
}

class ValidarSesion
{
    public function iniciarSesion($email, $clave, $tipo_de_rol)
    {
        // CREAMOS EL OBJETO DE LA CONEXION
        $objConexion = new conexion();
        $conexion = $objConexion->get_conexion();

        // Creamos la variable que contendrá la consulta a ejecutar
        $consultar = "SELECT * FROM ";

        // Elegimos la consulta y la tabla según el tipo_de_rol
        if ($tipo_de_rol == "administrador") {
            $consultar .= "user WHERE email=:email";
        } else {
            $consultar .= "usuario WHERE Email=:email";
        }

        // PREPARAMOS TODO LO NECESARIO PARA EJECUTAR LA CONSULTA
        $result = $conexion->prepare($consultar);

        // CONVERTIMOS LOS ARGUMENTOS EN PARÁMETROS
        $result->bindParam(":email", $email);

        // EJECUTAMOS EL SELECT
        $result->execute();

        // Debemos convertir la variable result en un arreglo para segmentar los datos que necesitamos
        $f = $result->fetch();

        // si el usuario coincide validamos la clave
        if ($f) {
            if ($f['clave'] == $clave) {
                // Se realiza el inicio de sesión
                session_start();

                // CREAMOS VARIABLES DE SESIÓN
                $_SESSION['id'] = ($tipo_de_rol == "administrador") ? $f['Identificacion'] : $f['ID'];
                $_SESSION['email'] = $f['email'] ?? $f['Email'];
                $_SESSION['rol'] = $f['rol'] ?? $f['Rol'];
                $_SESSION['AUTENTICADO'] = "SI";

                // Redirigimos al usuario según el tipo_de_rol
                echo '<script> alert("Bienvenido") </script>';
                if ($tipo_de_rol == "administrador") {
                    echo "<script> location.href='../views/administrador/home.php' </script>";
                } else {
                    echo "<script> location.href='../Views/administrador/usuario.php' </script>";
                }
            } else {
                echo '<script> alert("La clave no coincide intentalo de nuevo") </script>';
                echo "<script> location.href='../theme/login.php' </script>";
            }
        } else {
            echo '<script> alert("Verifica que tu correo esté bien diligenciado o regístrate si no tienes cuenta") </script>';
            echo "<script> location.href='../theme/login.php' </script>";
        }
    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();

        echo '<script> location.href="../theme/login.php" </script>';
    }
}

?>