<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="16x16 32x32" href="{{ asset('assets/img/favicon.png') }}">
    <title>{{ $modulo }}</title>

    <link rel="stylesheet" href=" {{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">

  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('panel') }}">{{ $username }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a href="{{ url('catalogos') }}" class="nav-link"> <i class="fa fa-list"></i> Catálogos </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('productos') }}" class="nav-link"> <i class="fa fa-reorder"></i> Productos </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('usuarios') }}" class="nav-link"> <i class="fa fa-user-o"></i> Usuarios </a>
            </li>

            {{-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> --}}
          </ul>
          <!--
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        -->

          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="{{ url('salir') }}" class="btn btn-outline-danger"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
            </li>
          </ul>

        </div>
      </nav>
    </header>


    <div class="container">

      <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('panel') }}">Panel</a></li>
              @if ($modulo!=NULL)
                <li class="breadcrumb-item"><a href="{{ url($modulo_url) }}">{{ $modulo }}</a></li>
              @endif
              @if ($action!=NULL)
                <li class="breadcrumb-item active">{{ $action }}</li>
              @endif
            </ol>
          </div>
      </div><!-- row -->

        <div class="row">
            <div class="col-sm-12">
                  @yield('content')
            </div>
          </div><!-- row -->
    </div><!-- container-fluid -->


    <footer class="text-muted">
      <div class="container">
        <div class="float-right">
          <p><a href="http://miguelhernandez.hol.es">&copy; Miguel Hernández Ramos </a></p>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="{{ asset('assets/jquery/jquery-3.2.1.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/jquery/jquery.validate.js') }}" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/grid.js') }}"></script>

    @yield('assets_js')
    </body>
    </html>
