<?php

//este es el controlador que muestra los productos desde el lado del cliente vista/clientes/productos
/*Muestra los productos desde la base de datos unicamente para los clientes se hace con el fin
 de posteriormente controlar solo los datos de los productos que pueden ver los clientes*/

require_once "./app/modelo/Productos/mostrando.modelo.php";

class ProductoControlador
{





  // Método para recuperar listado de los registros
  static public function index()
  {

    // LLamar al modelo para recuiperar todos los registros de la tabla
    $data = ProductoModel::index();
    return $data;
  }
 


}



