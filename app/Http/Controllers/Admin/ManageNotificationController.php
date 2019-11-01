<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Notification;
use App\Message;

class ManageNotificationController extends Controller
{
   public function index()
   {
      $date = date('Y-n-d');
      $message = Message::Where('date', '=', $date)->count();
      $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
 		return view('admin.notification.index', compact('message', 'pesan'));
   }

   public function infoDatatables()
   {
   	$notification = Notification::all();
    	return Datatables::of($notification)
    					->addColumn('action','admin.notification.action')
              ->addIndexColumn()
              ->make(true);
   }

   public function create()
   {
      $date = date('Y-n-d');
      $message = Message::Where('date', '=', $date)->count();
      $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
   		return view('admin.notification.add', compact('message', 'pesan'));
   }

   public function edit($id)
   {
      $date = date('Y-n-d');
      $message = Message::Where('date', '=', $date)->count();
      $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
   		$notification = Notification::findOrFail($id);
   		return view('admin.notification.edit', compact('notification', 'message', 'pesan'));
   }

   public function store(Request $request)
   {
   		$id = $request->get('id');
 
   		if($id){
   			$notification = Notification::findOrFail($id);
   		}else{
   			$notification = new Notification;
   		}
   		$notification->description = $request->description;
   		$notification->save();
   		return redirect()->route('admin.manage-info');
   }

   public function delete($id)
    {
        $notification = Notification::where('id',$id)->delete();
        return redirect()->route('admin.manage-info');
    }

}
