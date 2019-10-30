@extends('layouts.layout-admin')
@section('judul')
Maskapai
@stop
@section('content')
<div class="container">
	<div class="col-sm-8 mt-5">
		<i class="fa fa-plane"></i> {{__('Pengaturan Maskapai')}}	
		<a href="{{route('admin.manage-maskapai.add')}}" class="pull-right btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data</a>		
			<table class="table table-striped table-bordered dt-responsive nowrap" id="maskapai-manage" border="1">
				<tr>
					<thead>
						<th>Id</th>
						<th>Nama Transportasi</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</thead>
				</tr>
			</table>
	</div>
</div>
@stop
@push('scripts')
<script>
	$(function(){
		$('#maskapai-manage').DataTable({
			order: [[0, 'desc']],
			processing : true,
			responsive : true,
			serverSide : true,
			ajax: '{!! route('admin.manage-maskapai.data') !!}',
			columns: [
			{data: 'id', name: 'id', width: 'auto'},
			{data: 'name', name: 'name',},
			{data: 'desc', name: 'desc',},
			{data: 'action', name: 'action', orderable: false, searchable: false,},
			]
		});
	});
</script>
@endpush