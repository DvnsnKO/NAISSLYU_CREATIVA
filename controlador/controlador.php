<?php


    class RutasControlador
    {
        /** Funcion  que arnma las rutas del menú */
        public function Rutas(){

            if(isset($_GET["ruta"])){
                $ruta = $_GET["ruta"];
            }
           
            else{
                $ruta = "destacados";
            }

            /** LLamar al modelo para armar la ruta */
            $rutacliente = RutasModelo::RutasModelo($ruta);
            //vistas

            include $rutacliente;

        }
        public function RutasAdmin(){

            if(isset($_GET["ruta"])){
                $ruta = $_GET["ruta"];
            }
            else{
                $ruta = "dashboard";
            }

            /** LLamar al modelo para armar la ruta */
            $rutaadmin = RutasModelo::RutasAdmin($ruta);
            //vistas

            include $rutaadmin;

        }
        
    }

?>