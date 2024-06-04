<?php
require_once "./app/modelo/ubicacion/ubicacion.modelo.php";

class ubicacionControlador
{

    // Método para recuperar listado de los registros
    static public function indexdep()
    {

        // LLamar al modelo para recuiperar todos los registros de la tabla
        $data = ubicacionModel::indexdep();
        return $data;
    }
   
   
}

?>