<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <!-- Scripts -->
  <script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
    </script>
  </head>
  <body>
    <div id="app" class="container">
      <nav class="navbar navbar-light static-top navbar-toggleable-md bg-faded">
        <div class="container">
          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/') }}">
            Laratter
          </a>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
              <li class="nav-item">
                <form action="/messages">
                  <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="@lang('app.search')" required>
                    <span class="input-group-btn">
                      <button class="btn btn-outline-success">{{ trans('app.search') }}</button>
                    </span>
                  </div>
                </form>
              </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav ml-auto">
              @if(App::getLocale() == 'es')
                <a class="nav-link" href="/locale?lang=en">English</a>
              @else
                <a class="nav-link" href="/locale?lang=es">Español</a>
              @endif
              <!-- Authentication Links -->
              @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{__('auth.login')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
              @else
                <li class="nav-item dropdown mr-2">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Notificaciones <span class="caret"></span>
                  </a>
                  <notifications :user="{{ Auth::user()->id }}"></notifications>
                </li>
                <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Salir
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>

              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
