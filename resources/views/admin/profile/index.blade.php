@extends('layouts.layout-admin')
@section('judul')
Edit Profile
@stop
@section('content')
	<div class="container mt-5">
		<div class="row justify-content-center">
			@if($user = Auth::guard('admin')->user())
			<form action="{{route('admin.profile.store', ($user->id))}}" method="post">
				@csrf
				<div class="col-md-12">
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
					<div class="form-group mt-5">
						<button class="btn btn-md btn-primary" type="submit">Edit</button>
					</div>
	                
	                <br>
					@endif
				</div>
			</form>
		</div>
	</div>
@stop