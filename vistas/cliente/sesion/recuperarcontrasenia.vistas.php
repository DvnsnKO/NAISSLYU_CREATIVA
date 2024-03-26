<style>
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


<div class="container">
    <h2>Recuperar Contraseña</h2>

    <form action="index.php?ruta=olvidocontrasenia" method="post">
        <div class="form-group">
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="email" class="form-control" required><br>
        </div>

        <input type="submit" value="Recuperar Contraseña" class="btn btn-primary">
    </form>
</div>