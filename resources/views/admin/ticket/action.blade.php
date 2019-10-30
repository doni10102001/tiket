<form action="{{route('admin.manage-ticket.delete', $id)}}" method="post">
	@csrf
	<a href="{{route('admin.manage-ticket.show', $id)}}" class="btn btn-info btn-sm">Lihat</a>
	<a href="{{route('admin.manage-ticket.edit', $id)}}" class="btn btn-success btn-sm">Edit</a>
	<span onclick="return confirm('Hapus?');"><button class="btn btn-danger btn-sm">Hapus</button></span>
	<input type="hidden" name="_method" value="DELETE">
</form>