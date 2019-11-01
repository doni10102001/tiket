@extends('layouts.layout-admin')
@section('judul')
Message
@stop
@section('content')
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-envelope-open-text"></i>
          <span>Data Pesan / Contact Us</span></h6>
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
    <table class="table table-striped table-bordered" id="pesan-manage">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Tanggal</th>
          <th>Email</th>
          <th>Message</th>
          <th>Opsi</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
@stop
@push('scripts')
<script>
  $(function() {
   $('#pesan-manage').DataTable({
    order: [[0, 'desc']],
    processing: true,
    responsive: true,
    serverSide: true,
    ajax: '{!! route('admin.manage-message.data') !!}',
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '15px'},
    {data: 'date', name: 'date', width: '150px'},
    {data: 'email', name: 'email', width: '150px'},
    {data: 'message', name: 'message', width: '1000px'},
    {data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
    ]
  });
 });
</script>
@endpush