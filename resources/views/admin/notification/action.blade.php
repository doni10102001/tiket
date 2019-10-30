<form action="{{route('admin.manage-info.delete', $id)}}" method="post">
	@csrf
	<a href="{{route('admin.manage-info.edit', $id)}}" class="btn btn-primary btn-sm">Edit</a>
	<button class="btn btn-danger btn-sm">Hapus</button>
	<input type="hidden" name="_method" value="DELETE">
</form>
