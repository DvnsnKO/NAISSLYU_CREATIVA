<?php

/*Creado para ver los DETALLES de las facturas por parte del administrador
 y con ello alistar el pedido*/

require_once "./app/modelo/facturas/detalles.modelo.php";

class DetallesFacturaControlador
{
  // Método para recuperar listado de los registros
  static public function index()
  {

    // LLamar al modelo para recuiperar todos los registros de la tabla
    $data = DetallesFacturaModelo::index();
    return $data;
  }
  


}



