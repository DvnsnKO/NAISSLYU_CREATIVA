<?php
/*Creado ver y modificar TODOS los usuarios desde el lado de clientes
tambien se pueden agregar nuevos administradores
 */
require_once "./conexion.php";

class usuariosModel
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

    $exist = Conexion::connect()->prepare("SELECT  Nombres, Correo, Celular, Contrasenia, Rol, Activo from personas where Correo = :code");

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
              title: "El usuario ya existe.",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de CRM */
                              window.location.href = "indexadmin.php?rutaadmin=crear_usuario";
                          }
                      });
          </script>';
      } else {
        // 1 - Crear la consulta para inserción en la tabla
        $create = Conexion::connect()->prepare("INSERT INTO personas (Nombres, Correo, Celular, Contrasenia, Rol, Activo)
                VALUES( :Nombres, :Correo, :Celular, :Contrasenia, :Rol, :Activo)");


        /**Asignar parametros*/
        
        $create->bindParam(":Nombres", $data["Nombres"], PDO::PARAM_STR);        
        $create->bindParam(":Correo", $data["Correo"], PDO::PARAM_STR);
        $create->bindParam(":Celular", $data["Celular"], PDO::PARAM_INT);
        $create->bindParam(":Rol", $data["Rol"], PDO::PARAM_STR);
        $create->bindParam(":Contrasenia", $data["Contrasenia"], PDO::PARAM_INT);
        $create->bindParam(":Activo", $data["Direcdcion"], PDO::PARAM_INT);
        // $create->bindParam(":Departamento", $data["Departamento"], PDO::PARAM_STR);
        // $create->bindParam(":Direccion", $data["Direccion"], PDO::PARAM_STR);
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