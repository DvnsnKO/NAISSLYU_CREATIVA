<?php
require_once "./app/controlador/Personas/sesion.controlador.php";
?>

<div class="container col-4">
    <div class="login-logo">
        <h1>Iniciar Sesión</h1>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="Correo" class="form-control" placeholder="Correo Electrónico" value="da-v-inson@hotmail.com">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="Contrasenia" class="form-control" placeholder="Contraseña" value="Naisslyu1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-block">Acceder</button>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <a class="btn btn-success btn-block" href="index.php?ruta=registro" role="button">Registrarme</a>
                    </div>
                </div>
            </form>
            <div class="col-4 text-center ">
                <div class="icheck-success">
                    <input type="checkbox" id="remember">
                    <label for="remember">Recuérdame</label>
                </div>
            </div>
            <!-- <p class="mb-1">
                <a href="index.php?ruta=recuperarcontrasenia">¿Olvidaste la contraseña?</a>
            </p> -->
        </div>
    </div>
</div>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Llamar a la función del controlador para procesar el formulario
        $login = SesionControlador::Sesion();
    }
?>