<?php
require_once "./app/controlador/Personas/personas.controlador.php";
// Obtener los datos del usuario
$showuser = ClientesControlador::show();

// Separar la entidad territorial en departamento y municipio
if ($showuser["Entidad_territorial"]) {
    list($departamento, $municipio) = explode('-', $showuser["Entidad_territorial"]);
    
}else{
    $departamento = "";
    $municipio = "";

}

// Acción de actualización al enviar el formulario
if (isset($_POST['Datos'])) {
    $update = ClientesControlador::update();
}
?>

<div class="container mb-1">
    <h1 style="font-size: 3rem; font-weight: bold;">Actualizar</h1>

    <form action="#" method="post">
        <section class="content">
            <div class="card">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card card-body" style="height: 300px;">
                                <div class="input-group mb-3">
                                    <label class="col-4" for="cliente_Nombres">Nombre completo:</label>
                                    <input type="text" class="form-control" id="cliente_Nombres" name="Nombres"
                                        value="<?php echo $showuser["Nombres"]; ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4" for="cliente_Correo">Correo</label>
                                    <input type="email" class="form-control" id="cliente_Correo" name="Correo"
                                        value="<?php echo $showuser["Correo"]; ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4" for="cliente_Celular">Celular</label>
                                    <input type="number" class="form-control" id="cliente_Celular" name="Celular"
                                        value="<?php echo $showuser["Celular"]; ?>" maxlength="10" pattern=".{10}"
                                        title="El número de celular debe tener exactamente 10 caracteres." required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">

                                    <select class="col-2 form-control" name="Tipo_Id" required>
                                        <?php
                                        $opciones = array("CC", "CE", "PAS", "NIT", "RUT");
                                        foreach ($opciones as $opcion) {
                                            if ($opcion == $showuser["Tipo_Id"]) {
                                                echo '<option selected value="' . $showuser["Tipo_Id"] . '">' . $showuser["Tipo_Id"] . '</option>';
                                            } else {
                                                echo '<option value="' . $opcion . '">' . $opcion . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label class="col-2"></label>


                                    <input type="number" class="form-control col-8" id="N_Id" name="N_Id"
                                        value="<?php echo $showuser["N_Id"]; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card card-body" style="height: 300px;">
                                <div class="input-group mb-3">
                                    <label class="col-12" for="Direccion">Dirección:</label>
                                    <input type="text" class="form-control" name="Direccion"
                                        value="<?php echo $showuser["Direccion"]; ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-3" for="departamento">Departamento</label>
                                    <div class="col-9">
                                        <select name="departamento" id="departamentos" class="form-control"
                                            onchange="actualizarMunicipios()">
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
                                    <label class="col-3" for="municipio">Municipio</label>
                                    <div class="col-9">
                                        <select name="municipio" id="municipios" class="form-control"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-12">
            <button type="submit"  name="Datos" class="btn btn-success btn-block">Actualizar datos</button>
        </div>

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