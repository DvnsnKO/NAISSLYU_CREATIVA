<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container">
    <h1 style="font-size: 3rem; font-weight: bold;">Hasta pronto </h1>
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
          window.location.href = 'index.php?ruta=destacados';
        }
      });




    </script>


  </div>
</div>
<?php


session_unset();
session_destroy();

// Evitar que la página se almacene en caché


// Redirigir al usuario a una página de confirmación o a la página de inicio

exit();
?>