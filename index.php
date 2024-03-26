<?php


require "./controlador/controlador.php";
require "./modelo/modelo.php";


if (isset($_GET["ruta"])) {
    include('./vistas/cliente/header.vistas.php');
    include('./vistas/cliente/anuncios.vistas.php');
    include('./vistas/cliente/subheader.vistas.php');
    $rutas = new RutasControlador();
    $rutas->Rutas();
    include('./vistas/cliente/footer.vistas.php');

} else {
    
    include_once('menuinicio.vistas.php');

} 











//poner controlador aqui




?>