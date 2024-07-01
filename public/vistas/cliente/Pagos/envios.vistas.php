<?php
require_once "./app/controlador/carrito/carrito.controlador.php";

if (!isset($_SESSION["usuario"]) ) {
  // Mostrar el script JavaScript solo si no hay sesión iniciada
  echo '<script>
      Swal.fire({
          icon: "question",
          title: "inicia sesion o registrate",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
      }).then(function(result){
          if (result.value) {
              window.location.href = " index.php?ruta=login";
          }
      });
  </script>';
}


$productosCarrito = CarritoControlador::show();

$data = [];

if (isset($_POST["pago"])) {
    if ($_POST["pago"] == "opcion1") {
        $data = [
            "Metodo_pago" => "efectivo"
        ];
    } else if ($_POST["pago"] == "opcion2") {
        $data = [
            "Metodo_pago" => $_POST["Pago_digital"]
        ];
    }
}


// si hay una sesion iniciada me requiere el controlador y posteriormente me evalua si hay una entidad terriorial configurada....
if (isset($_SESSION["usuario"])) {
  require_once "./app/controlador/Personas/personas.controlador.php";

  $showuser = ClientesControlador::show();

  if ($showuser["Entidad_territorial"]) {
    list($departamento, $municipio) = explode('-', $showuser["Entidad_territorial"]);
    // si hay una sesion y no hay entidad territorial seleccionada me trae vacios los campos para que el script funcione
  } else {
    $departamento = "";
    $municipio = "";
  }


}
// si no hay una sesion me trae vacios los campos para que el script funcione
else {
  $departamento = "";
  $municipio = "";

}


?>

<div class="container">
  <form action="" method="post">

    <div class="input-group mb-3">
      <label for="departamentos">Departamentos</label>
      <div class="col-12">
        <select name="departamento" id="departamentos" class="form-control" onchange="actualizarMunicipios()">
          <?php
          // Aquí se generan las opciones del departamento
          $departamentosYmunicipios = []; // Inicialización vacía, debería cargar desde el JSON en JavaScript
          foreach ($departamentosYmunicipios as $depto) {
            $selected = ($depto['departamento'] == $departamento) ? 'selected' : '';
            echo '<option value="' . $depto['departamento'] . '" ' . $selected . '>' . $depto['departamento'] . '</option>';
          }
          ?>
        </select>
      </div>
    </div>
    <div class="input-group mb-3">
      <label for="departamentos">municipios</label>
      <div class="col-12">
        <select name="municipio" id="municipios" class="form-control"></select>
      </div>
    </div>
    <div class="form-group">
    <div class="form-group">
        <label for="nombreCompleto">Nombre Completo</label>
        <input type="text" class="form-control" id="nombreCompleto" value="<?php echo $showuser["Nombres"]; ?>" readonly>
        <input type="hidden" name="personas_Id_persona" value="<?php echo $showuser["Id_persona"]; ?>">
        <input type="hidden" name="total" value="<?php echo $_POST["total"]; ?>">
        <input type="hidden" name="Metodo_pago" value="<?php echo $data["Metodo_pago"]; ?>">
    </div>
    <div class="form-group">
        <label for="numerocelular">Celular</label>
        <input type="number" class="form-control" id="numerocelular" value="<?php echo $showuser["Celular"]; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" class="form-control" id="email" value="<?php echo $showuser["Correo"]; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="Direccion" value="<?php echo $showuser["Direccion"]; ?>">
    </div>

    <!-- Campos ocultos para los detalles del producto -->
    <?php
    
    if (isset($_SESSION["carrito"]) && !empty($productosCarrito)) {
        foreach ($productosCarrito as $index => $producto) {
            if ($_POST["cantidad"][$index]>0){
            echo '<input type="hidden" name="Nombre_producto[' . $index . ']" value="' . $producto["Nombre"] . '">';
            echo '<input type="hidden" name="Cantidad[' . $index . ']" value="' . $_POST["cantidad"][$index] . '">';
            echo '<input type="hidden" name="Precio_unit[' . $index . ']" value="' . $_POST["Precio_unit"][$index] . '">';
        }}
    }
    ?>

    <!-- Botón para realizar el pago -->
    <button type="submit" class="btn btn-success">Realizar pago</button>
</form>
      

</div>
<script>
    let departamentosYmunicipios = [];

    document.addEventListener('DOMContentLoaded', (event) => {
        fetch('./public/dist/colombia.json') // URL del archivo JSON en tu servidor local
            .then(response => response.json())
            .then(data => {
                departamentosYmunicipios = data;

                const selectDepartamentos = document.getElementById('departamentos');
                const departamentoSeleccionado = '<?php echo $departamento; ?>'; // Valor de PHP

                let departamentoEncontrado = false;

                for (let departamentoObj of departamentosYmunicipios) {
                    let option = document.createElement('option');
                    option.value = departamentoObj.departamento;
                    option.textContent = departamentoObj.departamento;

                    if (departamentoObj.departamento === departamentoSeleccionado) {
                        option.selected = true; // Marcar la opción como seleccionada si coincide
                        departamentoEncontrado = true;
                    }

                    selectDepartamentos.appendChild(option);
                }

                // Si no se encontró el departamento seleccionado o departamentoSeleccionado está vacío, seleccionar uno al azar
                if (!departamentoEncontrado || departamentoSeleccionado.trim() === '') {
                    const randomIndex = Math.floor(Math.random() * departamentosYmunicipios.length);
                    let randomDepartamento = departamentosYmunicipios[randomIndex].departamento;

                    // Buscar la primera opción y marcarla como seleccionada si no se encontró el departamento seleccionado
                    if (selectDepartamentos.options.length > 0) {
                        selectDepartamentos.options[0].selected = true;
                    }
                }
                actualizarMunicipios(); // Inicializar municipios al cargar la página
            })
            .catch(error => console.error('Error al cargar el archivo JSON:', error));
    });

    function actualizarMunicipios() {
        const selectDepartamentos = document.getElementById('departamentos');
        const selectMunicipios = document.getElementById('municipios');
        const departamentoSeleccionado = selectDepartamentos.value;

        // Limpiar el select de municipios
        selectMunicipios.innerHTML = '';
 
        const departamentoObj = departamentosYmunicipios.find(dep => dep.departamento === departamentoSeleccionado);

        if (departamentoObj) {
            const municipios = departamentoObj.ciudades;
            const ciudadSeleccionado = '<?php echo $municipio; ?>'; // Valor de PHP
            for (let municipio of municipios) {
                let option = document.createElement('option');
                option.value = municipio;
                option.textContent = municipio;

                if (municipio === ciudadSeleccionado) {
                    option.selected = true; // Marcar la opción como seleccionada si coincide
                }
                selectMunicipios.appendChild(option);
            }
        }
    }
</script>

<?php

if (isset($_POST["Direccion"])){

require_once "./app/controlador/carrito/carrito.controlador.php";


$datoscompra= CarritoControlador::create ();
}
?>