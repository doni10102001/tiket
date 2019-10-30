<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Alert;
use Image;

class ProfileController extends Controller
{
    public function show($id)
    {
    	$user = User::findOrFail($id)->where('id','=',Auth::user()->id)->get();
    	return view('user.profile.index',['profile' => $user]);
    }

    public function store(Request $request, $id)
    {
    	if($request->hasFile('photo')){
			$user = User::find($id);

			$file = $request->file('photo');
	        $filename = time() .'.'. $file->getClientOriginalExtension();
	        Image::make($file)->resize(400, 250)->save( public_path('/upload/' . $filename));

	    	$user->name = $request->name;
	    	$user->address = $request->address;
	    	$user->phone = $request->phone;
	    	$user->photo = $filename;
	    	$user->email = $request->email;
	    	$user->save();

	        Alert::success('Berhasil Di Update', 'Success');
	    	return redirect()->route('home');
    	}
    	
    }
}
