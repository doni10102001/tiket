<form action="{{route('admin.manage-reservation.delete', $id)}}" method="post">
	@csrf
	<a href="{{route('admin.manage-reservation.edit', $id)}}" class="btn btn-success btn-sm">Edit</a>
	<button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?');">Hapus</button>
	<input type="hidden" name="_method" value="DELETE">
</form>