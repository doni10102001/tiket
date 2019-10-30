@extends('layouts.layout-admin')
@section('judul')
Update Kategori
@stop
@section('content')
<div class="container">
	<div class="row" id="form">
		<div class="col-md-6 offset-md-3">
		@if(!$show)
			<form action="{{route('admin.manage-category.store')}}" method="post" class="mt-4">
		@endif
				@csrf
				<input type="hidden" name="id" value="{{$category->id}}">
				<h3>@if(!$show) Edit Kategori @else Detail Kategori @endif</h3>
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
					<button class="btn btn-primary">Update</button>
					@else
					<a href="{{route('admin.manage-category')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endif
				</div>
				<p class="copyright">Designed by <a title="Colorlib">Dani</a></p>
			</form>
		</div>
	</div>
</div>
@stop