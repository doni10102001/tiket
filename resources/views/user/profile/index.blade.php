@extends('layouts.layout-user')

@section('judul')
Edit Profile
@stop

@section('content')
	<div class="container mt-5">
		<div class="row justify-content-center">
			@if($user = Auth::user())
			<form action="{{route('user.profile-store', ($user->id))}}" enctype="multipart/form-data" method="post">
				@csrf
				<div class="col-md-4">
					<img src="{{asset('upload/' . $user->photo)}}" class="rounded-circle" style="width: 100%;" height="100">
					<label for="oke" class="btn btn-secondary btn-sm">Pilih Gambar</label>
					<input id="oke" type="file" name="photo" style="display: none;">
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label class="control-label">Nama :</label>
	                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" autocomplete="off">
                	</div>
					<div class="form-group">
	                    <label class="control-label">Alamat :</label>
						 <textarea name="address" class="form-control">{{$user->address}}</textarea>
	                </div>
					<div class="form-group">
	                    <label class="control-label">Phone</label>
						<input type="text" name="phone" class="form-control" value="{{ $user->phone }}" autocomplete="off">
	                </div>
					<div>
	                    <label class="control-label">E-mail</label>
						<input type="text" name="email" class="form-control" value="{{ $user->email }}" autocomplete="off">
					</div><br>
	                <button class="btn btn-md btn-primary" type="submit">Edit</button>
	                <br>
					@endif
				</div>
			</form>
		</div>
	</div>
@stop