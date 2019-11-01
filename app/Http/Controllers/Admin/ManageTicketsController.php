<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Maskapai;
use App\Category;
use App\Tickets;
use App\Message;
use Alert;
use Image;

class ManageTicketsController extends Controller
{
    public function index()
    {
        $date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	return view('admin.ticket.index', compact('message', 'pesan'));
    }

    public function ManageTicketDatatables()
    {
    	$ticket = Tickets::select('id','kode_tkt', 'source', 'destination', 'price', 'stock', 'takeoff_date')->get();
    	return Datatables::of($ticket)
    					   ->addColumn('action', 'admin.ticket.action')
                           ->addIndexColumn()
    					   ->editColumn('price', function(Tickets $ticket){
    					   	 	return "IDR ".str_replace(".", ".", number_format($ticket->price));
    					   })
                           ->make(true);
    }

    public function TicketCreate()
    {
        $date       = date('Y-n-d');
        $message    = Message::Where('date', '=', $date)->count();
        $pesan      = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	$category   = Category::all();
    	$maskapai   = Maskapai::all();
    	return view('admin.ticket.add', compact('category', 'maskapai', 'message', 'pesan'));
    }

    public function TicketShow($id)
    {
        $date       = date('Y-n-d');
        $message    = Message::Where('date', '=', $date)->count();
        $pesan      = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
        $ticket     = Tickets::findOrFail($id);
        $category   = Category::all();
        $maskapai   = Maskapai::all();
        $show       = true;
        return view('admin.ticket.edit', compact('ticket', 'show', 'category', 'maskapai', 'message', 'pesan'));
    }

    public function TicketEdit($id)
    {
        $date = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
        $ticket = Tickets::findOrFail($id);
        $category = Category::all();
        $maskapai = Maskapai::all();
        $show = false;
        return view('admin.ticket.edit', compact('ticket', 'show', 'category', 'maskapai', 'message', 'pesan'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
        $price_format = array(".","IDR"," ");
        $kode_tkt = ("TKT".rand(0,1000));
        $id = $request->get('id');
        if($id){
            $ticket = Tickets::findOrFail($id);
        }else{
            $ticket = new Tickets;
        }
         
         if ($request->get('kode')) {
            $ticket->kode_tkt = $request->get('kode');
        }else{
            $ticket->kode_tkt = $kode_tkt;
        }
        $ticket->source = $request->get('source');
        $ticket->destination = $request->get('destination');
        $ticket->category_id = $request->get('category_id');
        $ticket->maskapai_id = $request->get('maskapai_id');
        $ticket->desc = $request->get('desc');
        
        $file = $request->file('image');
        $filename = time() .'.'. $file->getClientOriginalExtension();
        Image::make($file)->resize(400, 250)->save( public_path('/upload/' . $filename));

        $ticket->image = $filename;
        $ticket->price = str_replace($price_format,"",$request->price);
        $ticket->stock = $request->get('stock');
        $ticket->takeoff_date = $request->get('takeoff_date');
        $ticket->takeoff_time = $request->get('takeoff_time_submit');
        $ticket->save();
        }
        
        Alert::success('Sukses Terkirim', 'Success');
    	return redirect()->route('admin.manage-ticket');
    }

    public function delete($id)
    {
        $ticket = Tickets::where('id',$id)->delete();
        return redirect()->route('admin.manage-ticket');
    }

}
