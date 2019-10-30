@extends('layouts.layout-user')

@section('judul')
Tiket Saya
@stop

@section('content')
<div class="container mt-5">

<div class="card">
    <div class="card-header">
        <p>Information</p>
    </div>
    <div class="card-body">
        @foreach($notification as $a )
        <p>{{$a->description}}</p>
        @endforeach
    </div>
</div>

	<div class="card mt-5">
		<div class="card-header">
			<i class="fa fa-ticket"></i> {{__('Ticket Saya')}}
		</div>
		<div class="card-body">
		
		<div class="row">
			@foreach($ticket as $data)
			<div class="col-sm-12 col-xs-12 col-md-4 mt-3">
				<div class="card" id="kartu">
					<div class="card-header">
						<p class="card-title">{{$data->ticket->kode_tkt}}</p>
					</div>
					<img src="{{asset('upload/' . $data->ticket->image)}}" alt="" style="width: 100%;">
					<div class="card-body">
						<p class="caption">{{$data->ticket->source}} - {{$data->ticket->destination}}</p>
						<p class="caption">{{$data->ticket->maskapai->name}}</p>
						<p class="caption">Tanggal : {{$data->ticket->takeoff_date}} - {{$data->ticket->takeoff_time}}</p>
						<p class="caption">Harga : IDR {{str_replace(",",".",number_format($data->cost))}}</p>
					</div>
					<div class="card-footer text-right">
						<div class="row">
							<a href="{{route('user.tiket-saya',($data->id))}}" class="btn btn-primary btn-sm">Lihat</a>&nbsp;
							<a href="{{route('user.reserve.pdf',($data->id))}}" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Unduh</a>&nbsp;	
							<form action="{{route('user.reserve.delete',($data->id))}}" method="post">
								@csrf
								<button class="btn btn-danger btn-sm" onclick="return confirm('Batal Pesan?');">Batal</button>
								<input type="hidden" name="_method" value="DELETE">
							</form>
						</div>
						
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	</div>

	
</div>
@stop