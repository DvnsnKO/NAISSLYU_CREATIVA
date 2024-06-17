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
        "Activo" => 1,     

        //se establece por defecto que todas las personas registradas tendran este rol
        
        "Rol" => "Cliente",
        
        
      );          
      



      // Ejecutar el metodo create del modelo
      $respuesta= PersonasModel::create($data);

      //eNVIAR MENSAJE DE REGISTRO ALMACENADO CON ÉXITO
      if ($respuesta == "Ok") {
        
        
        
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

      } 
    }

  }
  static public function show()
  {
    $id_usuario = $_SESSION["usuario"];

    return $data = PersonasModel::show($id_usuario);

  }
  static public function update()
  {
    


    /** Validar que existan las variables recibidas del formulario */
    
      $data = array(
        "Nombres" => $_POST["Nombres"],
        "Correo" => $_POST["Correo"],
        "Celular" => $_POST["Celular"],
        "Tipo_Id" => $_POST["Tipo_Id"],
        "N_Id" => $_POST["N_Id"],    
        "Entidad_territorial" => $_POST["departamento"]."-".$_POST["municipio"],     
        "Direccion" => $_POST["Direccion"],
        "Id_persona" => $_SESSION["usuario"] 
      );
      
       
      /**Llamar al modelo para actualizar el registro */
      $response = PersonasModel::update($data);

      /** validar la respuesta del modelo  */
      if ($response == "Ok") {

        echo '<script>
                    
                            Swal.fire({
                                icon: "success",
                                title: "actualizacion procesada.",
                            
                               showConfirmButton: true,
                                confirmButtonText: "Ok"
                                }).then(function(result){
                                            if (result.value) {
                                                /**Redireccionar a la página principal de categorias de producto */
                                                window.location.href = "index.php?ruta=actualizacion";
                                            }
                                        })
					</script>';
      } else {
        echo "ocurrio un error";
      }
    
   }
  }
  



?>



