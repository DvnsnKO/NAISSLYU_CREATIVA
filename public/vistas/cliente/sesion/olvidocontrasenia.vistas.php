<div class="container mb-3">
    <h2>Recuperar Contraseña</h2>

    <form action="index.php?ruta=login" method="post">
        <div class="form-group">
            <label  for="contrasenia">introduzca el codigo enviado al correo :</label><br>
            <input type="text" id="test" name="test" class="form-control" required><br>
        </div>

        <input type="submit" value="Restablecer" class="btn btn-success">
        <p class="mb-1">
      <a href="index.php?ruta=olvidocontrasenia">reenviar codigo</a>
    </p>
       

    </form>
