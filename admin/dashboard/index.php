<?php

require "../../controlador/controlador.php";
require "../../modelo/modelo.php";

include('../plantillas/admin.header.vistas.php');
include('../plantillas/admin.menu.vistas.php');
include('../plantillas/admin.menu.vistas.php');
$rutas = new RutasControlador();
$rutas->RutasAdmin();

include('../plantillas/admin.footer.vistas.php');
?>