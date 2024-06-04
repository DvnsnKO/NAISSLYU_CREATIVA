<?php
/*Creado para ver los clientes registrados en la vista CRM-clientes del admin 
 */
require_once "./app/modelo/Personas/personas.modelo.php";

class PersonasControlador
{





  // Método para recuperar listado de los registros
  static public function index()
  {

    // LLamar al modelo para recuiperar todos los registros de la tabla
    $data = PersonasModel::index();
    return $data;
  }
  /*static public function index()
    {
      $data = ProductoModel::index();
      return  $data;
      
    };*/
  

  


}



