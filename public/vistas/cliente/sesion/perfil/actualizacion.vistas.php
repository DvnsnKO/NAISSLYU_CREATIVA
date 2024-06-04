<div class="container mb-1">
    <h1 style="font-size: 3rem; font-weight: bold;">Actualizar</h1>
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="card  ">


            <div class="row align-items-center  ">
                <div class="col-sm-6  ">
                    <div class="card ">
                        <div class="card card-body  " style="height: 300px;">



                            <form action="#" method="post">
                                <div class="input-group mb-3">
                                    <label class="col-4" for="cliente_Nombres">Nombre completo:</label>
                                    <input type="text" class="form-control" id="cliente_Nombres" name="Nombres"
                                        required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-4" for="cliente_Correo">Correo</label>
                                    <input type="email" class="form-control" id="cliente_Correo" name="Correo" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="input-group mb-3">
                                    <label class="col-4" for="cliente_Celular">Celular</label>
                                    <input type="number" class="form-control" id="cliente_Celular" name="Celular"
                                        maxlength="10" pattern=".{10}"
                                        title="El número de celular debe tener exactamente 10 caracteres." required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="input-group mb-3">
                                    <select class="col-4" name="Tipo_Id" id="">
                                        <option value="CC" selected>CC</option>
                                        <option value="CE">CE</option>
                                        <option value="PAS">PASAPORTE</option>
                                        <option value="NIT">NIT</option>
                                        <option value="RUT">RUT</option>
                                    </select>
                                    <input type="number" class="form-control " id="N_Id" name="N_Id" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="far fa-address-card"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="col-4" for="cliente_Usuario">Contraseña</label>
                                    <input type="password" class="form-control" id="cliente_Usuario" name="Contrasenia"
                                        required>
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Actualizar datos</button>
                            </form>


                        </div>
                    </div>
                </div>

                <div class="col-sm-6  ">
                    <div class="card ">
                        <div class="card card-body  " style="height: 300px;">

                            <form action="#" method="post">
                                <div class="input-group mb-3">
                                    <label class="col-12" for="cliente_Nombres">Direccion:</label>
                                    <input type="text" class="form-control" id="cliente_Nombres" name="Nombres"
                                        required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-3" for="departamento">Departamento</label>
                                    <div class="col-9">
                                        <div id="departamento">
                                            <select name="departamento" id="departamentos"
                                                onchange="actualizarMunicipios()"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="col-3" for="municipio">Municipio</label>
                                    <div class="col-9">
                                        <div id="municipio">
                                            <select name="municipio" id="municipios"></select>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    let departamentosYmunicipios = [];

                                    document.addEventListener('DOMContentLoaded', (event) => {
                                        fetch('./public/dist/colombia.json') // URL del archivo JSON en tu servidor local
                                            .then(response => response.json())
                                            .then(data => {
                                                departamentosYmunicipios = data;

                                                const selectDepartamentos = document.getElementById('departamentos');
                                                for (let departamentoObj of departamentosYmunicipios) {
                                                    let option = document.createElement('option');
                                                    option.value = departamentoObj.departamento;
                                                    option.textContent = departamentoObj.departamento;
                                                    selectDepartamentos.appendChild(option);
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
                                            for (let municipio of municipios) {
                                                let option = document.createElement('option');
                                                option.value = municipio;
                                                option.textContent = municipio;
                                                selectMunicipios.appendChild(option);
                                            }
                                            // Seleccionar el primer municipio automáticamente
                                            if (municipios.length > 0) {
                                                selectMunicipios.value = municipios[0];
                                            }
                                        }
                                    }
                                </script>




                                <div class="text-end"> <!-- Agrega esta clase para alinear el botón a la derecha -->
                                    <button type="submit" class="btn btn-success">Actualizar Direccion</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
</div>