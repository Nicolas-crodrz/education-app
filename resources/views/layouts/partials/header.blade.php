<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap"></use>
      </svg>
  </a>

  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="#" class="hola nav-link px-2">{{ __('Home') }}</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">{{ __('Cursos') }}</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">{{ __('Noticias') }}</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">{{ __('About') }}</a></li>
  </ul>

  @guest <!-- Si no esta logueado -->
  <div class="col-md-3 text-end">
      <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">{{ __('Login') }}</a>
      <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Sign up') }}</a>
  </div>
  @else <!-- Si esta logueado -->
  <ul class="nav col-md-auto mb-2 justify-content-center mb-md-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle bi bi-person-circle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item bi bi-car-front" href="#"> {{ __('My rides') }}</a></li>
              <li><a class="dropdown-item bi bi-chat" href="#"> {{ __('Messages') }}</a></li>
              <li><a class="dropdown-item bi bi-credit-card" href="#"> {{ __('Payments') }}</a></li>
              <li><a class="dropdown-item bi bi-person-circle" href="#"> {{ __('Profile') }}</a></li>
              <li>
                  <a class="dropdown-item bi bi-door-closed" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf <!-- Para que funcione el logout -->
                  </form>
              </li>
          </ul>
      </li>
  </ul>
  @endguest
</header>
