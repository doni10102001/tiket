<form action="{{route('admin.manage-message.delete', $id)}}" method="post">
	@csrf
	<center>
		<span onclick="return confirm('Hapus?');"><button class="btn btn-danger btn-sm">Hapus</button></span>
		<input type="hidden" name="_method" value="DELETE">
	</center>
</form>