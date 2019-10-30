@extends('layouts.layout-admin')
@section('judul')
Tambah Kategori
@stop
@section('content')
<div class="container">
	<div class="row" id="form">
		<div class="col-md-6 offset-md-3">
			<form action="{{route('admin.manage-category.store')}}" method="post" class="mt-4">
				@csrf
				<h3>Form Kategori Transportasi</h3>
				<div class="form-group mt-5">
					<select name="type" class="form-control" required id="icon">
						<option value="">-Pilih Kategori-</option>
						<option data-icon="fa-plane" value="Pesawat">Pesawat</option>
						<option data-icon="fa-train" value="Kereta api">Kereta api</option>
					</select>
				</div>
				<div class="form-group">
					<label>Deskripsi :</label>
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