<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tickets;
use App\Reservation;
use Auth;
use Alert;
use PDF;

class ReservationController extends Controller
{
    public function book($id)
    {
    	$ticket = Tickets::findOrFail($id);
    	$kode_trx = ("TRX".rand(0,1000));
    	$reservation = new Reservation;
    	$reservation->kode_trx = $kode_trx;
    	$reservation->ticket_id = $id;
    	$reservation->user_id = Auth::id();
    	$reservation->name = request('name');
    	$reservation->email = request('email');
    	$reservation->phone = request('phone');
    	$reservation->qty = request('qty');
    	$reservation->cost = $reservation->qty * $ticket->price;

    	$stock = $ticket->stock - $reservation->qty;
    	$ticket->stock = $stock;
    	$ticket->save();

    	$reservation->booking_date = date('y-m-d');
    	$reservation->travel_date = $ticket->takeoff_date;
    	$reservation->save();

        Alert::success('Tiket Telah Di Pesan', 'Success');
    	return redirect()->route('user.tiket-saya.all');

    }

    public function view($id)
    {
    	$ticket = Tickets::findOrFail($id);
    	return view('user.reservation.reserve')->with('ticket',$ticket);
    }

    public function delete($id)
    {
        $reservation = Reservation::where('id',$id)->delete();

        Alert::error('Pesan tiket telah dibatalkan', 'Cancel');
        return redirect()->route('user.tiket-saya.all');
    }

    public function pdf($id)
    {
        $reservation = Reservation::findOrFail($id);
        $ticket = Tickets::where('id', $reservation->ticket_id)->first();
        $pdf = PDF::loadView('user.reservation.pdf', ['ticket' => $ticket, 'reservation' => $reservation])->setPaper('a5', 'potrait');
        return $pdf->download('Reservation.pdf');// return view('user.reservation.pdf', ['reservation' => $reservation, 'ticket' => $ticket]);
        
    }
}
