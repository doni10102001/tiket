@extends('layouts.layout-admin')
@section('title')
	@if(!$show)
	Tiket Online | Admin - Perbaharui Data Kategori {{ $category->type }}
	@else 
	Tiket Online | Admin - Data Kategori {{ $category->type }} 
	@endif
@stop
@section('content')
<div class="card shadow mb-4">
	<!-- Card Header - Dropdown -->
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Kategori {{ $category->type }}</h6>
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
			<form action="{{route('admin.manage-category.store')}}" method="post" class="mt-4">
				@endif
				@csrf
				<input type="hidden" name="id" value="{{$category->id}}">
				<div class="form-group mt-4">
					<label class="control-label">Nama Kategori *</label>
					<input type="text" name="type" @if($show) {{'disabled'}} @endif class="form-control" required="" value="{{$category->type}}" placeholder="Masukan Kategori">      
				</div>
				<div class="form-group">
					<label class="control-label">Icon Kategori*</label>
					<select class="form-control selectpicker" name="icon" @if($show) {{'disabled'}} @endif required="" id="icon">
						<option selected="" disabled="" value="">Pilih</option>
						<option value="fa-train" @if($category->icon == 'fa-train') {{'selected'}} @endif data-icon="fa-train">Kereta api</option>
						<option value="fa-plane" @if($category->icon == 'fa-plane') {{'selected'}} @endif data-icon="fa-plane">Pesawat</option>
					</select>
				</div>
				<div class="form-group">
					<label>Deskripsi :</label>
					<textarea name="desc" id="desc" @if($show) {{'disabled'}} @endif cols="30" rows="5" class="form-control">{{$category->desc}}</textarea>
				</div>
				<div class="form-group">
					@if(!$show)
					<button class="btn btn-primary float-right">Update</button>
					@else
					<a href="{{route('admin.manage-category')}}" class="btn btn-success float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endif
				</div>
			</form>
		</div>
	</div>
</div>
@stop