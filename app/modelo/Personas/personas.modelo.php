<?php
/*Creado para que administrar TODOS los usuarios desde la BD debido a que es el controlador el que envia los datos
aqui solo se arma el INSERT INTO con los datos del controlador
por lo tanto es el mismo tanto para CLIENTES como para CONFIGURACIONES/USUARIOS
 */
require_once "./conexion.php";

class PersonasModel
{

  public static function index()
  {
    try {
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

    $exist = Conexion::connect()->prepare("SELECT  Nombres  FROM personas WHERE Correo = :code");

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
              title: "El correo ya esta registrado.",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de CRM */
                              window.location.href = "index.php?ruta=registro";
                          }
                      });
          </script>';
      } else {
        // 1 - Crear la consulta para inserción en la tabla
        $create = Conexion::connect()->prepare("INSERT INTO personas (Nombres, Correo, Celular, Contrasenia, Rol, Activo)
                VALUES( :Nombres, :Correo, :Celular, :Contrasenia, :Rol,  :Activo)");


        /**Asignar parametros*/

        $create->bindParam(":Nombres", $data["Nombres"], PDO::PARAM_STR);
        $create->bindParam(":Correo", $data["Correo"], PDO::PARAM_STR);
        $create->bindParam(":Celular", $data["Celular"], PDO::PARAM_INT);
        $create->bindParam(":Rol", $data["Rol"], PDO::PARAM_STR);
        $create->bindParam(":Contrasenia", $data["Contrasenia"], PDO::PARAM_INT);       
        $create->bindParam(":Activo", $data["Activo"], PDO::PARAM_INT);
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
  static public function show($id)
  {
    /** Realizar la consulta a la base de datos */
    $data = Conexion::connect()->prepare("SELECT *  FROM personas WHERE Id_persona = :id");

    /** Inicializar los parametros de la consulta */
    $data->bindParam(":id", $id, PDO::PARAM_INT);

    /**Ejecutar la consulta */
    $data->execute();

    /** Devuelve el registro consultado */
    return $data->fetch();


  }
  static public function update($data)
    {

    $update = Conexion::Connect()->prepare("UPDATE personas SET Nombres = :Nombres, 
    Correo = :Correo, Celular = :Celular, Tipo_Id = :Tipo_Id, N_Id = :N_Id, Entidad_territorial = :Entidad_territorial, Direccion = :Direccion    
    WHERE Id_persona = :id");

    /**Asignar parametros*/
    $update->bindParam(":id", $data["Id_persona"], PDO::PARAM_INT);
    $update->bindParam(":Nombres", $data["Nombres"], PDO::PARAM_STR);
    $update->bindParam(":Correo", $data["Correo"], PDO::PARAM_STR);   
    $update->bindParam(":Celular", $data["Celular"], PDO::PARAM_STR);
    $update->bindParam(":Tipo_Id", $data["Tipo_Id"], PDO::PARAM_STR);
    $update->bindParam(":N_Id", $data["N_Id"], PDO::PARAM_INT);
    $update->bindParam(":Entidad_territorial", $data["Entidad_territorial"], PDO::PARAM_STR);
    $update->bindParam(":Direccion", $data["Direccion"], PDO::PARAM_STR);

    /** Ejecutar la consulta */
    

    if ($update->execute()) {
        return "Ok";
    }else {

      
      echo '<script>
                           
                    Swal.fire({
                      icon: "error",
                      title: "error al actualizar.",
                  
                      showConfirmButton: true,
                      confirmButtonText: "Aceptar"
                      }).then(function(result){
                                  if (result.value) {
                                      /**Redireccionar a la página principal de CRM */
                                      window.location.href = "indexadmin.php?rutaadmin=lineas.actualizar";
                                  }
                              });
                  </script>';
    }
    ;


    /** Cerrar conexion a la bd */


  }
}



?>