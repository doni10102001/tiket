@extends('layouts.layout-admin')
@section('judul')
Message
@stop
@section('content')
<div class="container mt-5">
  <div class="col-md-8" style="margin-left: 10em;">
      <i class="fa fa-clone"></i> {{__('Pengaturan Kategori')}}
   <div class="table-responsive mt-3">
      <table class="table table-striped table-bordered dt-responsive nowrap" id="category-manage" border="1">
        <tr>
          <thead>
            <th>{{__('Id')}}</th>
            <th>Email</th>
            <th>Message</th>
            <th>Aksi</th>  
          </thead>
        </tr>
      </table>
     </div>
  </div>
</div>
@stop
@push('scripts')
<script>
  $(function() {
   $('#category-manage').DataTable({
    order: [[0, 'desc']],
    processing: true,
    responsive: true,
    serverSide: true,
    ajax: '{!! route('admin.manage-message.data') !!}',
    columns: [
    {data: 'id', name: 'id', width: '15px'},
    {data: 'email', name: 'email', width: '150px'},
    {data: 'message', name: 'message', },
    {data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
    ]
  });
 });
</script>
@endpush