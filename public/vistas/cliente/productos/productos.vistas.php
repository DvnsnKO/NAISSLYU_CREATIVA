<div class="row"><!-- contenido-->
    <section class="col-lg-9 connectedSortable"> <!-- tabla derecha de produtos-->

        <div class="card direct-chat direct-chat-success">
            <div class="card-header">
                <h3 class="card-title">Nombre de la categoria</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="height: 500px;">
    <div class="row">
        <div class="col-12">
           
            <?php
            require_once './app/controlador/productos/mostrando.controlador.php';

            /** Llamar al controlador para recuperar los registros de la tabla de base de datos */
            $Productos = ProductoControlador::index();
            $totalProductos = count($Productos);

            for ($i = 0; $i < $totalProductos; $i++) {
                if ($i % 4 == 0) {
                    if ($i > 0) {
                        echo '</div>'; // Cierra la fila anterior
                    }
                    echo '<div class="row">'; // Comienza una nueva fila
                }

                $Producto = $Productos[$i];
                echo ' 
                    <div class="col-3 mb-1">
                        <div class="card h-100">
                            <img src="./public/images/' . $Producto["Nombre"] . '/' . $Producto["Imagen"] . '" class="card-img-top" style="width: 100%; height: 50%;">
                            <div class="card-body">
                                <h5 class="card-title">' . $Producto["Nombre"] . '</h5><br>
                             <small class="card-text"> Precio: ' . $Producto["Precio_uni"] . "00".' </small><br>
                                <button type="button" class="btn btn-success">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>';
            }

            // Cierra la última fila si no está cerrada
            if ($totalProductos > 0) {
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

    </section>

    <section class="col-lg-3 connectedSortable"> <!-- tabla derecha de produtos-->

        <div class="card direct-chat card-success">
            <div class="card-header">
                <h3 class="card-title ">Nombre de la categoria</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body " style="height: 500px; ">
                <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center; text-align: center; ">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <span class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#"
                                role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">ordenar por:</span>
                        </li>
                        <li class="nav-item ">

                            <a class="nav-link text-success" data-toggle="dropdown">
                                Mas relevantes
                                <i class="expandable-table-caret fas fa-caret-down fa-fw"></i>
                            </a>
                            <div class="dropdown-menu ">
                                <div class="p-0">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr class="p-0">
                                                <td class="p-0">
                                                    <a href="#" class="btn text-success btn-block w-100">Mas
                                                        relevantes</a>
                                                </td>
                                            </tr>
                                            <tr class="p-0">
                                                <td class="p-0">
                                                    <a href="#" class="btn text-success btn-block w-100">Mayor
                                                        precio</a>
                                                </td>
                                            </tr>
                                            <tr class="p-0">
                                                <td class="p-0">
                                                    <a href="#" class="btn text-success btn-block w-100">Menor
                                                        precio</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </section>
</div>