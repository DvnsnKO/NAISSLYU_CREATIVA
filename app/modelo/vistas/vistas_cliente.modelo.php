<?php
/*Arma la ruta de las vistas para el cliente
 */


class RutasModelo
{
    /** Funcion  que arnma las rutas del menú */
    static public function RutasModelo($ruta)
    {
        //logica para productos
        if (
            $ruta == "destacados"
            || $ruta == "productos"
            || $ruta == "menuinicio"
        ) {
            /** crar variable para guardar la ruta al archivo php que vamos a abrir */
            $pagina = "./public/vistas/cliente/productos/" . $ruta . ".vistas.php";

        }
        //logica para sesion
        else if (
            $ruta == "login"
            || $ruta == "olvidoContrasenia"
            || $ruta == "registro"
            || $ruta == "olvidocontrasenia"
            || $ruta == "recuperarcontrasenia"

        ) {

            $pagina = "./public/vistas/cliente/sesion/" . $ruta . ".vistas.php";

        }
        //logica para perfil
        else if (
            $ruta == "perfil"
            || $ruta == "actualizacion"
            || $ruta == "pedidos"
            || $ruta == "detalles"

        ) {

            $pagina = "./public/vistas/cliente/sesion/perfil/" . $ruta . ".vistas.php";
        } else if (
            $ruta == "compras"
            || $ruta == "envios"
            

        ) {

            $pagina = "./public/vistas/cliente/pagos/" . $ruta . ".vistas.php";
        }
        //logica para legal
        else if (
            $ruta == "preguntas"
            || $ruta == "Terminos"

        ) {

            $pagina = "./public/vistas/cliente/legal/" . $ruta . ".vistas.php";

        }
        //logica para quienes somos
        else if ($ruta == "quienesomos") {
            $pagina = "./public/vistas/cliente/quienes somos/" . $ruta . ".vistas.php";

        }
        return $pagina;
    }

    //Logica para ADMINISTRADOR



}

?>