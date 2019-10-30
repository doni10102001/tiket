<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Maskapai;
use App\Reservation;
use App\User;
use App\Tickets;
use App\Notification;
use Auth;
use Alert;

class TicketController extends Controller
{
    public function cariTiket(Request $request)
    {
    	$category = Category::all();
    	return view('user.tickets.cari', ['category' => $category]);
    }

    public function search(Request $request)
    {
    	$maskapai = Maskapai::all();
    	$id = $request->get('category_id');
    	$category = null;
    	if($id){
    		$category = Category::findOrFail($id);
    		$ticket = Tickets::with('category')->where('category_id',$id)->paginate(8);
    	}else{
    		$category = 'semua';
    		$ticket = Tickets::paginate(8);
    	}
    	$ticket = Tickets::where('source', 'like', '%'.request('search').'%')->where('destination', 'like', '%'.request('destination').'%')->get();
    	
    	return view('user.tickets.all_ticket',['ticket' => $ticket, 'category' => $category,'id' => $id, 'maskapai' => $maskapai])->with(compact('ticket'));	
    }

    public function viewAll(Request $request)
    {
    	$maskapai = Maskapai::all();
    	$id = $request->get('category_id');
    	$category = null;
    	if($id){
    		$category = Category::findOrFail($id);
    		$ticket = Tickets::with('category')->where('category_id',$id)->paginate(8);
    	}else{
    		$category = 'semua';
    		$ticket = Tickets::paginate(8);
    	}
    	return view('user.tickets.all_ticket',['ticket' => $ticket, 'category' => $category, 'id' => $id, 'maskapai' => $maskapai]);
    }

    public function show($id)
    {
    	$ticket = Tickets::findOrFail($id);
    	return view('user.tickets.show',['ticket' => $ticket]);
    }

    public function viewMyTicket(Request $request)
    {
    	$ticket = Reservation::with('ticket')->where('user_id','=',Auth::id())->get();
        $notification = Notification::all();
    	return view('user.tickets.my_ticket_all',['ticket' => $ticket, 'notification' => $notification]);
    }

    public function myTicket($id)
    {
    	$reservation = Reservation::findOrFail($id);
    	$ticket = Tickets::where('id', $reservation->ticket_id)->first();
    	return view('user.tickets.my_ticket',['reservation' => $reservation, 'ticket' => $ticket]);
    }

    // public function cancelTicket($id)
    // {
    //     $reservation = Reservation::where('id', $id)->delete();
    //     Alert::error('Tiket telah dibatalkan', 'Cancel Tiket');
    //     return redirect()->route('user.tiket-saya.all');
    // }

}
