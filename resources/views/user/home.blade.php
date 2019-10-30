@extends('layouts.layout-user')

@section('content')
<section class="page-user">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 text-center">
                <h5 class="display-4" style="margin-top: 12%;">Hai Travellers Dapatkan Ticket Terbaik Di  <span class="bg-main">D</span>Ticket</h5>
            </div>
            <div class="col-md-8 text-center">
                <a href="{{route('user.cari-tiket')}}" class="btn btn-primary btn-lg">Cari Sekarang</a>
            </div>
        </div>
    </div>       
</section>

<hr class="my-4">
<div class="container-fluid padding mt-5">
    <div class="row justify-content-center mt-3" id="head">
        <div class="col-sm-4 col-xs-12">
            <form action="{{route('user.search')}}" method="post">
                @csrf
                <div class="form-group mt-4 ml-3">
                    <label>Asal Berangkat</label>
                    <input type="text" name="source" class="form-control" autocomplete="off">  
                </div>
                <div class="form-group ml-3">
                     <label>Tujuan</label>
                    <input type="text" name="destination" class="form-control" autocomplete="off">
                </div>
                <div class="form-group ml-3">
                    <button class="btn btn-primary">Cari Tiket</button>
                </div>
            </form>
        </div>
    </div>
    <hr class="my-4">
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header  bg-secondary">
                    <h3 class="display-1s text-white text-center">Contact Us</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('user.message')}}" method="post">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="email">E-mail</label>
                            <input type="text" id="email" name="email" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="5" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
            
            
        </div>
    </div>
</div>


@endsection