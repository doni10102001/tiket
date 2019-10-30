@extends('layouts.layout-admin')
@section('judul')
Tambah Kategori
@stop
@section('content')
<div class="container">
	<div class="row" id="form">
		<div class="col-md-6 offset-md-3">
			<form action="{{route('admin.manage-info.store')}}" method="post" class="mt-4">
				@csrf
				<h3>Form Kategori Transportasi</h3>
				<input type="hidden" name="id" value="{{$notification->id}}">
				<div class="form-group mt-5">
					<label>Deskripsi :</label>
					<textarea name="description" id="desc" cols="30" rows="5" class="form-control" required="">{{$notification->description}}</textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Submit</button>
				</div>
				<p class="copyright">Designed by <a title="Colorlib">Dani</a></p>
			</form>
		</div>
	</div>
</div>
@stop