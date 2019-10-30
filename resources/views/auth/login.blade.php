@extends('layouts.layout-login')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-5">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" action="{{route('login')}}" method="post">
                @csrf
            <div class="form-label-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="Nama" required autofocus>
                <label for="email">Email</label>
              </div>
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection