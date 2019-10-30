@extends('layouts.layout-admin')
@section('judul')
Member
@stop
@section('content')
<div class="container mt-5">
	<div class="col-sm-8">
		<i class="fa fa-user"></i> {{__('Pengaturan Member')}}
		{{-- <div class="table-responsive mt-3"> --}}
			 <table class="table table-striped table-bordered dt-responsive nowrap" id="member-manage" border="1">
        		<tr>
          			<thead>
            			<th>{{__('Id')}}</th>
            			<th>Nama</th>
            			<th>Email</th>
            			<th>Kontak</th>  
            			<th>Aksi</th>
          			</thead>
        		</tr>
      		</table>
		{{-- </div> --}}
	</div>
</div>
@stop
@push('scripts')
<script>
	$(function(){
		$('#member-manage').DataTable({
			order: [[0, 'desc']],
			processing : true,
			responsive : true,
			serverSide : true,
			ajax : '{!! route('admin.manage-member.data') !!}',
			columns: [
				{data: 'id', name: 'id', width: '15px',},
				{data: 'name', name: 'name', width: '120px',},
				{data: 'email', name: 'email', width: '120px',},
				{data: 'phone', name: 'phone', width: '80px',},
				{data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
			]
		});
	});
</script>
@endpush