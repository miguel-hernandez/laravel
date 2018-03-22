<!DOCTYPE html>
<html lang="en" dir="ltr">
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
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Nosotros</h4>
              <p class="text-muted">Somos...</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contacto</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Twitter</a></li>
                <li><a href="#" class="text-white">Facebook</a></li>
                <li><a href="#" class="text-white">Linkedin</a></li>
                <li><a href="#" class="text-white">contacto@mail.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>{{ $username }}</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>


    <main role="main">
      <div class="pt-2 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h2>
                @yield('titulo')
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
          </div>

        </div><!-- container -->
      </div><!-- album py-5 bg-light -->
    </main>


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
