<?php
// ruta del controlador
require_once './app/controlador/Personas/clientes.controlador.php';
?>
<div class="container">


    <div class="login-logo">
        <h1>Registrate</h1>

    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">


            <form action="#" method="post">
                <div class="input-group mb-3">
                    <label class="col-2" for="cliente_Nombres">Nombre completo:</label>
                    <input type="text" class="form-control" id="cliente_Nombres" name="Nombres" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-2" for="cliente_Correo">Correo</label>
                    <input type="email" class="form-control" id="cliente_Correo" name="Correo" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>


                <div class="input-group mb-3">
                    <label class="col-2" for="cliente_Celular">Celular</label>
                    <input type="number" class="form-control" id="cliente_Celular" name="Celular" maxlength="10"
                        pattern=".{10}" title="El número de celular debe tener exactamente 10 caracteres." required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <label class="col-2" for="cliente_Usuario">Contraseña</label>
                    <input type="password" class="form-control" id="cliente_Usuario" name="Contrasenia" required>
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Registrarme</button>
            </form>
        </div>





        <!-- /.login-card-body -->
    </div>
</div>
</div>

<?php
/**
 * Llamar a la función del controlador: Crear 
 */
$addAdminModel = ClientesControlador::create();

?>