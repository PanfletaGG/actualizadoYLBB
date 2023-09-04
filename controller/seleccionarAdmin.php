<?php
// Enlazamos las dependencias necesarias


function seleccionarAdmin(){
    if(isset($_GET['id'])){
        $consultas = new consultas();
        $id_producto = $_GET['id'];
        $filas = $consultas->cargarUsuarioAdmin($id_producto);

        foreach ($filas as $fila){
            echo "
        <form action = '../../controller/modificarUsuarioAdmin.php' method = 'post'>
        
        <table>
            <tr>
                <td>Nombre: </td>
                <td><input type='text' class='form-control' name = 'nombre' value='".$fila['Nombres']."' ></td>

            </tr>
            <tr>
                <td>Apellidos: </td>
                <td><input type='text' class='form-control' name = 'apellidos' value='".$fila['Apellidos']."'></td>

            </tr>
            <tr>
                <td>Email: </td>
                <td><input type='text' class='form-control' name = 'email' value='".$fila['Email']."'></td>
            </tr>
            <tr>
                <td>Telefono:</td>
                <td><input type='text' class='form-control' name = 'telefono' value='".$fila['telefono']."'></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type='hidden' name = 'id_producto' value='".$id_producto."'></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type='submit' value = 'Modificar usuarios' ></td>
            </tr>
        </table>

        </form>
        ";
        }
        
    }else {
        echo"error";
    }
}
?>
