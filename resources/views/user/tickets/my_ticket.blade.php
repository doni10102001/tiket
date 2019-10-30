@extends('layouts.layout-user')

@section('judul')
	Tiket Ku
@stop

@section('content')
<div class="container mt-5">
	<div class="row">
		<div class="col-sm-12 col-xs-12 col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="display-5"><i class="fa fa-plane"></i> DTickets</h4>
				</div>
				<div class="card-body">
					<table class="table table-striped table-bordered dt-responsive">
						<thead>
							<tr>
								<th colspan="2">Data Pribadi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-user"></i> Nama</td>
								<td>{{$reservation->name}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-google"></i> Email</td>
								<td>{{$reservation->email}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-phone"></i> Kontak</td>
								<td>{{$reservation->phone}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-ticket"></i> Tiket</td>
								<td>{{$reservation->qty}}</td>
							</tr>
						</tbody>
					</table>
					<div class="clearfix"></div>
					<table class="table table-striped table-bordered dt-responsive">
						<thead>
							<tr>
								<th colspan="2">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-ticket"></i> Ticket</td>
								<td>{{$reservation->qty}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-dollar"></i> Total Harga</td>
								<td>IDR {{str_replace(",", ".", number_format($reservation->cost))}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12 col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="display-5"><i class="fa fa-plane"></i> DTickets</h4>
				</div>
				<div class="card-body">
					<table class="table table-striped table-bordered dt-responsive">
						<thead>
							<tr>
								<th colspan="2">Detail Keberangkatan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><i class="fa fa-train"></i> Asal</td>
								<td>{{$ticket->source}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-road"></i> Tujuan</td>
								<td>{{$ticket->destination}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-pencil"></i> Keterangan</td>
								<td>{{$ticket->maskapai->name}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-dollar"></i> Harga</td>
								<td>IDR {{str_replace(",", ".", number_format($ticket->price))}}</td>
							</tr>
							<tr>
								<td><i class="fa fa-calendar-check-o"></i> Tanggal</td>
								<td>{{$ticket->takeoff_date}} - {{$ticket->takeoff_time}}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="card-footer text-right">
					<a href="{{route('user.tiket-saya.all')}}" class="btn btn-primary btn-sm"><i class="fa fa-th-list"></i> Lihat Tiket Saya</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop