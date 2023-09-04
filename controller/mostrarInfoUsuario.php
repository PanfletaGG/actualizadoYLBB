<?php
function cargarUsuario(){
    $objConsulta = new Consultas();
    $result = $objConsulta->mostrarUsuario();

    if (!isset($result)) {
        echo '<h2>No hay usuarios registrados</h2>';
    }   else{

        foreach($result as $f){
        echo  '
            <tr>
                <td><img src="../'.$f['foto'].'" alt="Foto user" style="width:60px; height:60px; border-radius:50%"></td>
                <td>'.$f['Nombre'].'</td>
                <td>'.$f['Apellido'].'</td>
                <td>'.$f['Rol'].'</td>
                <td>'.$f['Email'].'</td>
                <td>
                    <a href="../../views/administrador/modificar.php?id='.$f['ID'].'" class="btn btn-primary"><i class="ti-marker-alt"></i>Modificar</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="../../controller/eliminarUsuario.php?id='.$f['ID'].'"><i class="ti-trash"></i>Eliminar</a>
                </td>
            <tr>';
        }
        
    }
}
function cargarUsuarioPerfil(){
    $objConsulta = new Consultas();
    $result = $objConsulta->mostrarUsuarioPerfil();

    if (!isset($result)) {
        echo '<h2>No hay usuarios registrados</h2>';
    }   else{

        foreach($result as $f){
        echo  '
            <tr>
                <td>'.$f['Nombre'].'</td>
                <td>'.$f['Apellido'].'</td>
                <td>'.$f['Rol'].'</td>
                <td>'.$f['Email'].'</td>
                <td>
                    <a href="../../views/administrador/modificar.php?id='.$f['ID'].'" class="btn btn-primary"><i class="ti-marker-alt"></i>Modificar</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="../../controller/eliminarUsuario.php?id='.$f['ID'].'"><i class="ti-trash"></i>Eliminar</a>
                </td>
            <tr>';
        }
        
    }
}
function reportesUsuarioPerfil(){
    $objConsulta = new Consultas();
    $result = $objConsulta->mostrarUsuarioPerfil();

    if (!isset($result)) {
        echo '<h2>No hay usuarios registrados</h2>';
    }   else{

        foreach($result as $f){
        echo  '
            <tr>
                <td>'.$f['Nombre'].'</td>
                <td>'.$f['Apellido'].'</td>
                <td>'.$f['Email'].'</td>    
                <td>'.$f['Rol'].'</td>
                <td>'.$f['Estado'].'</td>
            <tr>';
        }
        
    }
}

// session_start();
function perfilUsuario(){

    // VARIABLE DE SESION DE LOGIN



    $id = $_SESSION['id'];
    $objConsulta = new consultaS();
    $result = $objConsulta->verPerfilUsuario($id);

    foreach ($result as $f) {
        echo '
        

        <li class="label">'.$f['Rol'].'</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                        <img src="../'.$f['foto'].'" alt="Foto user" style="width:60px; height:60px; border-radius:50%"> '.$f['Nombre'].'
                            <span class="badge badge-primary">2</span>
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                    </li>
        
                    <li>
                        <a href="../../controller/cerrarSesion.php">
                            <i class="ti-close"></i> Salir</a>
                    </li>
        
        ';
    }




}


function buscar_usuario($nombre){
    $objConsulta = new Consultas();
    $result = $objConsulta->buscarUsuario($nombre);


    if (!isset($result)) {
        echo '<h2>No hay usuarios registrados</h2>';
    }   else{

        foreach($result as $f){
        echo  '
            <tr>
                <td><img src="../'.$f['foto'].'" alt="Foto user" style="width:60px; height:60px; border-radius:50%"></td>
                <td>'.$f['Nombre'].'</td>
                <td>'.$f['Apellido'].'</td>
                <td>'.$f['Rol'].'</td>
                <td>'.$f['Estado'].'</td>
                <td>
                    <a href="../views/administrador/modificar.php" class="btn btn-primary"><i class="ti-marker-alt"></i>Modificar</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="../../controller/eliminarUserAdmin.php?id='.$f['ID'].'"><i class="ti-trash"></i>Eliminar</a>
                </td>
            <tr>';
        }
    }
}


?>