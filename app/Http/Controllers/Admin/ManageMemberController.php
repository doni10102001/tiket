<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\User;

class ManageMemberController extends Controller
{
    public function index()
    {
    	return view('admin.member.index');
    }

    public function MemberDatatables()
    {
    	$user = User::all();
    	return Datatables::of($user)
    					   ->addColumn('action', 'admin.member.action')->make(true);
    }

    public function MemberEdit($id)
    {
    	$user = User::findOrFail($id);
    	$show = false;
    	return view('admin.member.edit',['user' => $user, 'show' => $show]);
    }

    public function MemberShow($id)
    {
    	$user = User::findOrFail($id);
    	$show = true;
    	return view('admin.member.edit',['user' => $user, 'show' => $show]);
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
