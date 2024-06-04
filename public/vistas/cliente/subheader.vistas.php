<div class="container-fluid" style="background-color: rgba(118.26, 36.48, 251.69, 0.27)"> <!--titulo-->
    <!--poner el idioma-->
    <div class="row align-items-center p-2">
        <div class="col-2">

        </div>

        <div class="col-8 ">
            <div style="display: flex; justify-content: space-around">
                <img class="img-fluid" src="./public/images/mariposa.png" />
                <div>
                    <h1 style="color:  blueviolet">NAISSLYU BISUTERIA</h1>
                    <div> <!--style="display: flex; justify-content: space-around"-->
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link bg-success mr-2" href="index.php?ruta=destacados">inicio</a>


                            </li>
                            <li class="nav-item ">

                                <a class="nav-link bg-success mr-2" data-toggle="dropdown">
                                    categorias
                                    <i class="expandable-table-caret fas fa-caret-down fa-fw "></i>
                                </a>
                                <div class="dropdown-menu ">
                                    <div class="p-0">
                                        <table class="table table-hover" style="background-color: white;">
                                            <tbody>
                                            <?php
                                      
                                      require_once './app/controlador/lineas/lineas.controlador.php';
                                      
                                    

                                        /**Lllamar al controlador para recuperar los registros de la tabla de base de datos */
                                        $Lineas = lineasControlador::index();
                                        foreach($Lineas as $key => $Linea){
                                          
                                         echo '  <tr class="p-0">
                                         <td class="p-0">
                                             <a href="index.php?ruta=productos" class="btn btn-block w-100"
                                                 style="color: black;">'. $Linea["Nombre_linea"] .'</a>
                                         </td>
                                     </tr>';


                                        }



                                      ?>                                           
                                               

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link bg-success  " href="index.php?ruta=quienesomos">¿Quienes Somos?</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <img class="img-fluid" src="./public/images/mariposa.png" />
            </div>
        </div>

        <div class="col-2 " style="font-size: 35px; "> <!--logos inicio de sesion-->
            
            <a href="index.php?ruta=login"> <i class="far fa-user-circle" style="color: gray;"></i></a>
            <a href="index.php?ruta=envios"><i class="fas fa-shopping-cart" style="color: gray;"></i></a>
        </div>
    </div> <!--logos inicio de sesion-->
</div><!-- titulo-->


<div>
    <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar " type="search" placeholder="Search" aria-label="Search"
            style=" background-color: rgba(102.87, 144.38, 70.25, 0.62)">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <a href="#"><i class="fas fa-search fa-fw" style="color: gray;"> </i></a>
            </button>
        </div>
    </div>
</div> <br>
</header> <br>
</div>
</div>
<main>