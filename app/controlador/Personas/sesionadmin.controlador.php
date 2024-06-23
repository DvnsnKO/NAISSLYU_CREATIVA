<?php



require_once "../../app/modelo/Personas/sesionadmin.modelo.php";


class SesionControlador
{
    
    static public function Sesionadmin()
    {
        if (isset($_POST["Correo"]) && isset($_POST["Contrasenia"])) {
            

            $correo = $_POST["Correo"];
            $contrasenia = $_POST["Contrasenia"];

            $response = SesionModel::verificaradmin($correo, $contrasenia);

            if ($response) {

                $id_persona = $response;

               
                $_SESSION["4dm1n"] = $id_persona;


              
        // Redirigir a la página deseada
       
                
                echo '<script>
                 if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                    
                    Swal.fire({
                        icon: "success",
                        title: "Autenticacion exitosa",                            
                        showConfirmButton: true,
                        confirmButtonText: "ok"
                        }).then(function() {       
                        window.location.href = "../../indexadmin.php?rutaadmin=dashboard";
                        })
				</script>';
                exit();


            } else {
                echo '
                <script>
                           
                Swal.fire({
                    icon: "error",
                    title: "acceso denegado",
                    text: "No tiene suficientes permisos para ingresar",
                    
                    });
                </script>';
            }
            ;



        }
    }
  
  
  

   
}

?>
