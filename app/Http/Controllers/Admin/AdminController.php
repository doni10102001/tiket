<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Reservation;
use App\Category;
use App\Tickets;
use App\Maskapai;
use Alert;
use App\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$user   = User::count();
    	$category = Category::count();
        $maskapai = Maskapai::count();
    	$ticket = Tickets::count();
        $reservation  = Reservation::count();
    	return view('admin.admin',
    	[
            'user'   => $user,
            'category' => $category,
            'maskapai' => $maskapai,
            'ticket' => $ticket,
            'reservation'  => $reservation,
        ]
    	);
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
