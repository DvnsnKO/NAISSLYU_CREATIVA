<?php
require_once "../../conexion.php";

class SesionModel
{
    public static function verificaradmin($correo, $contrasenia)
    {
        try {

            $consulta = Conexion::connect()->prepare("SELECT * FROM personas WHERE Correo = :correo AND Contrasenia = :Contrasenia AND Rol= 'Admin' ");
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
    static public function show($id)
    {
      /** Realizar la consulta a la base de datos */
      $data = Conexion::connect()->prepare("SELECT Nombres  FROM personas WHERE Id_persona = :id");
  
      /** Inicializar los parametros de la consulta */
      $data->bindParam(":id", $id, PDO::PARAM_INT);
  
      /**Ejecutar la consulta */
      $data->execute();
  
      /** Devuelve el registro consultado */
      return $data->fetch();
  
  
    }
    
}

?>