
<a href="{{ url('/home') }}" class="brand-link">
    <img src="\hospital-2_icon-icons.com_66067.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
    <span class="brand-text font-weight-light">HPM</span>
</a>

<!-- 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">registercinta</span>
    </a>


    
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            Apps
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\Cinta::class)
                            <li class="nav-item">
                                <a href="{{ route('cintas.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Cintas</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Empresa::class)
                            <li class="nav-item">
                                <a href="{{ route('empresas.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Empresas</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\EstadoMovimiento::class)
                            <li class="nav-item">
                                <a href="{{ route('estado-movimientos.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Estado Movimientos</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\EstadoRotulo::class)
                            <li class="nav-item">
                                <a href="{{ route('estado-rotulos.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Estado Rotulos</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\EstadoSnRotulo::class)
                            <li class="nav-item">
                                <a href="{{ route('estado-sn-rotulos.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Estado Sn Rotulos</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\IngresoCintaSnRotulo::class)
                            <li class="nav-item">
                                <a href="{{ route('ingreso-cinta-sn-rotulos.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Ingreso Cinta Sn Rotulos</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Movimiento::class)
                            <li class="nav-item">
                                <a href="{{ route('movimientos.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Movimientos</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Responsable::class)
                            <li class="nav-item">
                                <a href="{{ route('responsables.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Responsables</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Rotulo::class)
                            <li class="nav-item">
                                <a href="{{ route('rotulos.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Rotulos</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>

                @endauth

                <li class="nav-item">
                    
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
    </div>
    
    
    
    
    
    
    
    

    
</aside>

-->

