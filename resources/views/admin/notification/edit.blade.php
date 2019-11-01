@extends('layouts.layout-admin')
@section('judul')
Tambah Kategori
@stop
@section('content')
<div class="card shadow mb-4">
	<!-- Card Header - Dropdown -->
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Tambah Notifikasi/Pemberitahuan</h6>
	</div>
	<!-- Card Body -->
	<div class="card-body">
		<div class="chart-area">
			<form action="{{route('admin.manage-info.store')}}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{ $notification->id }}">
				<div class="form-group">
					<label for="desc">Deskripsi :</label>
					<textarea name="description" id="froala-editor" class="form-control" required="">{{ $notification->description }}</textarea>
				</div>
				<button class="btn btn-primary float-right">Simpan</button>
				<a href="{{route('admin.manage-info')}}" class="btn btn-success float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
			</form>
		</div>
	</div>
</div>
@stop
@push('scripts')
<script>
	new FroalaEditor('textarea#froala-editor')
</script>
@endpush