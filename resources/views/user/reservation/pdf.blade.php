<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Download PDF</title>
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-xs-12 col-md-6">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped table-bordered dt-responsive">
						<thead>
							<tr>
								<th colspan="2"><i class="fa fa-plane"></i><img src="img/logo-pesawat-png.png" style="width: 25px; height: 25px;" alt="Logo">DTicket <p class="text-center">Reservasi<br>
								<h6 class="text-center" style="font-size: 13px;">Jl. Raya Bandung Km. 07</h6>
								</p>  
								
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="font-size: 12px"><i class="fa fa-user"></i> Nama</td>
								<td scope="col" style="font-size: 12px">{{$reservation->name}}</td>
							</tr>
							<tr>
								<td style="font-size: 12px"><i class="fa fa-phone"></i> Kontak</td>
								<td style="font-size: 12px">{{$reservation->phone}}</td>
							</tr>
							<tr>
								<td style="font-size: 12px"><i class="fa fa-train"></i> Asal</td>
								<td style="font-size: 12px">{{$ticket->source}}</td>
							</tr>
							<tr>
								<td style="font-size: 12px"><i class="fa fa-road"></i> Tujuan</td>
								<td style="font-size: 12px">{{$ticket->destination}}</td>
							</tr>
							<tr>
								<td style="font-size: 12px"><i class="fa fa-calendar-check-o"></i> Tanggal</td>
								<td style="font-size: 12px">{{$ticket->takeoff_date}} - {{$ticket->takeoff_time}}</td>
							</tr>
							<tr>
								<td style="font-size: 12px"><i class="fa fa-ticket"></i> Tiket</td>
								<td style="font-size: 12px">{{$reservation->qty}}</td>
							</tr>
							<tr>
								<td style="font-size: 12px"><i class="fa fa-dollar"></i> Total Harga</td>
								<td style="font-size: 12px">IDR {{str_replace(",", ".", number_format($reservation->cost))}}</td>
							</tr>
							<tr>	
								<td colspan="2">
									<div class="col text-right">
										<p style="font-size: 12px">Petugas</p>
										<hr class="mt-5" style="border: 1px solid; width: 25%; margin-left: 80%;">	
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>	
</body>
</html>