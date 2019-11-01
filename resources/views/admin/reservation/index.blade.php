@extends('layouts.layout-admin')
@section('title')
  Tiket Online | Admin - Data Reservasi Tiket
@stop
@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-users"></i>
          <span>Data Reservation</span></h6>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <br>
        <table class="table table-striped table-bordered" id="reservation-manage">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Total Tiket</th>
                    <th>Total Harga</th>
                    <th>Tgl Booking</th>  
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
    $('#reservation-manage').DataTable({
     order: [[0,'desc']], 
     processing: true,  
     responsive: true,
     serverside: true,
     ajax: {
      "url": "{{ route('admin.manage-reservation.data')}}", 
      "type": "GET", 
     }, 
     columns: [
        {data: 'id', name:'id',},
        {data: 'kode_trx', name:'kode_trx',},
        {data: 'name', name: 'name', },
        {data: 'email', name: 'email', },
        {data: 'phone', name: 'phone', },
        {data: 'qty', name: 'qty', },
        {data: 'cost', name: 'cost', },
        {data: 'booking_date', name: 'booking_date', },
        {data: 'action', name: 'action', orderable: false, searchable: false,},
     ]
    });
  });
</script>
@endpush