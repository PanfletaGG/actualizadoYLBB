<!-- este archivo resive todas las consultas del modelo para mostrar informacion al administrador -->
<!-- esta funcion es la que se llama en la vista -->


<?php
function cargarUsuarioAdmin(){
    $objConsulta = new Consultas();
    $result = $objConsulta->mostrarUserAdmin();


    if (!isset($result)) {
        echo '<h2>No hay usuarios registrados</h2>';
    }   else{

        foreach($result as $f){
        echo  '
            <tr>
                <td><img src="../'.$f['foto'].'" alt="Foto user" style="width:60px; height:60px; border-radius:50%"></td>
                <td>'.$f['Nombres'].'</td>
                <td>'.$f['Apellidos'].'</td>
                <td>'.$f['rol'].'</td>
                <td>'.$f['estado'].'</td>
                <td>
                <a href="../../views/administrador/modificarAdmin.php?id='.$f['Identificacion'].'" class="btn btn-primary"><i class="ti-marker-alt"></i>Modificar</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="../../controller/eliminarUserAdmin.php?id='.$f['Identificacion'].'"><i class="ti-trash"></i>Eliminar</a>
                </td>
            <tr>';
        }
        
    }
}
function cargarUsuarioAdminReportes(){
    $objConsulta = new Consultas();
    $result = $objConsulta->mostrarUserAdmin();


    if (!isset($result)) {
        echo '<h2>No hay usuarios registrados</h2>';
    }   else{

        foreach($result as $f){
        echo  '
            <tr>
                
                <td>'.$f['Nombres'].'</td>
                <td>'.$f['Apellidos'].'</td>
                <td>'.$f['Email'].'</td>
                <td>'.$f['rol'].'</td>
                <td>'.$f['estado'].'</td>
            <tr>';
        }
        
    }
}


// session_start();    
function perfilAdmin(){

    // VARIABLE DE SESION DE LOGIN



    $id = $_SESSION['id'];
    $objConsulta = new consultas();
    $result = $objConsulta->verPerfilAdmin($id);

    foreach ($result as $f) {
        echo '
        

        <li class="label">'.$f['rol'].'</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                        <img src="../'.$f['foto'].'" alt="Foto user" style="width:60px; height:60px; border-radius:50%"> '.$f['Nombres'].'
                            
                        </a>
                    </li>
        
                    <li>
                        <a href="../../controller/cerrarSesion.php">
                            <i class="ti-close"></i> Salir</a>
                    </li>
        
        ';
    }




}


function buscar($nombre){
    $objConsulta = new Consultas();
    $result = $objConsulta->buscarUsuarioAdmin($nombre);


    if (!isset($result)) {
        echo '<h2>No hay usuarios registrados</h2>';
    }   else{

        foreach($result as $f){
        echo  '
            <tr>
                <td><img src="../'.$f['foto'].'" alt="Foto user" style="width:60px; height:60px; border-radius:50%"></td>
                <td>'.$f['Nombres'].'</td>
                <td>'.$f['Apellidos'].'</td>
                <td>'.$f['rol'].'</td>
                <td>'.$f['estado'].'</td>
                <td>
                    <a href="" class="btn btn-primary"><i class="ti-marker-alt"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger" href="../../controller/eliminarUserAdmin.php?id='.$f['Identificacion'].'"><i class="ti-trash"></i>Eliminar</a>
                </td>
            <tr>';
        }
    }
}


?>