<form action="{{route('admin.manage-maskapai.delete', $id)}}" method="post">
	@csrf
	<a href="{{route('admin.manage-maskapai.show', $id)}}" class="btn btn-info btn-sm">Lihat</a>
	<a href="{{route('admin.manage-maskapai.edit', $id)}}" class="btn btn-success btn-sm">Edit</a>
	<span onclick="return confirm('Hapus?');"><button class="btn btn-danger btn-sm">Hapus</button></span>
	<input type="hidden" name="_method" value="DELETE">
</form>