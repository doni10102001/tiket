@extends('layouts.layout-admin')
@section('title')
Tiket Online | Admin - Perbaharui Data Users
@stop
@section('content')
<div class="card shadow mb-4">
	<!-- Card Header - Dropdown -->
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data {{ $user->name }}</h6>
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
			<form action="{{route('admin.manage-member.store')}}" method="post">
				@endif
				@csrf
				<input type="hidden" name="id" value="{{$user->id}}">
				<h3>@if(!$show) <i class="fa fa-user"></i> Update User @else Detail User @endif</h3>
				<div class="form-group">
					<label for="exampleFormControlInput1">Nama*</label>
					<input type="text" name="name" @if($show) {{'disabled'}} @endif class="form-control" id="exampleFormControlInput1" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="email">Email :</label>
					<input type="text" name="email" class="form-control" value="{{$user->email}}" required="" @if($show) {{'disabled'}} @endif autocomplete="off">
				</div>
				<div class="form-group">
					<label for="phone">Kontak :</label>
					<input type="text" name="phone" class="form-control" value="{{$user->phone}}" required="" @if($show) {{'disabled'}} @endif autocomplete="off">
				</div>
				<div class="form-group float-right">
					@if(!$show)
					<button class="btn btn-primary">Simpan</button>
					@else
					<a href="{{route('admin.manage-member')}}" class="btn btn-success"> <i class="fa fa-arrow-left"></i> Kembali</a>
					@endif
				</div>
			</form>
		</div>
	</div>
</div>
@stop