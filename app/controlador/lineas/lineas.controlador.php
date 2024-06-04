<?php
/*administra las lineas por parte del administrador
 */
require_once "./app/modelo/lineas/lineas.modelo.php";

class LineasControlador
{





  // Método para recuperar listado de los registros
  static public function index()
  {

    // LLamar al modelo para recuiperar todos los registros de la tabla
    $data = lineasModel::index();
    return $data;
  }
  /*static public function index()
    {
      $data = ProductoModel::index();
      return  $data;
      
    };*/
  static public function create()
  {

    /** Validar que vengan datos en las variables pasadas desde la vista */
    if (
      isset($_POST["Nombre_linea"])



    ) {
      $data = $_POST["Nombre_linea"];





      // Ejecutar el metodo create del modelo
      $response = LineasModel::create($data);

      //eNVIAR MENSAJE DE REGISTRO ALMACENADO CON ÉXITO
      if ($response == "Ok") {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo '<script>
                   
            Swal.fire({
              icon: "success",
              title: "linea creado exitosamente",
          
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
              }).then(function(result){
                          if (result.value) {
                              /**Redireccionar a la página principal de productos */
                              window.location.href = "indexadmin.php?rutaadmin=lineas";
                          }
                      });
          </script>';

      } else {
        echo "error controlador";
      }
    }

  }
  static public function show()
  {

    return $data = LineasModel::show($_GET["id"]);

  }
  static public function update()
  {


    /** Validar que existan las variables recibidas del formulario */
    if (
      isset($_POST["Nombre_linea"])||
      isset($_POST["estado"])




    ) {
      $data = array(
        "idLineas" => $_POST["idLineas"],
        "Nombre_linea" => $_POST["Nombre_linea"],
        "estado" => $_POST["estado"],
        );


      /**Llamar al modelo para actualizar el registro */
      $response = LineasModel::update($data);

      /** validar la respuesta del modelo  */
      if ($response == "Ok") {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo '<script>
                    
                            Swal.fire({
                                icon: "success",
                                title: "La linea  de producto ha sido actualizada de forma correcta.",
                            
                               showConfirmButton: true,
                                confirmButtonText: "Ok"
                                }).then(function(result){
                                            if (result.value) {
                                                /**Redireccionar a la página principal de categorias de producto */
                                                window.location.href = "indexadmin.php?rutaadmin=lineas";
                                            }
                                        })
					</script>';
      } else {
        echo "ocurrio un error";
      }
    }
  }
}






