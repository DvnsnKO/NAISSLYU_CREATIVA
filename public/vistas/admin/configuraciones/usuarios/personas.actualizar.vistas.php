<?php
// rutaadmin del controlador
require_once './app/controlador/configuraciones/usuarios/usuarios.controlador.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <h2>Editar Usuario</h2>
        <form action="" method="post">
            <div class="row">


                <?php
                /* Consultar el registro por medio del id pasado por la url */
                $showpersona = UsuariosControlador::show();

                echo '
                
                <div class="col-6 form-group green-box">
                <label for="admin_">Id</label>
                <input type="text" class="form-control" id="Id_persona" name="Id_persona" value="' . $showpersona["Id_persona"] . '"readonly>
            </div>
                <div class="col-6 form-group green-box">
    <label for="admin_">Nombre completo:</label>
    <input type="text" class="form-control" id="Nombres" name="Nombres" value="' . $showpersona["Nombres"] . '">
</div>


<div class="col-6 form-group green-box">
    <label for="admin_Celular">Correo</label>
    <input type="email" class="form-control" id="Correo" name="Correo" value="' . $showpersona["Correo"] . '">
</div>
<div class="col-6 form-group green-box">
    <label for="admin_Celular">Celular</label>
    <input type="number" class="form-control" id="Celular" name="Celular" maxlength="10" value="' . $showpersona["Celular"] . '"
        pattern=".{10}" title="El número de celular debe tener exactamente 10 caracteres." >
</div>
<div class="col-6 form-group green-box">
    <label for="admin_Celular">Contraseña</label>
    <input type="password" class="form-control" id="Contrasenia" name="Contrasenia" value="' . $showpersona["Contrasenia"] . '">
</div>
<div class="col-6 form-group green-box">
    <label for="">Rol</label>

    <select class="custom-select" name="Rol" id="Rol">
        <option value="Admin">Administrador</option>
        <option selected value="Cliente">Cliente</option>
    </select>
    
    
    
</div>
</div>' ?>

                <button type="submit" class="btn btn-success">actualizar</button>
        </form>
    </div>
    <?php
    /**
     * Llamar a la función del controlador: Crear 
     */
    $addusuarioModel = UsuariosControlador::update();

    ?>