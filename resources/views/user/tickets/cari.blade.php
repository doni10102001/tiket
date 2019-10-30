@extends('layouts.layout-user')

@section('judul')
Cari Tiket
@stop

@section('content')
<div class="container" style="margin-top: 8%;">
	<div class="card">
		<div class="card-header bg-light">
			<i class="fa fa-ticket"></i> Cari Tiket
		</div>
		<div class="card-body">
			<div class="form-group text-center">
				<h3 class="h3">Pilih Transportasi</h3>
			</div>
			<form action="{{route('user.cari-tiket.all')}}" method="get" accept="charset-utf8">
				<div class="row">
					@foreach($category as $key => $data)
					<div class="col-md-6 text-center">
						<div class="form-group">
							<input type="radio" name="category_id" id="{{$data->type}}" class="input-hidden" value="{{$data->id}}" />
							<label for="{{$data->type}}">
								<span class="fa {{$data->icon}} fa-5x"></span>
							</label>
						</div>
					</div>
					@endforeach
				</div>
				<div class="clearfix"></div>
				<div class="form-group mt-5">
					<button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> {{__('Cari')}}</button>
				</div>
			</form>
		</div> 
	</div>
</div>
@stop