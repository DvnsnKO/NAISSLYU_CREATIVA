<?php
/*Muestra los productos desde la base de datos unicamente para los clientes se hace con el fin
 de posteriormente controlar solo los datos de los productos que pueden ver los clientes
 */
require_once "./conexion.php";

class ProductoModel
{

  public static function index()
  {try 
    {
      /** Realizar la consulta a la base de datos */
      $datos = Conexion::connect()->prepare("SELECT * FROM productos");

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
}



?>