<?php

require_once  "./app/modelo/Personas/sesion.modelo.php";


class SesionControlador
{
    static public function Sesion()
    {
        if (isset($_POST["Correo"]) && isset($_POST["Contrasenia"])) {
            $correo = $_POST["Correo"];
            $contrasenia = $_POST["Contrasenia"];

            $response = SesionModel::verificarCredenciales($correo, $contrasenia);

            if ($response) {

                $id_persona = $response;

               
                $_SESSION["usuario"] = $id_persona;

                
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
                        window.location.href = "index.php?ruta=perfil";
                        })
				</script>';


            } else {
                echo '
                <script>
                           
                Swal.fire({
                    icon: "error",
                    title: "Intente Nuevamente",
                    text: "Usuario y/o contraseña incorrectos",
                    footer: \'<a href="index.php?ruta=recuperarcontrasenia">Olvidaste la contraseña?</a>\'
                    });
                </script>';
            }
            ;



        }
    }

   
  
  

   
}

?>
