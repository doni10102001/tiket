<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Notification;

class ManageNotificationController extends Controller
{
   public function index()
   {
 		return view('admin.notification.index');
   }

   public function infoDatatables()
   {
   	$notification = Notification::all();
    	return Datatables::of($notification)
    					->addColumn('action','admin.notification.action')->make(true);
   }

   public function create()
   {
   		return view('admin.notification.add');
   }

   public function edit($id)
   {
   		$notification = Notification::findOrFail($id);
   		return view('admin.notification.edit', ['notification' => $notification]);
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
