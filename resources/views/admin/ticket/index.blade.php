@extends('layouts.layout-admin')
@section('judul')
Pengaturan Ticket
@stop
@section('content')
<div class="container mt-5">
	<div class="col-sm-8">
		<i class="fa fa-ticket"></i> Pengaturan Ticket
		<a href="{{route('admin.manage-ticket.add')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
			<table class="table table-striped table-bordered dt-responsive nowrap" id="manage-ticket" border="1">
				<tr>
					<thead>
						<th>Id</th>
						<th>Kode</th>
						<th>Asal</th>
						<th>Tujuan</th>
						<th>Harga</th>
						<th>Stock</th>
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
		$('#manage-ticket').DataTable({
			order: [[0, 'desc']],
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: '{!! route('admin.manage-ticket.data') !!}',
			columns: [
				{data: 'id', name: 'id', width: '50px'},
				{data: 'kode_tkt', name: 'kode_tkt', width: '50px'},
				{data: 'source', name: 'source', width: '110px'},
				{data: 'destination', name: 'destination', width: '110px'},
				{data: 'price', name: 'price'},
				{data: 'stock', name: 'stock'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});
	});
</script>
@endpush