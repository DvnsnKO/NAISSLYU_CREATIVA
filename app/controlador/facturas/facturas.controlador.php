<?php
/*Creado para ver las facturas por parte del administrados
 El Admin no podra modificar los datos
 Unicamente podra modificar el estado del envio*/
require_once "./app/modelo/facturas/facturas.modelo.php";

class FacturasControlador
{
  // Método para recuperar listado de los registros
  static public function index()
  {

    // LLamar al modelo para recuiperar todos los registros de la tabla
    $data = FacturasModelo::index();
    return $data;
  }
  


}



