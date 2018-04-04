@extends('templates/panel')


@section('content')


<form id="form_catalogo">
<div class="row mt-0">
    <div class="col-9 col-sm-9 col-md-6 col-lg-6">
        <input id="intxt_catalogo_nombre" name="intxt_catalogo_nombre" type="text" class="form-control" placeholder="Ingrese el nombre o parte del nombre">
    </div>
    <div class="col-3 col-sm-3 col-md-2 col-lg-2">
      <button id="btn_catalogo_read" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" title="Buscar"><i class="fa fa-search fa-1x"></i></button>
    </div>
</div><!-- row -->
</form>

    <div class="row mt-3">
      <div class="col-md-6"></div>
      <div class="col-4 col-sm-4 col-md-2 col-lg-2 ">
        <a href="{{ route('catalogo.create') }}" class="btn btn-block btn-outline-success">
           <i class="fa fa-plus"></i> Nuevo
        </a>

      </div>
      <div class="col-4 col-sm-4 col-md-2 col-lg-2">
        <button id="btn_catalogo_update" type="button" class="btn btn-block btn-outline-primary">
          <i class="fa fa-edit"></i> Editar
        </button>
        {{-- <a class="btn btn-outline-secondary btn-block" href="{{ route('catalogo.update', ['idcatalogo' => 1]) }}">Editar</a> --}}

      </div>
      <div class="col-4 col-sm-4 col-md-2 col-lg-2">
        <button id="button" type="button"  class="btn btn-block btn-outline-danger">
          <i class="fa fa-trash"></i> Eliminar
        </button>
      </div>
    </div><!-- row -->

    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">
        <div id="grid_catalogos" class="cursor_pointer"></div>
      </div>
    </div>
@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/catalogo/catalogo.js') }}" ></script>
@endsection
