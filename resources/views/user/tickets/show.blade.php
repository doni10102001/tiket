@extends('layouts.layout-user')

@section('judul')
	Detail Ticket
@stop

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-6 offset-md-3">
				<div class="card">
					 <div class="card-header">
						<h3><i class="fa fa-plane"></i> DTicket</h3>
					 </div>
					<div class="card-body">
						<table class="table table-striped table-bordered dt-responsive nowrap">
							<thead>
								<tr>
									<th colspan="2">Detail Ticket</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><i class="fa fa-train"></i> Asal</td>
									<td>{{ $ticket->source }}</td>
								</tr>
								<tr>
									<td><i class="fa fa-road"></i> Tujuan</td>
									<td>{{ $ticket->destination }}</td>
								</tr>
								<tr>
									<td><i class="fa fa-bus"></i> Transportasi</td>
									<td>{{ $ticket->maskapai->name }}</td>
								</tr>
								<tr>
									<td><i class="fa fa-pencil"></i> Keterangan</td>
									<td>{{ $ticket->desc }}</td>
								</tr>
								<tr>
									<td><i class="fa fa-dollar"></i> Harga</td>
									<td>IDR {{str_replace(",",".", number_format($ticket->price))}}/ticket</td>
								</tr>
								<tr>
									<td><i class="fa fa-ticket"></i> Stock Ticket</td>
									<td>{{$ticket->stock}}</td>
								</tr>
								<tr>
									<td><i class="fa fa-calendar-check-o"></i> Tanggal</td>
									<td>{{$ticket->takeoff_date}} - {{$ticket->takeoff_time}}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						<a href="{{route('user.cari-tiket.all')}}"><button class="btn btn-primary btn-md"><i class="fa fa-th-list"></i> Lihat Tiket</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop