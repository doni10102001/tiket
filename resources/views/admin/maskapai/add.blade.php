@extends('layouts.layout-admin')
@section('judul')
	Maskapai
@stop
@section('content')
	<div class="container">
		<div class="row" id="form">
			<div class="col-md-6 offset-md-3">
				<form action="{{route('admin.manage-maskapai.store')}}" method="post">
					@csrf
					<h3 align="center">Form Transportasi</h3>
					<div class="form-group">
						<label for="name">Nama :</label>
						<input type="text" name="name" id="name" placeholder="Nama Transportasi" class="form-control" required="" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="desc">Deskripsi :</label>
						<textarea name="desc" id="desc" cols="30" rows="5" class="form-control"></textarea>
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