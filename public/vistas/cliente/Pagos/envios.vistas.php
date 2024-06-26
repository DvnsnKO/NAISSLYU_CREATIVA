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
