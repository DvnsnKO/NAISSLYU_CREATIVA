<?php
// rutaadmin del controlador
require_once './app/controlador/configuraciones/usuarios/usuarios.controlador.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <h2>Agregar Usuario</h2>
        <form action="" method="post">
            <div class="row">





                <div class="col-12 form-group green-box">
                    <label for="admin_">Nombre completo:</label>
                    <input type="text" class="form-control" id="admin_Nombres" name="Nombres" required>
                </div>


                <div class="col-6 form-group green-box">
                    <label for="admin_Celular">Correo</label>
                    <input type="email" class="form-control" id="admin_Celular" name="Correo" required>
                </div>
                <div class="col-6 form-group green-box">
                    <label for="admin_Celular">Celular</label>
                    <input type="number" class="form-control" id="admin_Celular" name="Celular" maxlength="10"
                        pattern=".{10}" title="El número de celular debe tener exactamente 10 caracteres." required>
                </div>
                <div class="col-6 form-group green-box">
                    <label for="admin_Celular">Contraseña</label>
                    <input type="Password" class="form-control" id="password" name="Contrasenia" required>
                </div>
                <div class="col-6 form-group green-box">
                <label for="">Rol</label>

                    <select class="custom-select" name="Rol" id="">                        
                        <option value="Admin">Administrador</option>
                        <option  selected value="Cliente">Cliente</option>

                    </select>
                </div>
            </div>






            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <?php
    /**
     * Llamar a la función del controlador: Crear 
     */
    $addusuarioModel = UsuariosControlador::create();

    ?>