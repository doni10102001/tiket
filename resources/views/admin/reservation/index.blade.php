@extends('layouts.layout-admin')
@section('judul')
Pengaturan Ticket
@stop
@section('content')
<div class="container mt-5">
	<div class="col-sm-8">
		<i class="fa fa-ticket"></i> Pengaturan Ticket
			<table class="table table-striped table-bordered dt-responsive nowrap" id="reservation-manage" border="1">
				<tr>
					<thead>
						<th>Id</th>
						<th>Kode Transaksi</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Total Tiket</th>
						<th>Total Harga</th>
						<th>Tgl Booking</th>
						<th>Aksi</th>
					</thead>
				</tr>
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