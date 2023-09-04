<?php


require_once "../model/Customer.php";
require_once "../model/Seller.php";





//TODO: Crear funcion verificando que el usuario existe,
//TODO: de ser asi, se crea una session con los datos email, name, lastname and role y se redirecciona al main.php
//TODO: en caso de que no exista el usuario, ejecutar el registro apenas se envien los datos del formulario


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])) {
    // Obtener el dato enviado desde JavaScript
    $dato = $_POST["email"];
    
    $user_auth_cli = new Customer();
    $user_auth_emp = new Seller();
    $response_cli = $user_auth_cli->verifyAccount($dato);
    $response_emp = $user_auth_emp->verifyAccount($dato);

    if ($response_cli == true ) {

        [$nombre, $apellido, $email, $rol] = $response_cli;
        session_start();
        $_SESSION['name'] = $nombre;
        $_SESSION['lastname'] = $apellido;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $rol;
        echo "exists";
    }

    if ($response_emp == true) {
        [$nombre, $apellido, $email, $rol] = $response_emp;
        session_start();
        $_SESSION['name'] = $nombre;
        $_SESSION['lastname'] = $apellido;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $rol;
        echo "exists";
    }
       
    // Responder con algún mensaje (opcional)
    //echo "El dato recibido es: " . $dato;
  }else{
    $name = $_POST['nombre'] ?? null;
    $last_name = $_POST['apellido'] ?? null;
    $role = $_POST['rol'] ?? null;
    $email = $_POST['emaill'] ?? null;

    function registerHandler($name, $last_name, $role, $email){
        if ($name !== null && $last_name !== null && $role !== null && $email !== null && $role == 'customer') {
            $customer = new Customer();
            $customer->register($name, $last_name, $role, $email);
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['role'] = $role;
            header("location: ../theme/main.php");
        }else if($name !== null && $last_name !== null && $role !== null && $email !== null && $role == 'seller'){
            $seller = new Seller();
            $seller->register($name, $last_name, $role, $email);
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['role'] = $role;
            header("location: ../theme/main.php");
        }
    }
    registerHandler($name, $last_name, $role, $email);
  }





?>