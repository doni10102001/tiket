@extends('layouts.layout-admin')
@section('judul')
Member
@stop
@section('content')
<div class="container mt-5">
	<div class="col-sm-8">
		<i class="fa fa-user"></i> {{__('Pengaturan Notification')}}
		<a href="{{route('admin.manage-info.tambah')}}" class="pull-right"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</button></a>
		 <table class="table table-striped table-bordered dt-responsive nowrap" id="member-manage" border="1">
    		<tr>
      			<thead>
        			<th>{{__('Id')}}</th>
        			<th>Description</th>
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
		$('#member-manage').DataTable({
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