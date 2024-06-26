
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
