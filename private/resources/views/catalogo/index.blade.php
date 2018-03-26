@extends('templates/panel')


@section('content')

    <div class="row">
      <div class="col-sm-6"></div>
      <div class="col-sm-2">
        <a href="{{ url('catalogos_add') }}" class="btn btn-block btn-outline-success">
           <i class="fa fa-plus"></i> Nuevo
        </a>

      </div>
      <div class="col-sm-2">
        <button id="button" type="button"  class="btn btn-block btn-outline-primary">
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
        <div id="grid_catalogos"></div>
      </div>
    {{-- </div> --}}
@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/catalogo/catalogo.js') }}" ></script>
@endsection
