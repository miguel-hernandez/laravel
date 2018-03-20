@extends('templates/layout')

@section('titulo')
  {{ $titulo }}
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-2">
      <a class="btn btn-sm btn-outline-primary btn-block" href="{{ url('user/create') }}">Nuevo</a>
    </div>
    <div class="col-sm-2">
      <button id="btn_usuario_update" onclick="realizaProceso()" type="button" class="btn btn-sm btn-outline-primary btn-block">Editar</button>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn btn-sm btn-outline-primary btn-block">Eliminar</button>
    </div>
  </div>
  <div class="row">
    <div class="sm-12">
      <div id="div_idusuarios">
        <ul>
            @forelse ($usuarios as $user)
                <li>{{$user['id'].' '.$user['name'] }}</li>
            @empty
                <p>No hay usuarios</p>
            @endforelse
        </ul>
      </div>

      <input id="itxt_usuario_id" type="number" name="" value="">
    </div>
  </div>


  <div class="row pt-2">
    <div class="col-md-4">
      <div class="card box-shadow">
        <img class="card-img-top" src="{{ asset('assets/img/batman.jpg') }} " class="img-fluid"  alt="Responsive image Card image cap">
        <div class="card-body">
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.
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
    </div><!-- col-md-4 -->
    <div class="col-md-4">
      <div class="card box-shadow">
        <img class="card-img-top" src="{{ asset('assets/img/batman.jpg') }} " class="img-fluid"  alt="Responsive image Card image cap">
        <div class="card-body">
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.
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
    </div><!-- col-md-4 -->
    <div class="col-md-4">
      <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{ asset('assets/img/batman.jpg') }} " class="img-fluid"  alt="Responsive image Card image cap">
        <div class="card-body">
          <p class="card-text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.
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
    </div><!-- col-md-4 -->


    </div><!-- row -->

    <script>
    // $("#btn_usuario_update").click(function(e){
    //   e.preventDefault();
    //   // obj_usuario.create();
    //   alert("btn_usuario_update");
    // });


    function realizaProceso(){
          var id = $("#itxt_usuario_id").val();

            $.ajax({
                    data:  {'id':id},
                    url:   'usuario/update',
                    type:  'post',
                    'dataType' : 'json',
                    headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    beforeSend: function () {
                            // $("#resultado").html("Procesando, espere por favor...");
                    },
                    success:  function (data) {
                      var usuarios = data.usuarios;
                      console.info(usuarios);

                      var str_html ="";
                      for (var i = 0; i < usuarios.length; i++) {
                        console.info(usuarios[i]);
                        str_html += '<li>'+usuarios[i]['id']+' '+usuarios[i]['name']+'</li>' ;
                      }
                      $("#div_idusuarios").empty();
                      $("#div_idusuarios").append(str_html);
                    }
            });
    }
    </script>
@endsection

{{-- <script type="text/javascript" src="js/jquery.js"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('assets/jquery/jquery-3.2.1.min.js') }}" ></script> --}}
