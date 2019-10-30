@extends('layouts.layout-admin')
@section('judul')
	Update Member
@stop
@section('content')
	<div class="container">
		<div class="row justify-content-center" id="form">
			<div class="col-md-6">
				@if(!$show)
				<form action="{{route('admin.manage-member.store')}}" method="post">
				@endif
					@csrf
					<input type="hidden" name="id" value="{{$user->id}}">
					<h3>@if(!$show) <i class="fa fa-user"></i> Update Member @else Detail Member @endif</h3>
					<div class="form-group">
						<label for="name">Nama :</label>
						<input type="text" name="name" @if($show) {{'disabled'}} @endif class="form-control" value="{{$user->name}}" required=" " autocomplete="off">
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="text" name="email" class="form-control" value="{{$user->email}}" required="" @if($show) {{'disabled'}} @endif autocomplete="off">
					</div>
					<div class="form-group">
						<label for="phone">Kontak :</label>
						<input type="text" name="phone" class="form-control" value="{{$user->phone}}" required="" @if($show) {{'disabled'}} @endif autocomplete="off">
					</div>
					<div class="form-group">
						@if(!$show)
							<button class="btn btn-primary">Simpan</button>
						@else
							<a href="{{route('admin.manage-member')}}" class="btn btn-success"> <i class="fa fa-arrow-left"></i> Kembali</a>
						@endif
					</div>
					<p class="copyright">Designed by <a title="Colorlib">Dani</a></p>
				</form>
			</div>	
		</div>
	</div>
@stop