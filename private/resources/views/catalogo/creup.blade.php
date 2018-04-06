@extends('templates/panel')

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Atienda los siguiente errores</strong>
    </div>
    @endif

  <form id="form_catalogo_creup" method="POST" action="{{ route('catalogo.save')}}">
      {{ csrf_field() }}
      <div class="row">
        <input id="itxt_catalogo_idcatalogo" name="itxt_catalogo_idcatalogo" type="hidden" value="{{ old('itxt_catalogo_idcatalogo',$datos['idcatalogo']) }}">

        <div class="col-sm-12">
          <label for="itxt_catalogo_nombre">Catálogo</label>
          <input id="itxt_catalogo_nombre" name="itxt_catalogo_nombre" type="text"  class="form-control" value="{{ old('itxt_catalogo_nombre', $datos['nombre']) }}">
          @if ($errors->has('itxt_catalogo_nombre'))
            <label class="error">{{ $errors->first('itxt_catalogo_nombre') }}</label>
          @endif
        </div>
        <div class="col-sm-12">
          <label for="itxt_catalogo_descripcion">Descripción</label>
          <textarea id="itxt_catalogo_descripcion" name="itxt_catalogo_descripcion" class="form-control" rows="5">{{ old('itxt_catalogo_descripcion', $datos['descripcion']) }}</textarea>
        </div>
      </div><!-- row -->

      <div class="row pt-2">
        <div class="col-sm-8"></div>
        <div class="col-sm-2">
          <a class="btn btn-outline-secondary btn-block" href="{{ route('catalogo') }}">Regresar</a>
        </div>
        <div class="col-sm-2">
          <button id="btn_catalogo_terminar" type="submit" class="btn btn-outline-success btn-block">Guardar</button>
        </div>
      </div>
  </form>
@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/catalogo/validacion.js') }}" ></script>
@endsection
