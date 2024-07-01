<?php
require_once "./app/modelo/carrito/carrito.modelo.php";

class CarritoControlador
{

    public static function show()
    {
        if (isset($_SESSION["carrito"]) && is_array($_SESSION["carrito"]) && !empty($_SESSION["carrito"])) {
            $data = []; // Inicializar el array para almacenar los datos de los productos

            // Recorrer los productos en el carrito y obtener información del modelo
            foreach ($_SESSION["carrito"] as $codigoProducto) {
                $producto = CarritoModel::show($codigoProducto);
                if ($producto !== null) {
                    $data[] = $producto; // Añadir los datos del producto al array $data
                }
            }
            return $data;

            // Aquí podrías hacer algo con $data, como pasarlo a la vista o procesarlo más

            // Por ejemplo, aquí simplemente lo vamos a imprimir
        } else {
            return "El carrito está vacío."; // Mensaje si el carrito está vacío
        }
    }



    static public function create() {
        // Validar que vengan datos en las variables pasadas desde la vista
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $valorAleatorio = '';
        for ($i = 0; $i < 15; $i++) {
            $valorAleatorio .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }    
    
        $data["id_transaccion"] = $valorAleatorio;
        $data["Metodo_pago"] = $_POST["Metodo_pago"];
        $data["Total_factura"] = $_POST["total"];     
        $data["Estado_envio"] = 0;
        $data["Estado_pago"] = 0;
        $data["Ciudad"] = $_POST["departamento"] . "-" . $_POST["municipio"];
        $data["Direccion"] = $_POST["Direccion"];
        $data["personas_Id_persona"] = $_POST["personas_Id_persona"];
    
        // Ejecutar el método create del modelo para la tabla facturas
        $facturaId = CarritoModel::create($data);

        var_dump($facturaId);
    
        if ($facturaId) {
            // Insertar los detalles de la factura
            foreach ($_POST['Nombre_producto'] as $index => $nombreProducto) {
                // Calcular el monto pagado
                $montoPagado = $_POST['Cantidad'][$index] * $_POST['Precio_unit'][$index];
        
                // Crear array con los datos del detalle
                $detalleData = [
                    "Facturas_Id_Facturas" => $facturaId,
                    "Nombre_producto" => $nombreProducto,
                    "Cantidad" => $_POST['Cantidad'][$index],
                    "Precio_unit" => $_POST['Precio_unit'][$index],
                    "Valor_pagado" => $montoPagado  // Nuevo campo calculado
                ];
        
                // Llamar al método para crear el detalle de la factura
                CarritoModel::createDetalle($detalleData);
            }
    
           
            echo '<script>
                Swal.fire({
                  icon: "success",
                  title: "Pedido creado con éxito",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                }).then(function(result){
                    if (result.value) {
                        window.location.href = "index.php?ruta=perfil";
                    }
                });
            </script>';
            unset($_SESSION['carrito']);
        } else {
            // Manejar el caso en que la creación de la factura falle
            echo "Error al crear la factura.";
        }
    }


}
?>