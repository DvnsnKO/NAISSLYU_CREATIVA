
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
      && isset($_POST["Departamento"])
      && isset($_POST["Direccion"])
       && isset($_POST["Rol"])
       && isset($_POST["Activo"])
    ) {
      $data = array(
        
        "Nombres" => $_POST["Nombres"],
        "Correo" => $_POST["Correo"],
        "Celular" => $_POST["Celular"],    
        "Contrasenia" => $_POST["Contrasenia"],     
         
        "Rol" => $_POST["Rol"], 
        "Activo" => 1,
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
      }
    }

  }
  static public function show()
  {

    return $data = usuariosModel::show($_GET["id"]);

  }
  static public function update()
  {


    /** Validar que existan las variables recibidas del formulario */
    if (
      isset($_POST["Nombres"])|| 
      isset($_POST["Correo"]) ||
      isset($_POST["Id_persona"]) || // Asegúrate de que esta variable esté incluida en la condición
      isset($_POST["Celular"]) ||
      isset($_POST["Contrasenia"]) ||
      isset($_POST["Rol"])
  ) {
      $data = array(
          "Nombres" => $_POST["Nombres"],
          "Correo" => $_POST["Correo"],
          "Id_persona" => $_POST["Id_persona"],
          "Celular" => $_POST["Celular"],
          "Contrasenia" => $_POST["Contrasenia"],
          "Rol" => $_POST["Rol"],
      );
      /**Llamar al modelo para actualizar el registro */
      $response = usuariosModel::update($data);

      /** validar la respuesta del modelo  */
      if ($response == "Ok") {
        
        echo '<script>
                    
                            Swal.fire({
                                icon: "success",
                                title: "los datos de la persona  han sido actualizados de forma correcta.",
                            
                               showConfirmButton: true,
                                confirmButtonText: "Ok"
                                }).then(function(result){
                                            if (result.value) {
                                                /**Redireccionar a la página principal de categorias de producto */
                                                window.location.href = "indexadmin.php?rutaadmin=usuarios";
                                            }
                                        })
					</script>';
      } else {
        echo "ocurrio un error";
      }
    }
  }
  static public function delete() {
    //** Valñidar la variable id que exista y contenga un valor no nulo */
    if(isset($_GET["id"]))
    {

        $response = usuariosModel::delete($_GET["id"]);

        if($response == "Ok" )
            {
            
                /** Enviar mensaje de eliminación correcta */
                echo '<script>
                
                    Swal.fire({
                        icon: "success",
                        title: "La Linea ha sido eliminada.",
                    
                    showConfirmButton: true,
                        confirmButtonText: "Ok"
                        }).then(function(result){
                                    if (result.value) {
                                        /**Redireccionar a la página principal de marcas de producto*/
                                        window.location.href = "indexadmin.php?rutaadmin=lineas";
                                    }
                                })
                </script>';
            }
            else
            {
                echo "error";
            }

    }
}
}



