@extends('layouts.layout-admin')
@section('title')
@if(!$show)
Tiket Online | Admin - Perbaharui Data Tiket
@else
Tiket Online | Admin - Data Tiket {{ $ticket->kode_tkt }}
@endif
@stop
@section('content')
<!-- Content Row -->

<div class="row">

	<!-- Area Chart -->
	<div class="col-xl-8 col-lg-7">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data Tiket {{ $ticket->kode_tkt }}</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Dropdown Header:</div>
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				<div class="chart-area">
					@if(!$show)
					<form action="{{route('admin.manage-ticket.store')}}" method="post" enctype="multipart/form-data">
						@endif
						@csrf
						<input type="hidden" name="id" value="{{$ticket->id}}">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="asalkeberangkatan">Asal Keberangkatan*</label>
								<input type="text" name="source" class="form-control" id="asalkeberangkatan" value="{{ $ticket->source }}" @if($show) {{ 'disabled' }} @endif>
							</div>
							<div class="form-group col-md-6">
								<label for="tujuan">Tujuan Keberangkatan*</label>
								<input type="text" name="destination" class="form-control" id="tujuan" value="{{ $ticket->destination }}" @if($show) {{ 'disabled' }} @endif>
							</div>
						</div>
						<div class="form-group">
							<label>Maskapai*</label>
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
							<label>Harga Pertiket*</label>
							<input type="text" name="price" id="price" value="{{$ticket->price}}" @if($show) {{'disabled'}} @endif class="form-control" required="" autocomplete="off" placeholder="Masukkan Harga per ticket">
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image" value="{{$ticket->image}}" @if($show) {{'disabled'}} @endif class="form-control" required="">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="control-label">Tanggal Keberangkatan*</label>
								<input type="text" class="form-control datepicker" id="takeoff" name="takeoff_date" placeholder="Klik disini" value="{{$ticket->takeoff_date}}" @if($show) {{'disabled'}} @endif>
							</div>
							<div class="form-group col-md-4">
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
							<div class="form-group col-md-2">
								<label>Stock ticket</label>
								<input type="number" name="stock" value="{{$ticket->stock}}" @if($show) {{'disabled'}} @endif class="form-control" id="stock" max="1000" min="1" value="1">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Waktu Keberangkatan*</label>
							<input type="text" name="takeoff_time" class="form-control timepicker" placeholder="Klik disini" value="{{$ticket->takeoff_time}}" @if($show) {{'disabled'}} @endif>
						</div>
						<div class="form-group">
							<label for="desc">Deskripsi*</label>
							<textarea name="desc" class="form-control" @if($show) {{ 'disabled' }} @endif>{{ $ticket->desc }}</textarea>
						</div>
						@if(!$show)
						<button class="btn btn-primary float-right">Simpan</button>
						@else <a href="{{route('admin.manage-ticket')}}" class="btn btn-success float-right"><i class="fa fa-arrow-left"></i> Kembali @endif</a>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Pie Chart -->
	<div class="col-xl-4 col-lg-5">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Kode QR</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
					</a>
					@if(!$show)
					<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
						<div class="dropdown-header">Pengaturan QR:</div>
						<a class="dropdown-item" href="#">Ubah QR</a>
						<a class="dropdown-item" href="#">Unduh QR</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
					@endif
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body">
				<div class="chart-pie pt-4 pb-2">
					<canvas id="myPieChart"></canvas>
				</div>
				<div class="mt-4 text-center small">
					<span class="mr-2">
						<i class="fas fa-circle text-primary"></i> Direct
					</span>
					<span class="mr-2">
						<i class="fas fa-circle text-success"></i> Social
					</span>
					<span class="mr-2">
						<i class="fas fa-circle text-info"></i> Referral
					</span>
				</div>
			</div>
		</div>
	</div>
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