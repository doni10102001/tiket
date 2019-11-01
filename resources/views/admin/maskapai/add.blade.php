@extends('layouts.layout-admin')
@section('title')
	Tiket Online | Admin - Tambah Data Maskapai
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
			<form action="{{route('admin.manage-maskapai.store')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Nama Transportasi :</label>
					<input type="text" name="name" id="name" class="form-control" required="" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="desc">Deskripsi :</label>
					<textarea name="desc" id="desc" class="form-control" required=""></textarea>
				</div>
				<button class="btn btn-primary float-right">Simpan</button>
				<a href="{{route('admin.manage-ticket')}}" class="btn btn-success float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
			</form>
		</div>
	</div>
</div>
@stop