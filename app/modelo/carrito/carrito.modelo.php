<?php
/*Muestra los productos desde la base de datos unicamente para los clientes se hace con el fin
 de posteriormente controlar solo los datos de los productos que pueden ver los clientes
 */
require_once "./conexion.php";

class CarritoModel
{

  public static function index()
  {
    try {

      /** Realizar la consulta a la base de datos */
      $datos = Conexion::connect()->prepare("SELECT * FROM productos WHERE Estado = 1 AND Cant_disp > 0");

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
  static public function show($id)
  {
    /** Realizar la consulta a la base de datos */
    $data = Conexion::connect()->prepare("SELECT Codigo_producto, Imagen, Nombre, Precio_uni, Cant_disp   FROM productos WHERE Codigo_producto = :id");

    /** Inicializar los parametros de la consulta */
    $data->bindParam(":id", $id, PDO::PARAM_INT);

    /**Ejecutar la consulta */
    $data->execute();

    /** Devuelve el registro consultado */
    return $data->fetch();

    /**Cerrar conexion a la bd */

  }
 



  public static function create($data) {
      try {
          $stmt = Conexion::connect()->prepare("INSERT INTO facturas 
              (id_transaccion, Metodo_pago, Total_factura, Estado_envio, Estado_pago, Ciudad, Direccion, personas_Id_persona)
              VALUES (:id_transaccion, :Metodo_pago, :Total_factura, :Estado_envio, :Estado_pago, :Ciudad, :Direccion, :personas_Id_persona)");

          $stmt->bindParam(":id_transaccion", $data['id_transaccion'], PDO::PARAM_STR);
          $stmt->bindParam(":Metodo_pago", $data['Metodo_pago'], PDO::PARAM_STR);
          $stmt->bindParam(":Total_factura", $data['Total_factura'], PDO::PARAM_INT);
          $stmt->bindParam(":Estado_envio", $data['Estado_envio'], PDO::PARAM_INT);
          $stmt->bindParam(":Estado_pago", $data['Estado_pago'], PDO::PARAM_INT);
          $stmt->bindParam(":Ciudad", $data['Ciudad'], PDO::PARAM_STR);
          $stmt->bindParam(":Direccion", $data['Direccion'], PDO::PARAM_STR);
          $stmt->bindParam(":personas_Id_persona", $data['personas_Id_persona'], PDO::PARAM_INT);

          if ($stmt->execute()) {
            // Obtener el id_factura correspondiente a la id_transaccion insertada
            $idTransaccion = $data['id_transaccion'];
            $query = "SELECT Id_Facturas FROM facturas WHERE id_transaccion = :idTransaccion";
            $stmtIdFactura = Conexion::connect()->prepare($query);
            $stmtIdFactura->bindParam(":idTransaccion", $idTransaccion, PDO::PARAM_STR);
            $stmtIdFactura->execute();
            $result = $stmtIdFactura->fetch(PDO::FETCH_ASSOC);

            if ($result && isset($result['Id_Facturas'])) {
                return $result['Id_Facturas'];
            }  else {
              return false;
          }
      } }catch (PDOException $e) {
          // Manejar excepciones según necesidad (registro de errores, etc.)
          return false;
      }
  }

  public static function createDetalle($detalleData) {
      try {
          $stmt = Conexion::connect()->prepare("INSERT INTO detalles_factura 
              (Facturas_Id_Facturas, Nombre_producto, Cantidad, Precio_unit, Valor_pagado)
              VALUES (:Facturas_Id_Facturas, :Nombre_producto, :Cantidad, :Precio_unit, :Valor_pagado)");

          $stmt->bindParam(":Facturas_Id_Facturas", $detalleData['Facturas_Id_Facturas'], PDO::PARAM_INT);
          $stmt->bindParam(":Nombre_producto", $detalleData['Nombre_producto'], PDO::PARAM_STR);
          $stmt->bindParam(":Cantidad", $detalleData['Cantidad'], PDO::PARAM_INT);
          $stmt->bindParam(":Precio_unit", $detalleData['Precio_unit'], PDO::PARAM_STR);
          $stmt->bindParam(":Valor_pagado", $detalleData['Valor_pagado'], PDO::PARAM_STR);

          return $stmt->execute();
      } catch (PDOException $e) {
          // Manejar excepciones según necesidad (registro de errores, etc.)
          return false;
      }
  }
}



?>