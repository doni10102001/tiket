<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Tickets;
use App\Reservation;
use App\User;

class ManageReservationController extends Controller
{
    public function index()
    {
    	return view('admin.reservation.index');
    }

    public function ReservasiDatatables()
    {
    	$reservation = Reservation::select('id','kode_trx','name','email','phone','qty','cost','booking_date')->get();
    	return Datatables::of($reservation)
    					->addColumn('action','admin.reservation.action')
                        ->editColumn('price',function(Reservation $reservation){
                            return "IDR ".str_replace(",", ".",number_format($reservation->price));
                        })->make(true);
    }

    public function editReservasi($id)
    {
        $reservation = Reservation::findOrFail($id);
        $show = false;
        return view('admin.reservation.edit', ['reservation' => $reservation, 'show' => $show]);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');
        if($id)
        {
            $reservation = Reservation::findOrFail($id);
        }else{
            $reservation = new Reservation;
        }
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->qty = $request->qty;
        $reservation->cost = $request->cost;
        $reservation->booking_date = $request->booking_date;
        $reservation->save();

        return redirect()->route('admin.manage-reservation');
    }

    public function delete($id)
    {
        $reservation = Reservation::where('id',$id)->delete();
        return redirect()->route('admin.manage-reservation');
    }
}
