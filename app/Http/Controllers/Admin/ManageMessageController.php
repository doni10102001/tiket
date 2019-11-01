<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Message;

class ManageMessageController extends Controller
{
    public function index()
    {
        $date = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	return view('admin.message.index', compact('message', 'pesan'));
    }

    public function ManageMessageDatatables()
    {
    	$message = Message::all();
    	return Datatables::of($message)
						   ->addColumn('action', 'admin.message.action')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function delete($id)
    {
    	$message = Message::where('id',$id)->delete();

		return redirect()->route('admin.manage-message');
    }
}
