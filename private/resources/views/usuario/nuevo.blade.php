@extends('templates/layout')

@section('titulo')
  {{ $titulo }}
@endsection

@section('content')
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

  <div class="row">
    <div class="col-sm-8"></div>
    <div class="col-sm-2">
      <a class="btn btn-sm btn-outline-primary btn-block" href="{{ url('user') }}">Regresar</a>
    </div>
    <div class="col-sm-2">
      <button type="button" class="btn btn-sm btn-outline-primary btn-block">Guardar</button>
    </div>
  </div>
@endsection
