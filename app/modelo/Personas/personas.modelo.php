<?php
/*Creado para que administrar TODOS los usuarios desde la BD debido a que es el controlador el que envia los datos
aqui solo se arma el INSERT INTO con los datos del controlador
por lo tanto es el mismo tanto para CLIENTES como para CONFIGURACIONES/USUARIOS
 */
require_once "./conexion.php";

class PersonasModel
{

  public static function index()
  {try 
    {
      /** Realizar la consulta a la base de datos */
      $datos = Conexion::connect()->prepare("SELECT * FROM personas");

      /**Ejecutar la consulta */
      $datos->execute();

      /** Devuelve los datos consultados */
      return $datos->fetchAll();

      /**Cerrar conexion a la bd */
    

    } catch (Exception $e) {
      echo $e->getMessage();
      die();
    }
  }
  //Método para guardar registro en la tabla de la base de datos
  public static function create($data)
  {
   



    //-- Validar que no exista un registro con el mismo codifo

    $exist = Conexion::connect()->prepare("SELECT  Nombres, Correo, Celular, Contrasenia, Rol  from personas where Correo = :code");

    // 2- Asignar parametros
    $exist->bindParam(":code", $data["Correo"], PDO::PARAM_STR);

    //3 ejecutar la consulta
    //$exist->execute()->fetchAll();

    /**Ejecutar la consulta */
    if ($exist->execute()) {
      $exist->fetchAll();

      if ($exist->rowCount() > 0) {
        // hay registros ya existe
        /** Enviar mensaje de creación correcta */
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo '<script>
                   
            Swal.fire({
              icon: "error",
              title: "El administrador ya existe.",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de CRM */
                              window.location.href = "indexadmin.php?rutaadmin=crear_admin";
                          }
                      });
          </script>';
      } else {
        // 1 - Crear la consulta para inserción en la tabla
        $create = Conexion::connect()->prepare("INSERT INTO personas (Nombres, Correo, Celular, Contrasenia, Rol)
                VALUES( :Nombres, :Correo, :Celular, :Contrasenia, :Rol)");


        /**Asignar parametros*/
        
        $create->bindParam(":Nombres", $data["Nombres"], PDO::PARAM_STR);        
        $create->bindParam(":Correo", $data["Correo"], PDO::PARAM_STR);
        $create->bindParam(":Celular", $data["Celular"], PDO::PARAM_INT);
        $create->bindParam(":Rol", $data["Rol"], PDO::PARAM_STR);
        $create->bindParam(":Contrasenia", $data["Contrasenia"], PDO::PARAM_INT);
       

        /**Ejecutar la consulta */
        if ($create->execute()) {
          return "Ok";
        } else {
          return "Error Modelo";
        }

        /**Cerrar conexion a la bd */
        
      }
    }
  }
}



?>