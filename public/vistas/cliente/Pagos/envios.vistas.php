<div class="container">
  <form action="index.php?ruta=compras" method="post">

    <div class="form-group">
      <label for="departamento">Departamento</label>
      <select class="form-control" id="departamento" onchange="actualizarMunicipios()">
        <?php
        // Aquí se generan las opciones del departamento
        $departamentosYmunicipios = []; // Inicialización vacía, debería cargar desde el JSON en JavaScript
        foreach ($departamentosYmunicipios as $depto) {
          $selected = ($depto['departamento'] == $departamento) ? 'selected' : '';
          echo '<option value="' . $depto['departamento'] . '" ' . $selected . '>' . $depto['departamento'] . '</option>';
        }
        ?>
        <!-- Agrega más opciones según los departamentos de Colombia -->
      </select>
    </div>
    <div class="form-group">
      <label for="ciudad">Ciudad</label>
      <select class="form-control" id="ciudad">
        <option value="">Seleccione una ciudad</option>
        <!-- Agrega las ciudades de acuerdo al departamento seleccionado -->
      </select>
    </div>
    <div class="form-group">
      <label for="nombreCompleto">Nombre Completo</label>
      <input type="text" class="form-control" id="nombreCompleto" placeholder="Nombre de quien recibe">
    </div>
    <div class="form-group">
      <label for="nombreCompleto">Celular</label>
      <input type="number" class="form-control" id="numerocelular" placeholder="Celular">
    </div>
    <div class="form-group">
      <label for="nombreCompleto">correo</label>
      <input type="email" class="form-control" id="email" placeholder="Correo">
    </div>
    <div class="form-group">
      <label for="nombreCompleto">Direccion</label>
      <input type="text" class="form-control" id="direccion" placeholder="direccion">
    </div>
    <div class="form-group">
      <label for="nombreCompleto">Descrpcion de la vivienda</label>
      <textarea type="textarea" class="form-control" id="descripcion" placeholder="descripcion"></textarea>
    </div>
    <button type="submit" class="btn btn-success">siguiente</button>
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