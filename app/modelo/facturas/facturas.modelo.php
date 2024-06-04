<?php
/*Creado para conectar con la BD y ver las facturas creadas
 */
require_once "./conexion.php";

class FacturasModelo
{

  public static function index()
  {try 
    {
      /** Realizar la consulta a la base de datos */
      $datos = Conexion::connect()->prepare("SELECT * FROM facturas");

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

    $exist = Conexion::connect()->prepare("SELECT Cant_disp, Precio_uni, Descripcion, Codigo_producto, Nombre,  Lineas_idLineas FROM productos where Codigo_producto = :code");

    // 2- Asignar parametros
    $exist->bindParam(":code", $data["Codigo_producto"], PDO::PARAM_STR);

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
              title: "El producto ya existe.",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de productos */
                              window.location.href = "indexadmin.php?rutaadmin=crear_productos";
                          }
                      });
          </script>';
      } else {
        // 1 - Crear la consulta para inserción en la tabla
        $create = Conexion::connect()->prepare("INSERT INTO productos (Cant_disp, Precio_uni, Descripcion, Codigo_producto, Nombre,  Lineas_idLineas)
                VALUES( :Cant_disp, :Precio_uni, :Descripcion, :Codigo_producto, :Nombre,  :Lineas_idLineas)");


        /**Asignar parametros*/
        $create->bindParam(":Codigo_producto", $data["Codigo_producto"], PDO::PARAM_STR);
        $create->bindParam(":Nombre", $data["Nombre"], PDO::PARAM_STR);        
      
        $create->bindParam(":Lineas_idLineas", $data["Lineas_idLineas"], PDO::PARAM_INT);
        $create->bindParam(":Cant_disp", $data["Cant_disp"], PDO::PARAM_INT);
        $create->bindParam(":Descripcion", $data["Descripcion"], PDO::PARAM_STR);
        $create->bindParam(":Precio_uni", $data["Precio_uni"], PDO::PARAM_INT);

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