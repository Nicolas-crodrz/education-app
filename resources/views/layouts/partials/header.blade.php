<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('home') }}" class="hola nav-link px-2">{{ __('Home') }}</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">{{ __('Cursos') }}</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">{{ __('Noticias') }}</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">{{ __('About') }}</a></li>
        @php $user = auth()->user() @endphp
        @can('before', $user)
            <!-- Mostrar contenido para administradores en otra pestaña -->
            <li><a href="{{route('adminPanel')}}" class="nav-link px-2 link-dark" target="_blank">{{ __('Admin') }}</a></li>
        @endcan

    </ul>

    @guest
        <!-- Si no esta logueado -->
        <div class="col-md-3 text-end">
            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">{{ __('Login') }}</a>
            <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Sign up') }}</a>
        </div>
    @else
        <!-- Si esta logueado -->
        <ul class="nav col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- <img src="https://robohash.org/{{ Auth::user()->name }}" alt="Avatar" class="avatar" width="50px"
                        height="50px"> --}}
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}+{{ Auth::user()->lastname }}" alt="Avatar" class="avatar img-thumbnail rounded-circle" width="50px" height="50px">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item bi bi-journals" href="#"> {{ __('My Courses') }}</a></li>
                    <li><a class="dropdown-item bi bi-chat" href="#"> {{ __('Messages') }}</a></li>
                    <li><a class="dropdown-item bi bi-person-circle" href="{{ route('profile') }}">
                            {{ __('Profile') }}</a></li>
                    <li>
                        <a class="dropdown-item bi bi-door-closed" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <!-- Para que funcione el logout -->
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    @endguest
</header>
