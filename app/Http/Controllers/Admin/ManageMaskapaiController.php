<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Maskapai;
use App\Message;
use Alert;

class ManageMaskapaiController extends Controller
{
    public function index()
    {
        $date = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	return view('admin.maskapai.index', compact('message', 'pesan'));
    }

    public function MaskapaiDatatables()
    {
    	$maskapai = Maskapai::all();
    	return Datatables::of($maskapai)
    	                   ->addColumn('action', 'admin.maskapai.action')
                           ->addIndexColumn()
                           ->make(true);
    }

    public function MaskapaiCreate()
    {
        $date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	return view('admin.maskapai.add', compact('message', 'pesan'));
    }

    public function MaskapaiEdit($id)
    {
        $date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	$maskapai = Maskapai::findOrFail($id);
		$show = false;
		return view('admin.maskapai.edit', compact('maskapai', 'show', 'message', 'pesan'));
    }

    public function MaskapaiShow($id)
    {
        $date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	$maskapai = Maskapai::findOrFail($id);
    	$show = true;
    	return view('admin.maskapai.edit', compact('maskapai','show', 'message', 'pesan'));
    }

    public function store(Request $request)
    {
    	$id = $request->get('id');
    	if($id){
    		$maskapai = Maskapai::findOrFail($id);
    	}else{
    		$maskapai = new Maskapai;
    	}
    	$maskapai->name = $request->get('name');
    	$maskapai->desc = $request->get('desc');
    	$maskapai->save();

        Alert::success('Data berhasil disimpan', 'Success');
    	return redirect()->route('admin.manage-maskapai');
    }

    public function delete($id)
    {
    	$maskapai = Maskapai::where('id',$id)->delete();
    	return redirect()->route('admin.manage-maskapai');
    }
}
