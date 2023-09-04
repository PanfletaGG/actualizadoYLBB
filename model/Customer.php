<?php

require_once 'Database.php';

class Customer{
    private string $name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $localidad;
    private string $phone_number;
    private string $perfil_picture;
    private string $postal_code;
    private string $adress;
    private string $neightborhood;
    private string $mfa_agree;
    private string $role;


   
    public function register(string $name, string $lastname, string $role, string $email){
        $this->name = $name;
        $this->last_name = $lastname;
        $this->role = $role;
        $this->email = $email;
        try {
            $query = "INSERT INTO cliente(nombre_cli, apellido_cli, rol_cli, email_cli) VALUES(:nombre_cli, :apellido_cli, :rol_cli, :email_cli)";
            $db = new Database();
            $statement = $db->connect()->prepare($query);

            $statement->bindParam(':nombre_cli', $this->name, PDO::PARAM_STR);
            $statement->bindParam(':apellido_cli', $this->last_name, PDO::PARAM_STR);
            $statement->bindParam(':rol_cli', $this->role, PDO::PARAM_STR);
            $statement->bindParam(':email_cli', $this->email, PDO::PARAM_STR);

            $statement->execute();
            echo "Register successfully";
        } catch (\Throwable $th) {
            echo "Something went wrong: " . $th;
        }
    }

    public function verifyAccount(string $email) {
        try {
            $query = "SELECT * FROM cliente WHERE email_cli = :email_cli";
            $db = new Database();
            $statement = $db->connect()->prepare($query);

            $statement->bindValue(':email_cli', $email, PDO::PARAM_STR);
            $res = $statement->execute();

            if ($res) {
                $arr = $statement->fetchAll(PDO::FETCH_ASSOC);
                if(is_array($arr)){

                    if (count($arr) > 0) {
                        $response = $arr[0];
                        $nombre = $response['nombre_cli'];
                        $apellido = $response['apellido_cli'];
                        $email = $response['email_cli'];
                        $rol = $response['rol_cli'];

                        return [$nombre, $apellido, $email, $rol];  
                    }
                    
                }
            }
        } catch (\Throwable $th) {
            echo "Something went wrong: " . $th;
        }
    }

    public function getRole(string $email) : string{
        try {
            $query = "SELECT * FROM cliente WHERE email_cli = :email_cli";
            $db = new Database();
            $statement = $db->connect()->prepare($query);

            $statement->bindValue('email_cli', $email, PDO::PARAM_STR);
            $statement->execute();

            $arr = $statement->fetch();
            if(is_array($arr)){
                $response = $arr["email_cli"];
            }else{
                $response = null;
            }

            if ($response == $email) {
                $role = $arr["rol_cli"];
                return $role;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            echo "Something went wrong: " . $th;
        }
    }
}

?>