@extends('layouts.layout-admin')

@section('judul')
	Add Ticket
@stop

@section('content')
	<div class="conteiner mt-4">	
	<form accept-charset="utf-8" enctype="multipart/form-data" action="{{route('admin.manage-ticket.store')}}" method="post">
		@csrf
		<div class="row" id="form-2">
			<div class="col-sm-5 ml-5">
				<div class="form-group mt-4">
					<label for="source">Asal Keberangkatan</label>	
					<input type="text" name="source" id="source" class="form-control" autocomplete="off" required="" placeholder="Masukkan Asal Keberangkatan">
				</div>
				<div class="form-group">
					<label for="destination">Tujuan Keberangkatan</label>
					<input type="text" name="destination" id="destination" class="form-control" autocomplete="off" required="" placeholder="Masukkan Tujuan Keberangkatan">
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" name="image" class="form-control">
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<input type="text" name="desc" class="form-control" id="" required="" placeholder="Masukkan Keterangan Penerbangan">
				</div>
				<div class="form-group">
					<label>Kategori</label>
					<select name="category_id" id="" class="form-control" required="">
						<option value="">-Pilih Kategori-</option>
					@foreach($category as $key)
						<option value="{{$key->id}}" data-icon="{{$key->icon}}">{{$key->type}}</option>
					@endforeach	
					</select>		
				</div>
			</div>	
		<div class="col-sm-4 mt-2 ml-5">
			<div class="form-group mt-4">
				<label>Maskapai</label>
				<select name="maskapai_id" id="" class="form-control">
					<option value="">-Pilih-</option>
					@foreach($maskapai as $value)
					<option value="{{$value->id}}">{{$value->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Harga /ticket</label>
				<input type="text" name="price" id="price" class="form-control" required="" autocomplete="off" placeholder="Masukkan Harga per ticket">
			</div>
			<div class="form-group">
				<label>Stock ticket</label>
				<input type="number" name="stock" class="form-control" id="stock" max="1000" min="1" value="1">
			</div>
			<div class="form-group">
				<label class="control-label">Tanggal Keberangkatan*</label>
				<input type="text" class="form-control datepicker" id="takeoff" name="takeoff_date" placeholder="Klik disini">
			</div>
			<div class="form-group">
				<label class="control-label">Waktu Keberangkatan*</label>
				<input type="text" name="takeoff_time" class="form-control timepicker" placeholder="Klik disini">
			</div>
			<div class="form-group">
				<button class="btn btn-primary">Simpan</button>
			</div>
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