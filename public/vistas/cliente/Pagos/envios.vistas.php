<div class="container">
<form action="index.php?ruta=compras" method="post">
  
  <div class="form-group">
    <label for="departamento">Departamento</label>
    <select class="form-control" id="departamento">
      <option value="">Seleccione un departamento</option>
      
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