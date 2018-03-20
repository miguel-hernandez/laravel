<style>
.thumbnail {
  /*background: #EF3B3A;*/
  background: #FFF;
  width: 200px;
  height: 200px;
  margin: 0 auto 30px;
  padding-top: 50px; padding-bottom:  40px; padding-left: 10px;padding-right:  10px;
  /*padding: 50px 30px;*/
  align-items: center;
  border-top-left-radius: 100%;
  border-top-right-radius: 100%;
  border-bottom-left-radius: 100%;
  border-bottom-right-radius: 100%;
  box-sizing: border-box;
  border: 2px solid #DDE4E5;
}
.form .thumbnail img {
  display: block;
  width: 100%;
}

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

      <div class="div_white">
        {{ csrf_field() }}
      <div class="row">
        <div class="col-sm-12">
          <div class="thumbnail"><img src="{{ asset('assets/img/batman.jpg') }}  ?>" alt="" class="img-fluid"> </div>
        </div>
      </div><!-- row -->

      <div class="row pt-2">
        <div class="col-sm-12">
          {{-- <i class="fa fa-user-o" aria-hidden="true"></i> --}}
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
        <div class="col-sm-12">
          <button id="btn_login" type="button" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="">
            Iniciar sesión
          </button>
          <a href="{{ url('/') }}">Ir al sitio</a>
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

{{-- <script type="text/javascript" src="js/jquery.js"></script> --}}
