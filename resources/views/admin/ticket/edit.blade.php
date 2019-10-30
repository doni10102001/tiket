@extends('layouts.layout-admin')
@section('judul')
	Add Ticket
@stop
@section('content')
	<div class="conteiner mt-4">
@if(!$show)
	<form action="{{route('admin.manage-ticket.store')}}" method="post" enctype="multipart/form-data">
@endif	
		<div class="row justify-content-center" id="form-2">
		@csrf
			<input type="hidden" name="id" value="{{$ticket->id}}">
			<div class="col-sm-5 col-xs-12">
				<div class="form-group mt-4">
					<label for="source">Asal Keberangkatan</label>	
					<input type="text" name="source" id="source" value="{{$ticket->source}}" @if($show) {{'disabled'}} @endif class="form-control" autocomplete="off" required="" placeholder="Masukkan Asal Keberangkatan">
				</div>
				<div class="form-group">
					<label for="destination">Tujuan Keberangkatan</label>
					<input type="text" name="destination" id="destination" value="{{$ticket->destination}}" @if($show) {{'disabled'}} @endif class="form-control" autocomplete="off" required="" placeholder="Masukkan Tujuan Keberangkatan">
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" name="image" value="{{$ticket->image}}" @if($show) {{'disabled'}} @endif class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<input type="text" name="desc" value="{{$ticket->desc}}" class="form-control" id="" required="" placeholder="Masukkan Keterangan Penerbangan" @if($show) {{'disabled'}} @endif>
				</div>
				<div class="form-group">
					<label>Kategori</label>
					<select name="category_id" id="" @if($show) {{'disabled'}} @endif  class="form-control" required="">
						<option value="">-Pilih Kategori-</option>
					@foreach($category as $key => $data)
						@if($ticket->category_id == $data->id)
						<option value="{{$data->id}}" data-icon="{{$data->icon}}" selected="">{{$data->type}}</option>
						@else
						<option value="{{$data->id}}" data-icon="{{$data->icon}}">{{$data->type}}</option>
						@endif
					@endforeach	
					</select>		
				</div>
			</div>	
		<div class="col-sm-4 col-xs-12 mt-4 ml-5">
			<div class="form-group mt-4">
				<label>Maskapai</label>
				<select name="maskapai_id" id="" @if($show) {{'disabled'}} @endif   class="form-control">
					<option value="">-Pilih Maskapai-</option>
					@foreach($maskapai as $value => $data)
						@if($ticket->maskapai_id == $data->id)
						<option value="{{$data->id}}" selected="">{{$data->name}}</option>
						@else
						<option value="{{$data->id}}">{{$data->name}}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Harga /ticket</label>
				<input type="text" name="price" id="price" value="{{$ticket->price}}" @if($show) {{'disabled'}} @endif class="form-control" required="" autocomplete="off" placeholder="Masukkan Harga per ticket">
			</div>
			<div class="form-group">
				<label>Stock ticket</label>
				<input type="number" name="stock" value="{{$ticket->stock}}" @if($show) {{'disabled'}} @endif class="form-control" id="stock" max="1000" min="1" value="1">
			</div>
			<div class="form-group">
				<label class="control-label">Tanggal Keberangkatan*</label>
				<input type="text" class="form-control datepicker" id="takeoff" name="takeoff_date" placeholder="Klik disini" value="{{$ticket->takeoff_date}}" @if($show) {{'disabled'}} @endif>
			</div>
			<div class="form-group">
				<label class="control-label">Waktu Keberangkatan*</label>
				<input type="text" name="takeoff_time" class="form-control timepicker" placeholder="Klik disini" value="{{$ticket->takeoff_time}}" @if($show) {{'disabled'}} @endif>
			</div>
			<div class="form-group">
				@if(!$show)
				<button class="btn btn-primary">Simpan</button>
				@else <a href="{{route('admin.manage-ticket')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali @endif</a>
			</div>
		</div>
			
	</form>
	<div id="show-datepicker"></div>
	<div id="show-timepicker"></div>
</div>
	
@stop

@push('scripts')
	<script src="{{asset('js/core/vanilla-masker.min.js')}}"></script>
	<script src="{{asset('js/core/legacy.js')}}"></script>
	<script src="{{asset('js/picker.js')}}"></script>
	<script src="{{asset('js/core/picker.date.js')}}"></script>
	<script src="{{asset('js/core/picker.time.js')}}"></script>

	<script>
		$(document).ready(function(){
			// IDR HARGA 
			VMasker(document.querySelector("#price")).maskMoney({
				unit: 'IDR',
				precision: 0,
				zeroCents: true
			});
			// Stock
			VMasker(document.querySelector("#stock")).maskNumber();
			// Tanggal
			var $date = $('.datepicker').pickadate({
				formatSubmit: 'yyyy-mm-dd',
				hiddenName: true,
				min: [2018, 10, 10],
				container: '#show-datepicker',
				closeOnSelect: true,
				closeOnClear: true,
			});
			var datepicker = $date.pickadate('datepicker');
			// Waktu
			var $time = $('.timepicker').pickatime({
				container: '#show-timepicker',
				formatSubmit: 'HH:i', 
				closeOnSelect: true,
            	closeOnClear: true,
			});
			var timepicker = $time.pickatime('timepicker');
		});
	</script>

@endpush