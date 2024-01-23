<nav class="navbar navbar-expand navbar-light navbar-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="icon ion-md-menu"></i>
                </a>
            </li>
            @auth

            <nav    class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('movimientos.index') }}" class="nav-link">Respaldos</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('cintas.index') }}" class="nav-link">Cintas</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('empresas.index') }}" class="nav-link">Empresas</a>
                    </li>
                   
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('responsables.index') }}" class="nav-link">Respondables</a>
                    </li>
                   
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Estados
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('estado-movimientos.index') }}">Estado Movimientos</a>
                            <a class="dropdown-item" href="{{ route('estado-rotulos.index') }}">Estado Rotulo</a>
                            <a class="dropdown-item" href="{{ route('estado-sn-rotulos.index') }}">Estado Cinta Cinta Sin Rotulo</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Guía de Despacho
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{ route('rotulos.index') }}" class="nav-link">Rótulos Entrantes</a>
                            <a href="{{ route('ingreso-cinta-sn-rotulos.index') }}" class="nav-link"> Cintas Entrantes</a>
                            
                        </div>
                    </li>

                   
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Buscar"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <span class="badge badge-danger navbar-badge">SALIR</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                              

                                <a href="https://adminlte.io/docs/3.1//index.html" target="_blank" class="nav-link">
                                    <p>Información</p>
                                </a>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <p>{{ __('Cerrar Sesión ') }}</p>
                                </a>
            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                  
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                                class="fas fa-th-large"></i></a>
                    </li>
                </ul>
            </nav>



            @endauth

        </ul>

        <!-- Right Side Of Navbar -->
      
    </div>
</nav>

