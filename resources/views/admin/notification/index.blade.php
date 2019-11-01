@extends('layouts.layout-admin')
@section('title')
	Tiket Online | Admin - Data Pemberitahuan / Notifikasi
@stop
@section('content')
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-bell"></i>
          <span>Data Pemberitahuan / Notifikasi</span></h6>
    <div class="dropdown no-arrow">
      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <div class="dropdown-header">Dropdown Header:</div>
        <a class="dropdown-item" href="{{ route('admin.manage-info.tambah') }}">Tambah Data</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
  </div>
  <!-- Card Body -->
  <div class="card-body">
    <br>
    <table class="table table-striped table-bordered" id="info-manage">
      <thead>
        <tr class="text-center">
          <th>No</th>
		  <th>Deskripsi</th>
          <th>Opsi</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@stop
@push('scripts')
<script>
	$(function(){
		$('#info-manage').DataTable({
			order: [[0, 'desc']],
			processing : true,
			responsive : true,
			serverSide : true,
			ajax : '{!! route('admin.manage-info.data') !!}',
			columns: [
				{data: 'id', name: 'id', width: '15px',},
				{data: 'description', name: 'description', width: '120px',},
				{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
</script>
@endpush