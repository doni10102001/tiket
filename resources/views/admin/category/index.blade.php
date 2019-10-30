@extends('layouts.layout-admin')
@section('judul')
Kategori
@stop
@section('content')
<div class="container mt-5">
  <div class="col-md-8" style="margin-left: 10em;">
      <i class="fa fa-clone"></i> {{__('Pengaturan Kategori')}}
      <a href="{{route('admin.manage-category.add')}}" class="pull-right"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</button></a>
   <div class="table-responsive mt-3">
      <table class="table table-striped table-bordered dt-responsive nowrap" id="category-manage" border="1">
        <tr>
          <thead>
            <th>{{__('Id')}}</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
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
    ajax: '{!! route('admin.manage-category.data') !!}',
    columns: [
    {data: 'id', name: 'id', width: '15px'},
    {data: 'type', name: 'type', width: '150px'},
    {data: 'desc', name: 'desc', },
    {data: 'action', name: 'action', width: '100px', orderable: false, searchable: false,},
    ]
  });
 });
</script>
@endpush