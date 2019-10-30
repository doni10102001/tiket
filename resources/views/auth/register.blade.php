@extends('layouts.layout-login')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Daftar</h5>
            <form class="form-signin" action="{{route('register')}}" method="post">
                @csrf
              <div class="form-label-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nama" required autofocus>
                <label for="name">Nama</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Alamat Email" required autofocus>
                <label for="inputEmail">Alamat Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Konfirmasi Password" required>
                <label for="password-confirm">Konfirmasi Password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Daftar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection