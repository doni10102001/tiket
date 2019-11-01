<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Reservation;
use App\Category;
use App\Tickets;
use App\Maskapai;
use App\Admin;
use App\Message;
use App\Notification;
use Auth;
use Alert;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
        $date = date('Y-n-d');
    	$user   = User::count();
    	$category = Category::count();
        $maskapai = Maskapai::count();
    	$ticket = Tickets::count();
        $reservation  = Reservation::count();
        $message = Message::Where('date', '=', $date)->count();
        $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	return view('admin.admin', compact('user', 'category', 'maskapai', 'ticket', 'reservation', 'message', 'pesan'));
    }

    public function show($id)
    {
        $user = Admin::findOrFail($id)->where('id','=',Auth::guard('admin')->user()->id)->get();
        return view('admin.profile.index',['profile' => $user]);
    }

    public function store(Request $request, $id)
    {
        
            $user = Admin::find($id);

            $user->name = $request->name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->save();

            Alert::success('Berhasil Di Update', 'Success');
            return redirect()->route('admin.dashboard');
       
        
    }

}
