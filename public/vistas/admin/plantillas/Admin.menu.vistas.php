<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="indexadmin.php?rutaadmin=indicadores" class="brand-link">
        <img src="./public/images/naisslyu_logo.jpg" alt="Naisslyu Logo" class=" brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Naisslyu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">



        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">BALANCE Y VENTAS</li>
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="indexadmin.php?rutaadmin=dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="indexadmin.php?rutaadmin=indicadores" class="nav-link">
                        <i class="fas fa-chart-bar nav-icon"></i>
                        <p>
                            Indicadores
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <p>
                            pedidos
                            <i class="fas fa-angle-right right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=pendientes" class="nav-link">

                                <p>pendientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=enviados" class="nav-link">

                                <p>Enviados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=historial" class="nav-link">

                                <p>Historial de pedidos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="indexadmin.php?rutaadmin=crm" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>

                        <p>
                            CRM-clientes
                        </p>
                    </a>
                </li>
                
                <li class="nav-header">PRODUCTOS E INVENTARIO</li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cubes nav-icon"></i>

                        <p>
                            Productos
                            <i class="fas fa-angle-right right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=activos" class="nav-link ">

                                <p>activos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=inactivos" class="nav-link ">

                                <p>Inactivos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sort-amount-down nav-icon"></i>

                        <p>
                            Promociones
                            <i class="fas fa-angle-right right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=promociones" class="nav-link">

                                <p>Promociones masivas</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-database nav-icon"></i>


                        <p>
                            Parametros
                            <i class="fas fa-angle-right right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=lineas" class="nav-link">

                                <p>Lineas </p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-header">AVANZADO</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tools nav-icon"></i>
                        <p>
                            Configuraciones
                            <i class="fas fa-angle-right right"></i>


                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="indexadmin.php?rutaadmin=usuarios" class="nav-link">

                                <p>Usuarios</p>
                            </a>
                        </li>

                    </ul>
                </li>


            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>