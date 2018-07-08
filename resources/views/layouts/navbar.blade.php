<nav>
    <div class="nav-wrapper container">
        <a href="{{ url('/') }}" class="brand-logo">Bazar Nilda</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        @guest
            <ul class="right hide-on-med-and-down">
                @auth
                    <li><a class="" href="{{ url('/home') }}">{{ __('Administración') }}</a></li>
                @else
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @endauth
            </ul>
        @else
            <ul class="right hide-on-med-and-down">
                <li class="" href="#" role="button">
                    <a class="nav-link" href="#"> {{ Auth::user()->name }} </a>
                </li>
                <li class="">
                    <a class="nav-link" href="{{ route('admin') }}">Panel</a>
                </li>
                <li class=""
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="material-icons tiny" title="Salir" alt="salir">exit_to_app</i></a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </ul>
        @endguest

    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <div class="show-on-small-only">
        @include('layouts.opciones')
    </div>
    @guest
        <ul class="">
            @auth
                <li><a class="" href="{{ url('/home') }}">{{ __('Administración') }}</a></li>
            @else
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @endauth
        </ul>
    @else
        <ul class="">
            <li class="" href="#" role="button">
                <a class="nav-link" href="#"> {{ Auth::user()->name }} </a>
            </li>
            <li class="">
                <a class="nav-link" href="{{ route('admin') }}">Panel</a>
            </li>
            <li class=""
                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                <a class="nav-link" href="{{ route('logout') }}">{{ __('Salir') }}</a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </ul>
    @endguest

</ul>

@push('scripts-footer')



@endpush
