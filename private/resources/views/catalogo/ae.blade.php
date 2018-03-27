@extends('templates/panel')

@section('content')
  {{-- @if (isset($message)) --}}
  @if(Session::has('message'))
    <div class="alert alert-success" id="danger-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $message }}
    </div>
  @endif
  <form id="form_catalogo_cu" action="{{ url('catalogo/save')}}" method="POST">
      {{ csrf_field() }}

      <div class="row">
        <input id="" name="itxt_catalogo_idcatalogo" type="hidden" value="">
        <div class="col-sm-12">
          <label for="itxt_catalogo_nombre">Catálogo</label>
          <input id="itxt_catalogo_nombre" name="itxt_catalogo_nombre" type="text"  value="" class="form-control">
        </div>
        <div class="col-sm-12">
          <label for="itxt_catalogo_descripcion">Descripción</label>
          <textarea id="itxt_catalogo_descripcion" name="itxt_catalogo_descripcion" class="form-control" rows="5" id="comment"></textarea>
        </div>
      </div><!-- row -->

      <div class="row pt-2">
        <div class="col-sm-8"></div>
        <div class="col-sm-2">
          <a class="btn btn-outline-secondary btn-block" href="{{ url('catalogos') }}">Regresar</a>
        </div>
        <div class="col-sm-2">
          <button id="btn_catalogo_terminar" type="button" class="btn btn-outline-success btn-block">Guardar</button>
        </div>
      </div>
  </form>
@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/catalogo/validacion.js') }}" ></script>
@endsection
