<!-- Arma lo que se muestra en la ventana de inicio  -->

<?php





if (isset($_GET["ruta"])) {
    require "./app/controlador/vistas/vistas_cliente.controlador.php";
require "./app/modelo/vistas/vistas_cliente.modelo.php";
    include('./public/vistas/cliente/header.vistas.php');
    include('./public/vistas/cliente/anuncios.vistas.php');
    include('./public/vistas/cliente/subheader.vistas.php');
    $rutas = new RutasControlador();
    $rutas->Rutas();
    include('./public/vistas/cliente/footer.vistas.php');

} 
/* Se cambio la "ruta" para que no contenga nada al principio y ejecute la ventana de OPCIONES.PHP 
que enruta a las vistas del admin y cliente */
else {
    
    include_once('opciones.php');

} 



?>