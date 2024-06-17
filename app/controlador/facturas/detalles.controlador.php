<?php

/*Creado para ver los DETALLES de las facturas por parte del administrador
 y con ello alistar el pedido*/

require_once "./app/modelo/facturas/detalles.modelo.php";

class DetallesFacturaControlador
{
  // Método para recuperar listado de los registros
  static public function show()
  {


    return $data = DetallesFacturaModelo::show($_GET["id"]);
    


  }
  


}



