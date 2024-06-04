
<?php
 /*Creado para modificar los datos de los usuarios por parte del administrados
 El Admin podra modificar todos los datos, incluyendo la contraseña*/

require_once "./app/modelo/configuraciones/usuarios/usuarios.modelo.php";

class UsuariosControlador
{

  // Método para recuperar listado de los registros
  static public function index()
  {

    // LLamar al modelo para recuiperar todos los registros de la tabla
    $data = usuariosModel::index();
    return $data;
  }
 
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
        "Rol" => $_POST["Rol"],       
        
      );



      // Ejecutar el metodo create del modelo
      $respuesta= usuariosModel::create($data);

      //eNVIAR MENSAJE DE REGISTRO ALMACENADO CON ÉXITO
      if ($respuesta == "Ok") {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";       
        
        
        echo '<script>
                   
            Swal.fire({
              icon: "success",
              title: "usuario creado exitosamente",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de productos */
                              window.location.href = "indexadmin.php?rutaadmin=usuarios";
                          }
                      });
          </script>';

      } else {
        echo "error controlador";
      }
    }

  }


}



