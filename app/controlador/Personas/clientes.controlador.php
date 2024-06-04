<?php
/*Creado para que los usuarios se registren desde el lado del cliente Vista cliente-registrarme
 */

require_once "./app/modelo/Personas/personas.modelo.php";

class ClientesControlador
{


  static public function create()
  {
   
 
    
    /** Validar que vengan datos en las variables pasadas desde la vista */
    if (
      isset($_POST["Nombres"])
      && isset($_POST["Correo"])
      && isset($_POST["Celular"])
      && isset($_POST["Contrasenia"])
     
     

    ) {
      $data = array(
        
        "Nombres" => $_POST["Nombres"],
        "Correo" => $_POST["Correo"],
        "Celular" => $_POST["Celular"],    
        "Contrasenia" => $_POST["Contrasenia"],     

        //se establece por defecto que todas las personas registradas tendran este rol
        
        "Rol" => "Cliente",
        
        
      );   
        
      



      // Ejecutar el metodo create del modelo
      $respuesta= PersonasModel::create($data);

      //eNVIAR MENSAJE DE REGISTRO ALMACENADO CON ÉXITO
      if ($respuesta == "Ok") {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";       
        
        
        echo '<script>
                   
            Swal.fire({
              icon: "success",
              title: "Usuario creado exitosamente",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de productos */
                              window.location.href = "index.php?ruta=login";
                          }
                      });
          </script>';

      } else {
        echo "error controlador";
      }
    }

  }


}



