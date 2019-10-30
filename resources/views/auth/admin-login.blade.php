@extends('layouts.login-admin')

@section('content')

<div class="container mt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login Admin</h5>
            <form class="form-signin" action="{{route('admin-login')}}" method="post">
                @csrf
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Alamat Email" required autofocus>
                <label for="inputEmail">Alamat Email</label>
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
