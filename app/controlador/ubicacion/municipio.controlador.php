<label class="col-12" for="cliente_Nombres">Direccion:</label>
<label class="col-12" for="cliente_Nombres">Direccion:</label>
<label class="col-12" for="cliente_Nombres">Direccion:</label>
<label class="col-12" for="cliente_Nombres">Direccion:</label>
<label class="col-12" for="cliente_Nombres">Direccion:</label>
<label class="col-12" for="cliente_Nombres">Direccion:</label>
<label class="col-12" for="cliente_Nombres">Direccion:</label>
<label class="col-12" for="cliente_Nombres">Direccion:</label>










<?php
// Imprimir todos los parámetros GET para depurar
print_r($_GET);

// Verificar si el parámetro 'departamento' está definido
if (isset($_GET['departamento'])) {
    $departamentoSeleccionado = $_GET['departamento'];
    // Aquí puedes continuar con tu lógica para manejar el departamento seleccionado
} else {
    echo "El parámetro 'departamento' no está definido en la solicitud.";
}
?>





