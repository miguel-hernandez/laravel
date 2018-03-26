<!DOCTYPE html>
{{-- <html lang="en" dir="ltr"> --}}
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="16x16 32x32" href="{{ asset('assets/img/favicon.png') }}">
    <title>{{ $titulo }}</title>

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
            <!--
            <li class="nav-item active">
              <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          -->
          </ul>
          <!--
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        -->

          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a href="{{ url('Login/logout') }}" class="btn btn-outline-danger"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
            </li>
          </ul>

        </div>
      </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                  @yield('content')
            </div>
          </div><!-- row -->
    </div><!-- container-fluid -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
              <ul id="accordion1" class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#item-1" data-parent="#accordion1">Clientes</a>
                  {{-- <div id="item-1" class="collapse show"> --}}
                  <div id="item-1" class="collapse">
                    <ul class="nav flex-column ml-3">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Ver</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 1-2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 1-3</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion1">Item 2</a>
                  <div id="item-2" class="collapse">
                    <ul class="nav flex-column ml-3">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 2-1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 2-2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 2-3</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion1">Item 3</a>
                  <div id="item-3" class="collapse">
                    <ul class="nav flex-column ml-3">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 3-1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 3-2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sub 3-3</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-sm-10">
                  @yield('content')
            </div>

        </div><!-- row -->
    </div><!-- container-fluid -->



    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
        </p>
        <p>&copy; Miguel Hernández</p>
        <p><a href="http://miguelhernandez.hol.es">Visita mi página </a></p>
      </div>
    </footer>

    <script type="text/javascript" src="{{ asset('assets/jquery/jquery-3.2.1.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/jquery/jquery.validate.js') }}" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

    @yield('assets_js')
    </body>
    </html>
