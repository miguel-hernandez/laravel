@extends('templates/panel')


@section('content')

  <div class="row">

      <div class="col-sm-6 mt-0">
        <input id="intxt_catalogo_nombre" name="" type="text" class="form-control" placeholder="Ingrese el nombre o parte del nombre">
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2 mt-0">
        <button id="btn_catalogo_read" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Buscar"><i class="fa fa-search fa-1x"></i></button>
      </div>

  </div><!-- row -->

    <div class="row mt-3">
      <div class="col-sm-6"></div>
      <div class="col-sm-2">
        <a href="{{ url('catalogos_add') }}" class="btn btn-block btn-outline-success">
           <i class="fa fa-plus"></i> Nuevo
        </a>

      </div>
      <div class="col-sm-2">
        <button id="btn_catalogo_update" type="button" class="btn btn-block btn-outline-primary">
          <i class="fa fa-edit"></i> Editar
        </button>
      </div>
      <div class="col-sm-2">
        <button id="button" type="button"  class="btn btn-block btn-outline-danger">
          <i class="fa fa-trash"></i> Eliminar
        </button>
      </div>
    </div><!-- row -->

    {{-- <div class="row"> --}}
      <div class="col-xs-12 mt-2">
        <div id="grid_catalogos" class="cursor_pointer"></div>
      </div>
    {{-- </div> --}}
@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/catalogo/catalogo.js') }}" ></script>
@endsection
