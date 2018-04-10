@extends('templates/layout')

@section('titulo')
  {{ $titulo }}
@endsection

@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-12">
      <center> <a href="{{ url('login') }}">Login</a> </center>
    </div>
  </div>

    <div class="row">
      <!-- [idproducto] => 1
      [producto] => producto1
      [codigo_barras] => p1
      [precio_provee] => 0.00
      [precio_venta] => 0.00
      [inventario_actual] => 0
      [inventario_minimo] => 0
      [idcatalogo] => 21
      [imgurl] => assets/imagenes/productos/aa/issue_0586_ok.PNG
      [catalogo] => aa -->
      @forelse ($arr_productos as $producto)
      <div class="col-md-4 mt-2">
        <div class="card box-shadow">
          <img class="card-img-top" src="{{ asset($producto->imgurl) }} " class="img-fluid"  alt="Responsive image Card image cap" style=" height: 200px; ">
          <div class="card-body">
            <p class="card-text">
              {{ $producto->producto }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      @empty
          <label>No hay productos registrados</label>
      @endforelse
  </div>
</div><!-- container-fluid -->
@endsection
