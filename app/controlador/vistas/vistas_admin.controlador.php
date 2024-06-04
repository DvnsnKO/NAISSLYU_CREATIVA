<?php
/*Controla las vistas del administrador
 */

class RutasControlador
{

    public function RutasAdmin()
    {

        if (isset($_GET["rutaadmin"])) {
            $ruta = $_GET["rutaadmin"];
        } else {
            $ruta = "dashboard";
        }

        /** LLamar al modelo para armar la ruta */
        $rutaadmin = RutasModelo::RutasAdmin($ruta);

        
        
        include $rutaadmin;

    }

}

?>