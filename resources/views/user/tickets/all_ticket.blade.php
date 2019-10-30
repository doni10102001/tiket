@extends('layouts.layout-user')

@section('judul')
Ticket
@stop

@section('content')
<div class="container mt-5">	
	<i class="fa fa-ticket"></i> @if($id){{$category->type}} @else Semua Kategori @endif
		<div class="row mt-4">
					@foreach($ticket as $data => $key )
					<div class="col-xs-12 col-sm-12 col-md-3">
						<div class="card">
							<div class="class card-header">
								<h6 class="card-title text-center">{{$key->kode_tkt}}</h6>
							</div>
							<img class="rounded" src="{{asset('upload/' . $key->image)}}" alt="Card image" style="width:100%">
							<div class="card-body">
								<div class="form-group">
									<div class="row">
										<li class="nav-link">Asal   :{{$key->source}}</li>
										<li class="nav-link" style="width: 100%;">Tujuan :{{$key->destination}}</li>
										<li class="nav-link" style="width: 100%;">Ket    : {{$key->desc}}</li>
										<li class="nav-link">{{$key->maskapai->name}}</li>
									</div>
								</div>
								
							</div>
							<div class="card-footer text-right">
								<a href="{{ route('user.show-ticket',($key->id))}}" class="btn btn-primary btn-sm"> Lihat</a>
                    			<a href="{{route('user.reserve',($key->id))}}" class="btn btn-success btn-sm"> Pesan</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			 
			</div>

		</div>
	</div>
	
</div>
@stop