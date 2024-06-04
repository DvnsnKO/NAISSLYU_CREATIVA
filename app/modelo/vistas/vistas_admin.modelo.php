<?php
/*Arma la ruta de las vistas para el admin
 */

class RutasModelo
{
    /** Funcion  que arnma las rutas del menú */



    static public function RutasAdmin($ruta)
    {
        //logica para dashboard
        if ($ruta == "dashboard") {
            $pagina = "./public/vistas/admin/dashboard/" . $ruta . ".vistas.php";
        } else if ($ruta == "indicadores") {
            $pagina = "./public/vistas/admin/indicadores/" . $ruta . ".vistas.php";
        } else if (
            $ruta == "pendientes"
            || $ruta == "detalles"
            || $ruta == "enviados"
            || $ruta == "historial"
        ) {
            $pagina = "./public/vistas/admin/pedidos/" . $ruta . ".vistas.php";
        } else if (
            $ruta == "crm"
            || $ruta == "crear_admin"

        ) {
            $pagina = "./public/vistas/admin/crm/" . $ruta . ".vistas.php";
        } else if (
            $ruta == "activos"
            || $ruta == "crear_productos"           
            || $ruta == "inactivos"

        ) {
            $pagina = "./public/vistas/admin/productos/" . $ruta . ".vistas.php";
        }
        else if (
            $ruta == "promociones"            

        ) {
            $pagina = "./public/vistas/admin/promociones/" . $ruta . ".vistas.php";
        }
        else if (
            $ruta == "lineas" 
            || $ruta == "crear_lineas" 
            || $ruta == "lineas.actualizar"           

        ) {
            $pagina = "./public/vistas/admin/parametros/lineas/". $ruta . ".vistas.php";
        }
        else if (
            $ruta == "usuarios" 
            || $ruta == "crear_usuario"             

        ) {
            $pagina = "./public/vistas/admin/configuraciones/usuarios/". $ruta . ".vistas.php";
        }







        return $pagina;
    }

}

?>