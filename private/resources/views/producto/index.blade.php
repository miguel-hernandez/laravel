@extends('templates/panel')

@section('content')

  @if (Session::has(FLASH_MESSAGE))
      {!! session(FLASH_MESSAGE) !!}
  @endif
  
<form id="form_producto">
<div class="row mt-0">
    <div class="col-9 col-sm-9 col-md-6 col-lg-6">
        <input id="itxt_producto_nombre" name="itxt_producto_nombre" type="text" class="form-control" placeholder="Ingrese el nombre o parte del nombre">
    </div>
    <div class="col-3 col-sm-3 col-md-2 col-lg-2">
        <button id="btn_producto_read" type="button" class="btn btn-primary btn-block" data-toggle="tooltip" data-placement="right" title="buscar"><i class="fa fa-search fa-1x"></i></button>
    </div>
</div><!-- row -->
</form>

    <div class="row mt-3">
      <div class="col-md-6"></div>
      <div class="col-4 col-sm-4 col-md-2 col-lg-2 ">
        <a href="{{ route('producto.create') }}" class="btn btn-block btn-outline-success">
           <i class="fa fa-plus"></i> Nuevo
        </a>

      </div>
      <div class="col-4 col-sm-4 col-md-2 col-lg-2">
        <button id="btn_producto_update" type="button" class="btn btn-block btn-outline-primary">
          <i class="fa fa-edit"></i> Editar
        </button>
      </div>
      <div class="col-4 col-sm-4 col-md-2 col-lg-2">
        <button id="btn_producto_delete" type="button"  class="btn btn-block btn-outline-danger">
          <i class="fa fa-trash"></i> Eliminar
        </button>
      </div>
    </div><!-- row -->

    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">
        <div id="grid_productos" class="cursor_pointer"></div>
      </div>
    </div>
@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/producto/producto.js') }}" ></script>
@endsection
