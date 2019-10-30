@extends('layouts.layout-admin')
@section('judul')
Update Maskapai
@stop
@section('content')
	<div class="container">
		<div class="row" id="form">
			<div class="col-md-6 offset-md-3">
			@if(!$show)
			<form action="{{route('admin.manage-maskapai.store')}}" method="post">
			@endif
				@csrf
				<input type="hidden" name="id" value="{{ $maskapai->id }}">
				<h3>@if(!$show) <i class="fa fa-plane"></i> Update Maskapai @else Detail Maskapai @endif </h3>
				<div class="form-group">
					<label for="name">Nama Transportasi :</label>
					<input type="text" name="name" id="name" class="form-control" value="{{$maskapai->name}}" required="" @if($show) {{'disabled'}} @endif autocomplete="off">
				</div>
				<div class="form-group">
					<label for="desc">Deskripsi :</label>
					<textarea name="desc" id="desc" @if($show) {{'disabled'}} @endif cols="30" rows="5" class="form-control" required="">{{$maskapai->desc}}</textarea>
				</div>
				<div class="form-group">
					@if(!$show)
					<button class="btn btn-primary">Simpan</button>
					@else
					<a href="{{route('admin.manage-maskapai')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endif
				</div>
				<p class="copyright">Designed by <a title="Colorlib">Dani</a></p>
			</form>
		</div>
	</div>
</div>
@stop