<?php

require_once 'Database.php';

class Seller{
    private string $name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $phone_number;
    private string $perfil_picture;
    private string $store_name;
    private string $mfa_agree;
    private string $role;


    public function register(string $name, string $lastname, string $role, string $email){
        $this->name = $name;
        $this->last_name = $lastname;
        $this->role = $role;
        $this->email = $email;
        try {
            $query = "INSERT INTO emprendedor(nombre_emp, apellido_emp, rol_emp, email_emp) VALUES(:nombre_emp, :apellido_emp, :rol_emp, :email_emp)";
            $db = new Database();
            $statement = $db->connect()->prepare($query);

            $statement->bindParam(':nombre_emp', $this->name, PDO::PARAM_STR);
            $statement->bindParam(':apellido_emp', $this->last_name, PDO::PARAM_STR);
            $statement->bindParam(':rol_emp', $this->role, PDO::PARAM_STR);
            $statement->bindParam(':email_emp', $this->email, PDO::PARAM_STR);

            $statement->execute();
            echo "Register successfully";
        } catch (\Throwable $th) {
            echo "Something went wrong: " . $th;
        }
    }


    public function verifyAccount(string $email){
        try {
            $query = "SELECT * FROM emprendedor WHERE email_emp = :email_emp";
            $db = new Database();
            $statement = $db->connect()->prepare($query);

            $statement->bindValue(':email_emp', $email, PDO::PARAM_STR);
            $res = $statement->execute();

            if ($res) {
                $arr = $statement->fetchAll(PDO::FETCH_ASSOC);
                if(is_array($arr)){

                    if (count($arr) > 0) {
                        $response = $arr[0];
                        $nombre = $response['nombre_emp'];
                        $apellido = $response['apellido_emp'];
                        $email = $response['email_emp'];
                        $rol = $response['rol_emp'];

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
            $query = "SELECT * FROM emprendedor WHERE email_emp = :email_emp";
            $db = new Database();
            $statement = $db->connect()->prepare($query);

            $statement->bindValue('email_emp', $email, PDO::PARAM_STR);
            $statement->execute();

            $arr = $statement->fetch();
            if(is_array($arr)){
                $response = $arr["email_emp"];
            }else{
                $response = null;
            }

            if ($response == $email) {
                //session_start();
                $role = $arr["rol_emp"];
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