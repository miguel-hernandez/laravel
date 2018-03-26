<style>
.div_white{
  background: #FFF;
  padding: 20px;
  border: 2px solid #DDE4E5;
  border-radius: 8px;
}

.icono{
  width: 30px;
}
</style>

@extends('templates/layout')

@section('titulo')
  {{ $titulo }}
@endsection

@section('content')
  <div class="row">

  <div class="col-sm-4">
  </div>
  <div class="col-sm-4">
    <form method="post" id="form_login" action=" {{ url('login/validar')}}">

      @if (isset($error))
        <div class="alert alert-danger" id="danger-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $error }}
        </div>
      @endif
      <div class="div_white">
        {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-12">
          <img src="{{ asset('assets/img/login_icon.png') }}" alt="img login" class="img-fluid mx-auto d-block">
        </div>
      </div><!-- row -->

      <div class="row pt-2">
        <div class="col-sm-12">
          <i class="fa fa-user-o" aria-hidden="true"></i>
          <input name="itxt_login_username" type="text" class="form-control" placeholder="usuario" autofocus>
        </div>
      </div><!-- row -->

      <div class="row pt-2">
        <div class="col-sm-12">
          <i class="fa fa-key" aria-hidden="true"></i>
          <input name="itxt_login_clave" type="password" class="form-control" placeholder="contraseña">
        </div>
      </div><!-- row -->

      <div class="row pt-4">
        <div class="col-sm-6">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-block">Ir al sitio</a>
      </div>
        <div class="col-sm-6">
          <button id="btn_login" type="submit" class="btn btn-outline-success btn-block float-right" data-toggle="tooltip" data-placement="left" title="">
            Iniciar sesión
          </button>
          </div>
      </div><!-- row -->
    </div>
    </form>
  </div>
  <div class="col-sm-4"></div>
  </div><!-- row -->


@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/login/login.js') }}" ></script>
@endsection
