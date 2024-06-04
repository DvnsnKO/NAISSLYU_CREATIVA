<?php
/* Arma las vistas del ADMIN */
require "./app/controlador/vistas/vistas_admin.controlador.php";
require "./app/modelo/vistas/vistas_admin.modelo.php";

include('./public/vistas/admin/plantillas/admin.header.vistas.php');
include('./public/vistas/admin/plantillas/admin.menu.vistas.php');
include('./public/vistas/admin/plantillas/admin.menu.vistas.php');
$rutas = new RutasControlador();
$rutas->RutasAdmin();

include('./public/vistas/admin/plantillas/admin.footer.vistas.php');
?>