@extends('layouts.layout-admin')
@section('judul')
Edit Reservation
@stop
@section('content')
<div class="conteiner mt-4">
@if(!$show)
	<form action="{{route('admin.manage-reservation.store')}}" method="post">
@endif	
		<div class="row justify-content-center" id="form-2">
		@csrf
			<input type="hidden" name="id" value="{{$reservation->id}}">
			<div class="col-sm-5 col-xs-12">
				<div class="form-group mt-5">
					<label>Nama</label>
					<input type="text" name="name" value="{{$reservation->name}}" @if($show) {{'disabled'}} @endif class="form-control" autocomplete="off" required="" placeholder="Masukkan Tujuan Keberangkatan">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" value="{{$reservation->email}}" @if($show) {{'disabled'}} @endif class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" value="{{$reservation->phone}}" class="form-control" id="" required="" placeholder="Masukkan Keterangan Penerbangan" @if($show) {{'disabled'}} @endif>
				</div>
				<div class="form-group">
					<label>Total Ticket</label>
					<input type="number" name="qty" value="{{$reservation->qty}}" class="form-control">	
				</div>
				<div class="form-group">
					<label>Total Harga</label>
					<input type="text" name="cost" value="{{$reservation->cost}}" class="form-control">
				</div>
				<div class="form-group">
					<label>Tgl Booking</label>
					<input type="text" name="booking_date" value="{{$reservation->booking_date}}" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</div>	
		</div>
	</div>
@stop