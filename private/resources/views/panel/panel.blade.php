@extends('templates/panel')

@section('content')
    <div class="row">
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
    </div><!-- row -->

@endsection
