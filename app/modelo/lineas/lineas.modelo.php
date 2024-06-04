<?php
/*Creado para agregar las lineas a la BD
 */
require_once "./conexion.php";

class LineasModel
{

  public static function index()
  {try 
    {
      /** Realizar la consulta a la base de datos */
      $datos = Conexion::connect()->prepare("SELECT * FROM lineas");

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

    $exist = Conexion::connect()->prepare("SELECT  Nombre_linea  from lineas where Nombre_linea = :code");

    // 2- Asignar parametros
    $exist->bindParam(":code", $data, PDO::PARAM_STR);

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
              title: "La linea ya existe.",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de CRM */
                              window.location.href = "indexadmin.php?rutaadmin=crear_lineas";
                          }
                      });
          </script>';
      } else {
        // 1 - Crear la consulta para inserción en la tabla
        $create = Conexion::connect()->prepare("INSERT INTO lineas (Nombre_linea)
                VALUES( :Nombre_linea)");


        /**Asignar parametros*/
        
      
        $create->bindParam(":Nombre_linea", $data, PDO::PARAM_STR);
       

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
              $data = Conexion::connect()->prepare("SELECT *  FROM lineas  WHERE idlineas = :id");

              /** Inicializar los parametros de la consulta */
              $data -> bindParam(":id", $id, PDO::PARAM_INT);

              /**Ejecutar la consulta */
              $data -> execute();
              
              /** Devuelve el registro consultado */
              return $data->fetch();

              /**Cerrar conexion a la bd */
              
          }

          static public function update($data){

            

            
           
            
            $update = Conexion::Connect()->prepare("UPDATE lineas SET Nombre_linea = :Nombre_linea, estado = :estado  
            WHERE idLineas = :id");
        
             /**Asignar parametros*/         
            $update -> bindParam(":id",$data["idLineas"], PDO::PARAM_INT);
            $update -> bindParam(":Nombre_linea",$data["Nombre_linea"], PDO::PARAM_STR);
            $update -> bindParam(":estado",$data["estado"], PDO::PARAM_STR);
           
  
            /** Ejecutar la consulta y retornar el resultado al controlador */
            if($update -> execute()){
                return "Ok";
            }
            else
            {
              
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
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
              } ;
            
  
            /** Cerrar conexion a la bd */
           
  
        }
}



?>