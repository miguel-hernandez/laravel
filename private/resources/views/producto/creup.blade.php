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



  <form id="form_producto_creup" method="POST" action="{{ route('producto.save')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <input id="itxt_producto_idproducto" name="itxt_producto_idproducto" type="hidden" value="{{ old('itxt_producto_idproducto',$datos['idproducto']) }}">

        <div class="col-sm-4">
          <label for="itxt_producto_producto">Producto</label>
          <input id="itxt_producto_producto" name="itxt_producto_producto" type="text"  class="form-control" value="{{ old('itxt_producto_producto', $datos['producto']) }}">
          @if ($errors->has('itxt_producto_producto'))
            <label class="error">{{ $errors->first('itxt_producto_producto') }}</label>
          @endif
        </div>
        <div class="col-sm-4">
          <label for="itxt_producto_precio_provee">Código</label>
          <input id="itxt_producto_codigo_barras" name="itxt_producto_codigo_barras" type="text"  class="form-control" value="{{ old('itxt_producto_codigo_barras', $datos['codigo_barras']) }}">
          @if ($errors->has('itxt_producto_codigo_barras'))
            <label class="error">{{ $errors->first('itxt_producto_codigo_barras') }}</label>
          @endif
        </div>
        <div class="col-sm-4">
          <label for="itxt_producto_idcatalogo">Catálogo</label>
          <select name="itxt_producto_idcatalogo" name="itxt_producto_idcatalogo" class="form-control">
            @forelse ($arr_catalogos as $catalogo)
              <option value="{{ $catalogo->idcatalogo }}">{{ $catalogo->catalogo }}</option>
              @empty
                  <option value="0">No hay catálogos, registre almenos uno</option>
              @endforelse
          </select>
        </div>
      </div><!-- row -->

      <div class="row mt-3">
        <div class="col-sm-12">
          <label for="itxt_producto_descripcion">Descripción</label>
          <textarea id="itxt_producto_descripcion" name="itxt_producto_descripcion" class="form-control" rows="2">{{ old('itxt_producto_descripcion', $datos['descripcion']) }}</textarea>
        </div>
      </div><!-- row -->

      <div class="row mt-3">
        <div class="col-sm-3">
          <label for="itxt_producto_precio_provee">$ Proveedor</label>
          <input id="itxt_producto_precio_provee" name="itxt_producto_precio_provee" type="number" class="form-control" step="0.1" min="0" value="{{ old('itxt_producto_precio_provee', $datos['precio_provee']) }}">
        </div>
        <div class="col-sm-3">
          <label for="itxt_producto_inventario_actual">$ Venta</label>
          <input id="itxt_producto_precio_venta" name="itxt_producto_precio_venta" type="number" class="form-control" step="0.1" min="0" value="{{ old('itxt_producto_precio_venta', $datos['precio_venta']) }}">
        </div>
        <div class="col-sm-3">
          <label for="itxt_producto_inventario_actual">Inventario actual</label>
          <input id="itxt_producto_inventario_actual" name="itxt_producto_inventario_actual" type="number" class="form-control" step="1" min="0" value="{{ old('itxt_producto_inventario_actual', $datos['inventario_actual']) }}">
        </div>
        <div class="col-sm-3">
          <label for="itxt_producto_inventario_minimo">Mínimo en inventario</label>
          <input id="itxt_producto_inventario_minimo" name="itxt_producto_inventario_minimo" type="number" class="form-control" step="1" min="0" value="{{ old('itxt_producto_inventario_minimo', $datos['inventario_minimo']) }}">
        </div>
      </div><!-- row -->

      <div class="row mt-3">
        <div class="col-sm-12">
            <input id="file" name="file" type="file" class="form-control">
        </div>
      </div><!-- row -->



      <div class="row pt-2">
        <div class="col-sm-8"></div>
        <div class="col-sm-2">
          <a class="btn btn-outline-secondary btn-block" href="{{ route('productos') }}">Regresar</a>
        </div>
        <div class="col-sm-2">
          <button id="btn_producto_terminar" type="submit" class="btn btn-outline-success btn-block">Guardar</button>
        </div>
      </div>
  </form>
@endsection

@section('assets_js')
  <script type="text/javascript" src="{{ asset('assets/js/producto/validacion.js') }}" ></script>
@endsection
