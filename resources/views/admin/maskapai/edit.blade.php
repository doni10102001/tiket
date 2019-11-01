@extends('layouts.layout-admin')
@section('title')
@if(!$show)
 	Tiket Online | Admin - Perbaharui Data Maskapai
 @else 
 	Tiket Online | Admin - Data Maskapai
@endif
@stop
@section('content')
<div class="card shadow mb-4">
	<!-- Card Header - Dropdown -->
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Maskapai</h6>
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
			<form action="{{route('admin.manage-maskapai.store')}}" method="post">
				@endif
				@csrf
				<input type="hidden" name="id" value="{{ $maskapai->id }}">
				<div class="form-group">
					<label for="name">Nama Transportasi :</label>
						<input type="text" name="name" id="name" class="form-control" value="{{$maskapai->name}}" required="" @if($show) {{'disabled'}} @endif autocomplete="off">
				</div>
				<div class="form-group">
					<label for="desc">Deskripsi :</label>
					<textarea name="desc" id="desc" @if($show) {{'disabled'}} @endif cols="30" rows="5" class="form-control" required="">{{$maskapai->desc}}</textarea>
				</div>
				@if(!$show)
				<button class="btn btn-primary float-right">Simpan</button>
				@else <a href="{{route('admin.manage-ticket')}}" class="btn btn-success float-right"><i class="fa fa-arrow-left"></i> Kembali @endif</a>
			</form>
		</div>
	</div>
</div>
@stop