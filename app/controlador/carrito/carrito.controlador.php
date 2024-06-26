<?php
// Iniciar la sesión para manejar variables de sesión y cookies
session_start();

// Verificar que se recibió un ID de producto válido
if (isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];

    // Función para agregar un producto al carrito usando cookies
    function agregarProductoAlCarrito($producto_id) {
        // Verificar si ya existe una cookie de carrito para este usuario
        if (!isset($_COOKIE['carrito'])) {
            // Si no existe, inicializar el carrito como un arreglo vacío
            $carrito = [];
        } else {
            // Si ya existe, recuperar el contenido de la cookie y decodificarlo
            $carrito = json_decode($_COOKIE['carrito'], true);
        }

        // Verificar si el producto ya está en el carrito y aumentar la cantidad
        if (isset($carrito[$producto_id])) {
            $carrito[$producto_id]['cantidad']++;
        } else {
            // Si no está en el carrito, agregarlo con cantidad inicial 1
            $carrito[$producto_id] = [
                'producto_id' => $producto_id,
                'cantidad' => 1
                // Aquí podrías agregar más detalles del producto si lo necesitas
            ];
        }

        // Codificar el carrito como JSON y establecer la cookie con duración de 30 días
        setcookie('carrito', json_encode($carrito), time() + (86400 * 30), '/');

        // Opcional: También podrías guardar el carrito en una sesión de PHP para uso inmediato
        $_SESSION['carrito'] = $carrito;
    }

    // Llamar a la función para agregar el producto al carrito
    agregarProductoAlCarrito($producto_id);

    // Redireccionar al usuario de regreso a la página de productos o a donde sea necesario
    header('Location: productos.php');
    exit;
}
?>
