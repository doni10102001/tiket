@extends('layouts.layout-user')

@section('judul')
	Pesan Tiket
@stop

@section('content')
	<div class="container mt-5">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<form action="{{route('user.booking',($ticket->id))}}" method="post">
					@csrf
					<div class="row justify-content-center" id="form-3">
						<div class="col-md-6 ml-5">
							<div class="form-group mt-4">
								<label for="name">Nama *</label>
								<input type="text" name="name" id="name" required="" class="form-control" value="{{Auth::user()->name}}" maxlength="25">
							</div>
							<div class="form-group">
								<label for="email">Email *</label>
								<input type="text" name="email" id="email" required="" class="form-control" value="{{Auth::user()->email}}" maxlength="25">
							</div>
							<div class="form-group">
								<label for="kontak">Kontak *</label>
								<input type="text" name="phone" id="kontak" required="" class="form-control" value="{{Auth::user()->phone}}" maxlength="12">
							</div>
							<div class="form-group">
								<label for="qty">Jumlah Ticket *</label>
								<input type="number" name="qty" id="qty" class="form-control" min="1" max="10" value="1" required="">
							</div>
							<div class="form-group">
								<button class="btn btn-primary"><i class="fa fa-check-circle"></i> Submit</button>
							</div>
						</div>
						<div class="col-md-5 mt-5">
							<table class="table table-striped table-bordered dt-responsive nowrap" align="center">
								<thead>
									<tr>
										<th colspan="2" class="text-center">Detail Keberangkatan</th>
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
										<td><i class="fa fa-pencil"></i> Ket *</td>
										<td>{{$ticket->desc}}</td>
									</tr>
									<tr>
										<td><i class="fa fa-bus"></i> Transportasi</td>
										<td>{{$ticket->transportasi}}</td>
									</tr>
									<tr>
										<td><i class="fa fa-dollar"></i> Harga</td>
										<td>IDR{{str_replace(",",".",number_format($ticket->price))}}/ticket</td>
									</tr>
									<tr>
										<td><i class="fa fa-ticket"></i> Ticket Tersedia</td>
										<td>{{$ticket->stock}}</td>
									</tr>
									<tr>
										<td><i class="fa fa-calendar-check-o"></i> Tanggal</td>
										<td>{{$ticket->takeoff_date}} - {{$ticket->takeoff_time}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop