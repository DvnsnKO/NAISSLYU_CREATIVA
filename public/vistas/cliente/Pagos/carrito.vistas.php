<?php
require_once "./app/controlador/carrito/carrito.controlador.php";



$productosCarrito = CarritoControlador::show();

?>


<form id="pagoForm" action="index.php?ruta=envios
" method="post">

  <div class="row">
    <div class="col-8">
      <div class="form-group">
        <h3><b> Detalle del envío </b></h3><br>
      </div>
      <hr>
      <div class="form-group">
        <label for="products">Productos comprados:</label>
        <?php
        if (isset($_SESSION["carrito"]) && !empty($productosCarrito)) {
          $total = 0;
          foreach ($productosCarrito as $index => $producto) {
            $total += $producto["Precio_uni"];
            echo '<div class="row mb-4 producto" data-precio="' . $producto["Precio_uni"] . '">
                    <div class="col-2 text-center">
                        <img src="./public/images/' . $producto["Nombre"] . '/' . $producto["Imagen"] . '" alt="sin imagen" class="w-25">
                    </div>
                    <div class="col-8">
                        <div class="producto-nombre">' . $producto["Nombre"] . '</div>
                        <div class="row small producto-precio" data-precio="' . $producto["Precio_uni"] . '">$' . $producto["Precio_uni"] . '</div>
                        <div class="col-6" id="pVar">
                            <label class="">Cantidad:</label>
                            <input name="cantidad[' . $index . ']" class="col-6 cantidad-producto" type="number" min="0" max="' . $producto["Cant_disp"] . '"value="1" required>
                        </div>
                    </div>
                    
                    <input type="hidden" name="Nombre_producto[' . $index . ']" value="' . $producto["Nombre"] . '" required>
                    <input type="hidden" name="Precio_unit[' . $index . ']" value="' . $producto["Precio_uni"] . '" required>
                </div>';
          }
        } else {
          echo '<script>
      Swal.fire({
          icon: "question",
          title: "debes agregar productos al carrito ",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
      }).then(function(result){
          if (result.value) {
              window.location.href = " index.php?ruta=destacados";
          }
      });
  </script>';
        }
        ?>
      </div>
      <!-- Hasta aquí los productos agregados -->
      <div class="">
        <label for="productos">Detalles del pago:</label><br>
        <input type="radio" name="pago" id="opcion1" value="opcion1"
          required>&nbsp;&nbsp;Efectivo&nbsp;&nbsp;</input><br>
        <input type="radio" name="pago" id="opcion2" value="opcion2">PSE</input>
        <select name="Pago_digital" id="lang">
          <option value="Nequi">Nequi</option>
          <option value="Daviplata">Daviplata</option>
          <option value="Rappypay">Rappypay</option>
          <option value="Movii">Movii</option>
          <option value="Dale">Dale</option>
          <option value="Bancolombia">Bancolombia</option>
          <option value="Banco BBVA">BancoBBVA</option>
          <option value="Banco Davivienda">Banco Davivienda</option>
        </select>
        <img src="./public/images/pse.png" width="75" height="75">
      </div>
    </div>
    <div class="col-4">
      <div class="card card-header">Resumen de la compra
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Productos</th>
              <td scope="col">
                <?php
                $contador = 0;
                if (isset($_SESSION["carrito"])) {
                  foreach ($productosCarrito as $producto) {
                    $contador++;
                  }
                }
                echo $contador;
                ?>
              </td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Envío</th>
              <td>Acordar con el vendedor</td>
            </tr>
            <tr>
              <th scope="row">Total a pagar</th>
              <td id="total-pagar">$<?php echo $total; ?></td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" name="total" id="total" value="<?php echo $total; ?>">
        <div class="form-group text-center">
          <button class="btn btn-success" name="realizar_pago" type="submit" id="pagar-btn">Realizar pago</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cantidadInputs = document.querySelectorAll('.cantidad-producto');
    const totalPagar = document.getElementById('total-pagar');
    const totalInput = document.getElementById('total');

    function actualizarTotal() {
      let total = 0;
      cantidadInputs.forEach(input => {
        const productoRow = input.closest('.producto');
        const precio = parseFloat(productoRow.getAttribute('data-precio'));
        const cantidad = parseInt(input.value);
        total += precio * cantidad;
      });
      totalPagar.textContent = '$' + total.toFixed(0);
      totalInput.value = total.toFixed(0); // Actualiza el valor del campo oculto
    }

    // Llama a actualizarTotal() al cargar la página
    actualizarTotal();

    cantidadInputs.forEach(input => {
      input.addEventListener('input', actualizarTotal);
    });
  });


</script>



<?php

?>