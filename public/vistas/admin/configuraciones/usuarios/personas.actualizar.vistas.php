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

                echo '<div class="col-6 form-group green-box">
    <label for="admin_">Nombre completo:</label>
    <input type="text" class="form-control" id="admin_Nombres" name="Nombres" value="' . $showpersona["Nombres"] . '">
</div>


<div class="col-6 form-group green-box">
    <label for="admin_Celular">Correo</label>
    <input type="email" class="form-control" id="admin_Celular" name="Correo" value="' . $showpersona["Correo"] . '">
</div>
<div class="col-6 form-group green-box">
    <label for="admin_Celular">Celular</label>
    <input type="number" class="form-control" id="admin_Celular" name="Celular" maxlength="10" value="' . $showpersona["Celular"] . '"
        pattern=".{10}" title="El número de celular debe tener exactamente 10 caracteres." >
</div>
<div class="col-6 form-group green-box">
    <label for="admin_Celular">Contraseña</label>
    <input type="text" class="form-control" id="password" name="Contrasenia" value="' . $showpersona["Contrasenia"] . '">
</div>
<div class="col-6 form-group green-box">
    <label for="">Rol</label>

    <select class="custom-select" name="Rol" id="">
        <option value="Admin">Administrador</option>
        <option selected value="Cliente">Cliente</option>
    </select>
    <div >
        <label for="admin_Celular">Departamento</label>
        <input type="text" class="form-control" id="departamento" name="Departamento" required>
    </div>
    <div >
        <label for="admin_Celular">direccion</label>
        <input type="text" class="form-control" id="departamento" name="Direccion" required>
    </div>
    
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