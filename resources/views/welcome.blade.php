@extends('layouts.app')
@section('judul')
DTicket
@stop
@section('content')
<header class="masthead text-white text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-top: 17%;">
        <h1 class="display-3">Selamat Datang Di <span class="bg-main">D</span>Ticket</h1>
      </div>
      <div class="col-md-12">
        <h3 class="display-5">Pesan Tiket Sekarang</h3>
        <a href="{{route('login')}}" class="btn btn-primary btn-lg">Mulai Sekarang</a>
        {{-- <a href="" class="btn btn-info btn-lg ml-3">Panduan aplikasi</a> --}}
      </div>
    </div>
  </div>    
</header>
<hr class="my-4">

<div class="container-fluid padding">
  <div class="row welcome text-center">
    <div class="col-12">
      <h1 class="display-4s"><span class="bg-main">D</span>Ticket?</h1>
    </div>
    <hr>
    <div class="col-12">
      <p class="lead" id="paragraf">
        <span class="bg-main">D</span>Ticket adalah aplikasi web yang digunakan untuk mempermudah  pemesanan tiket secara online. Mengapa  D_Ticket?, Karena Memesan tiket di D_Ticket Lebih Mudah, efektif dan efisien. Aplikasi untuk saat ini masih dalam tahap pengembangan. Untuk saat ini D_Ticket melayani 2 kategori tiket, yaitu pesawat dan kereta api.
      </p>    
    </div>  
  </div>
  <hr class="my-4">
</div>

<div class="container">
  <h1 class="display-4s text-center">Rekomendasi Destinasi Wisata</h1>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card">
          <img src="{{asset('img/bali.jpg')}}" class="card-img-top" alt="Bali" width="350" height="250">
          <div class="overlay">
            <div class="text">Pulau Bali</div>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="{{asset('img/candiborobudur.jpg')}}" class="card-img-top" alt="Borobudur" width="350" height="250">
        <div class="overlay">
          <div class="text">Candi Borobudur</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="{{asset('img/bandung.jpg')}}" class="card-img-top" alt="Raja Ampat" width="350" height="250">
        <div class="overlay">
          <div class="text">Bandung</div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card">
          <img src="{{asset('img/rajaampat.jpg')}}" class="card-img-top" alt="Bali" width="350" height="250" class="rounded">
          <div class="overlay">
            <div class="text">Raja Ampat</div>
          </div>  
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="{{asset('img/kawah_ijen.jpg')}}" class="card-img-top" alt="Raja Ampat" width="350" height="250">
        <div class="overlay">
          <div class="text">Kawah Ijen</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="{{asset('img/gunung_rinjani.jpg')}}" class="card-img-top" alt="Borobudur" width="350" height="250">
        <div class="overlay">
          <div class="text">Gunung Rinjani</div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-4">
</div>

@stop