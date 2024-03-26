<?php


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
            $pagina = "vistas/cliente/productos/" . $ruta . ".vistas.php";

        }
        //logica para sesion
        else if (
            $ruta == "login"
            || $ruta == "olvidoContrasenia"
            || $ruta == "registro"
            || $ruta == "olvidocontrasenia"
            || $ruta == "recuperarcontrasenia"

        ) {

            $pagina = "vistas/cliente/sesion/" . $ruta . ".vistas.php";

        }
        //logica para perfil
        else if (
            $ruta == "perfil"
            || $ruta == "actualizacion"

        ) {

            $pagina = "vistas/cliente/sesion/perfil/" . $ruta . ".vistas.php";
        } else if (
            $ruta == "compras"
            || $ruta == "envios"
            

        ) {

            $pagina = "vistas/cliente/pagos/" . $ruta . ".vistas.php";
        }
        //logica para legal
        else if (
            $ruta == "preguntas"
            || $ruta == "Terminos"

        ) {

            $pagina = "vistas/cliente/legal/" . $ruta . ".vistas.php";

        }
        //logica para quienes somos
        else if ($ruta == "quienesomos") {
            $pagina = "vistas/cliente/quienes somos/" . $ruta . ".vistas.php";

        }
        return $pagina;
    }

    //Logica para ADMINISTRADOR

    static public function RutasAdmin($ruta)
    {
        //logica para dashboard
        if ($ruta == "dashboard") {
            $pagina = $ruta . ".vistas.php";
        } else if ($ruta == "indicadores") {
            $pagina = "../indicadores/" . $ruta . ".vistas.php";
        } else if (
            $ruta == "exitosas"
            || $ruta == "historial"
            || $ruta == "pendientes"
        ) {
            $pagina = "../pedidos/" . $ruta . ".vistas.php";
        } else if ($ruta == "crm") {
            $pagina = "../crm/" . $ruta . ".vistas.php";
        } else if (
            $ruta == "activos"
            || $ruta == "crear_productos"
            || $ruta == "ocultos"
            || $ruta == "inactivos"

        ) {
            $pagina = "../productos/" . $ruta . ".vistas.php";
        }





        return $pagina;
    }

}

?>