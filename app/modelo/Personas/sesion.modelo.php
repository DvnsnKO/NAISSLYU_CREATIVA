<?php
require_once "./conexion.php";

class SesionModel
{
    public static function verificarCredenciales($correo, $contrasenia)
    {
        try {
           
            $consulta = Conexion::connect()->prepare("SELECT * FROM personas WHERE Correo = :correo AND Contrasenia = :Contrasenia");
            $consulta->bindParam(":correo", $correo, PDO::PARAM_STR);
            $consulta->bindParam(":Contrasenia", $contrasenia, PDO::PARAM_STR);
            $consulta->execute();

            if ($consulta->rowCount() == 1) {                
                    return true;                
            }
            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>

