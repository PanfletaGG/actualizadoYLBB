<?php
// Enlazamos las dependencias necesarias


function seleccionar(){
    if(isset($_GET['id'])){
        $consultas = new consultas();
        $id_producto = $_GET['id'];
        $filas = $consultas->cargarUsuario($id_producto);

        foreach ($filas as $fila){
            echo "
        <form action = '../../controller/modificarUsuario.php' method = 'post'>
        
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type='text' class='form-control' name = 'nombre' value='".$fila['Nombre']."' ></td>

            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type='text' class='form-control' name = 'apellidos' value='".$fila['Apellido']."'></td>

            </tr>
            <tr>
                <td>Email</td>
                <td><input type='text' class='form-control' name = 'email' value='".$fila['Email']."'></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type='text' class='form-control' name = 'telefono' value='".$fila['Telefono']."'></td>
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
        echo"errpr";
    }
}
?>
