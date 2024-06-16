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
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($consulta->rowCount() == 1) {
                return $usuario["Id_persona"];
            }
            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
}

?>