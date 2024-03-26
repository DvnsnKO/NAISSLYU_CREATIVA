<style>
    .contenedor {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        height: 50vh;
        margin: 3%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }
    body {
        padding: 20px;
    }

    form {
        max-width: 300px;
        margin: 0 auto;
    }

    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }

</style>
  


<div class="container col-8">
    <h2>Olvido su contraseña</h2>

    <form action="index.php?ruta=login" method="post" class="col-4">
        <div class="form-group ">
            <label class="contenedor2" for="contrasenia">introduzca el codigo enviado al correo :</label><br>
            <input type="text" id="test" name="test" class="form-control" required><br>
        </div>

        <input type="submit" value="restablecer" class="btn rounded" style=" background-color: purple; color: white; box-shadow: 5px 5px 30px gray; font-size: 20px">
        <p class="mb-1">
      <a href="index.php?ruta=olvidocontrasenia">reenviar codigo</a>
    </p>
       

    </form>
</div>

