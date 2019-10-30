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
    	return view('admin.message.index');
    }

    public function ManageMessageDatatables()
    {
    	$message = Message::all();
    	return Datatables::of($message)
						   ->addColumn('action', 'admin.message.action')->make(true);
    }

    public function delete($id)
    {
    	$message = Message::where('id',$id)->delete();

		return redirect()->route('admin.manage-message');
    }
}
