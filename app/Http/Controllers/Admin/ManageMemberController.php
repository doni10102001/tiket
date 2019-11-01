<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Message;
use App\User;

class ManageMemberController extends Controller
{
    public function index()
    {
        $date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	return view('admin.member.index', compact('message', 'pesan'));
    }

    public function MemberDatatables()
    {
    	$user = User::all();
    	return Datatables::of($user)
    					   ->addColumn('action', 'admin.member.action')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function MemberEdit($id)
    {
        $date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	$user    = User::findOrFail($id);
    	$show    = false;
    	return view('admin.member.edit', compact('user', 'show', 'message', 'pesan'));
    }

    public function MemberShow($id)
    {
        $date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	$user    = User::findOrFail($id);
    	$show    = true;
    	return view('admin.member.edit', compact('user', 'show', 'message', 'pesan'));
    }

    public function store(Request $request)
    {
    	$id = $request->get('id');
    	if($id){
    		$user = User::findOrFail($id);
    	}else{
    		$user = new User;
    	}
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->save();

    	return redirect()->route('admin.manage-member');
    }

    public function delete($id)
    {
        $user = User::where('id',$id)->delete();
        return redirect()->route('admin.manage-member');
    }

}
