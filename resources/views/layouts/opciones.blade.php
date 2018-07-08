@if(Auth::check())
    <div class="col s12 m12 l3 xl3">

        <ul class="collection">
            <li class="collection-header"><div class="collection-item">Opciones</div></li>

            <div class="divider"></div>
            <div class="divider"></div>

            <li class="collection-item">
                <a class="waves-effect" href="{{route('admin')}}">
                    <i class="material-icons tiny">home</i> Panel
                </a>
            </li>
            @if(Auth::user()->rol == 'administrador')
                <li class="collection-item">
                    <a class="waves-effect" href="{{route('usuarios.index')}}">
                        <i class="material-icons tiny">person</i> Usuarios
                    </a>
                </li>
            @endif

            @if(Auth::user()->rol == 'administrador' || Auth::user()->rol == 'vendedor')
                <li class="collection-item">
                    <a class="waves-effect" href="{{route('retirarproductos.index')}}">
                        <i class="material-icons tiny">monetization_on</i> Retirar Productos
                    </a>
                </li>
            @endif

            @if(Auth::user()->rol == 'administrador' || Auth::user()->rol == 'bodeguero')
                <li class="collection-item">
                    <a class="waves-effect" href="{{route('productos.index')}}">
                        <i class="material-icons tiny">add_box</i> Productos
                    </a>
                </li>
                <li class="collection-item">
                    <a class="waves-effect" href="{{route('categorias.index')}}">
                        <i class="material-icons tiny">business_center</i> Categorías
                    </a>
                </li>
                <li class="collection-item">
                    <a class="waves-effect" href="{{route('bodegas.index')}}">
                        <i class="material-icons tiny">business</i> Bodegas</a>
                </li>
            @endif
            <div class="divider"></div>
            <li class="collection-item"
                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                <a class="nav-link" href="{{ route('logout') }}"><i class="material-icons tiny">exit_to_app</i> {{ __('Salir') }}</a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
@endif
