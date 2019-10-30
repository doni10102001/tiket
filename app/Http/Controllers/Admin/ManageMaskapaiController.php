<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Maskapai;
use Alert;

class ManageMaskapaiController extends Controller
{
    public function index()
    {
    	return view('admin.maskapai.index');
    }

    public function MaskapaiDatatables()
    {
    	$maskapai = Maskapai::all();

    	return Datatables::of($maskapai)
    	                   ->addColumn('action', 'admin.maskapai.action')->make(true);
    }

    public function MaskapaiCreate()
    {
    	return view('admin.maskapai.add');
    }

    public function MaskapaiEdit($id)
    {
    	$maskapai = Maskapai::findOrFail($id);
		$show = false;
		return view('admin.maskapai.edit', ['maskapai' => $maskapai, 'show' => $show]);
    }

    public function MaskapaiShow($id)
    {
    	$maskapai = Maskapai::findOrFail($id);
    	$show = true;
    	return view('admin.maskapai.edit', ['maskapai' => $maskapai,'show' => $show]);
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
