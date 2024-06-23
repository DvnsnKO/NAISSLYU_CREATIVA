<?php
require_once "./app/modelo/Productos/productos.modelo.php";

class ProductoControlador
{
    // Método para recuperar listado de los registros
    static public function index()
    {
        // LLamar al modelo para recuiperar todos los registros de la tabla
        $data = ProductoModel::index();
        return $data;
    }

    static public function create()
    {
        /** Validar que vengan datos en las variables pasadas desde la vista */
        if (
            isset($_POST["Codigo_producto"]) &&
            isset($_POST["Nombre"]) &&
            isset($_POST["Precio_uni"]) &&
            isset($_POST["Descripcion"]) &&
            isset($_POST["Cant_disp"]) &&
            isset($_POST["Lineas_idLineas"])
        ) {
            // Nombre del producto (también será el nombre de la carpeta)
            $productName = $_POST["Nombre"];

            // Directorio específico para este producto
            $baseDir = "./public/images/" . $productName . '/';

            // Crear la carpeta si no existe
            if (!file_exists($baseDir)) {
                mkdir($baseDir, 0777, true); // Se establecen los permisos a 0777 para que sea accesible para todos
            }

            // Verificar si se ha subido un archivo
            if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
                // Obtener la extensión de la imagen
                $imageExtension = strtolower(pathinfo($_FILES['productImage']['name'], PATHINFO_EXTENSION));

                // Nombre de la imagen será el nombre del producto con su extensión original
                $imageName = $productName . '.' . $imageExtension;

                // Ruta completa del archivo destino
                $targetFile = $baseDir . $imageName;

                // Mover el archivo cargado desde el directorio temporal a la carpeta específica
                if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
                    echo "El archivo " . basename($_FILES["productImage"]["name"]) . " ha sido subido como " . $imageName;
                } else {
                    echo "Lo siento, hubo un error al subir tu archivo.";
                    return;
                }
            } else {
                echo "No se ha subido una imagen o hubo un error en la subida.";
                $imageName = null; // O maneja el caso donde no haya imagen subida
            }

            // Construir la ruta completa de la imagen
            $imagePath = $imageName ? $imageName : null;

            // Datos a guardar
            $data = array(
                "Codigo_producto" => $_POST["Codigo_producto"],
                "Nombre" => $_POST["Nombre"],
                "Precio_uni" => $_POST["Precio_uni"],
                "Descripcion" => $_POST["Descripcion"],
                "Cant_disp" => $_POST["Cant_disp"],
                "Lineas_idLineas" => $_POST["Lineas_idLineas"],
                "Imagen" => $imagePath,
            );

            // Ejecutar el metodo create del modelo
            $response = ProductoModel::create($data);

            // Enviar mensaje de registro almacenado con éxito
            if ($response == "Ok") {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Producto creado exitosamente",
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                    }).then(function(result){
                        if (result.value) {
                            window.location.href = "indexadmin.php?rutaadmin=activos";
                        }
                    });
                </script>';
            } else {
                echo "Hubo un error al crear el producto.";
            }
        } else {
            echo "Faltan datos en el formulario.";
        }
    }


    static public function show()
    {

        return $data = ProductoModel::show($_GET["id"]);

    }
    static public function update()
    {


        /** Validar que existan las variables recibidas del formulario */
        if (
            isset($_POST["Codigo_producto"]) &&
            isset($_POST["Nombre"]) &&
            isset($_POST["Precio_uni"]) &&
            isset($_POST["Descripcion"]) &&
            isset($_POST["Cant_disp"]) &&
            isset($_POST["Lineas_idLineas"])




        ) {
            $data = array(
                "Codigo_producto" => $_POST["Codigo_producto"],
                "Nombre" => $_POST["Nombre"],
                "Precio_uni" => $_POST["Precio_uni"],
                "Descripcion" => $_POST["Descripcion"],
                "Cant_disp" => $_POST["Cant_disp"],
                "Lineas_idLineas" => $_POST["Lineas_idLineas"],
                "Estado" => $_POST["Estado"]

            );


            /**Llamar al modelo para actualizar el registro */
            $response = ProductoModel::update($data);

            /** validar la respuesta del modelo  */
            if ($response == "Ok") {

                echo '<script>
    Swal.fire({
        icon: "success",
        title: "El producto ha sido actualizado correctamente.",
        showConfirmButton: true,
        confirmButtonText: "Ok"
    }).then(function(result) {
        if (result.value) {
            /** Redirigir a la página anterior en el historial del navegador */
            window.history.go(-2);
        }
    });
</script>';
            } else {
                echo "ocurrio un error";
            }
        }
    }

    static public function delete()
    {
        //** Valñidar la variable id que exista y contenga un valor no nulo */
        if (isset($_GET["id"])) {

            $response = ProductoModel::delete($_GET["id"]);

            if ($response == "Ok") {

                /** Enviar mensaje de eliminación correcta */
                echo '<script>
                
                    Swal.fire({
                        icon: "success",
                        title: "El producto ha sido eliminado",
                    
                    showConfirmButton: true,
                        confirmButtonText: "Ok"
                        }).then(function(result){
                                    if (result.value) {
                                        /**Redireccionar a la página principal de marcas de producto*/
                                        window.location.href = "indexadmin.php?rutaadmin=activos";
                                    }
                                })
                </script>';
            } else {
                echo '<script>
                
                Swal.fire({
                    icon: "error",
                    title: "La linea no ha sido eliminada",
                
                showConfirmButton: true,
                    confirmButtonText: "Ok"
                    }).then(function(result){
                                if (result.value) {
                                    /**Redireccionar a la página principal de marcas de producto*/
                                    window.location.href = "indexadmin.php?rutaadmin=activos";
                                }
                            })
            </script>';
            }

        }
    }
}
?>