
<?php



require_once './app/controlador/Personas/personas.controlador.php';

/* Consultar el registro por medio del id pasado por la url */
$showuser = ClientesControlador::show();

?>

<div class="container">
<h1 style="font-size: 3rem; font-weight: bold;">vuelve pronto <?php echo $showuser["Nombres"];?></h1>
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <script>

let timerInterval;
Swal.fire({
  title: "Cerrando sesion!",
  html: "<b></b> milliseconds.",
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    window.location.href = 'index.php?ruta=login';
  }
});


        
        
    </script>
    
</div>
<?php
// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();
?>


