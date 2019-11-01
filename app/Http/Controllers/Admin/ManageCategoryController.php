<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Message;
use App\Notification;
use Yajra\Datatables\Datatables;

class ManageCategoryController extends Controller
{
	 public function index()
    {
    	$date = date('Y-n-d');
    	$message = Message::Where('date', '=', $date)->count();
        $pesan = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
    	return view('admin.category.index', compact('message', 'pesan'));
    }
    
	public function CategoryDatatables()
	{
		$category = Category::all();

		return Datatables::of($category)
						   ->addColumn('action', 'admin.category.action')
						   ->addIndexColumn()
						   ->make(true);

	}

	public function CategoryCreate()
	{
		$date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
		return view('admin.category.add', compact('message', 'pesan'));
	}

	public function CategoryEdit($id)
	{
		$date    = date('Y-n-d');
        $message = Message::Where('date', '=', $date)->count();
        $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
		$category = Category::findOrFail($id);
		$show = false;
		return view('admin.category.edit', compact('category', 'show', 'message', 'pesan'));
	}

	public function CategoryShow($id)
	{
		$date    = date('Y-n-d');
	    $message = Message::Where('date', '=', $date)->count();
	    $pesan   = Message::Where('date', '=', $date)->orderBy('id', 'desc')->get();
		$category = Category::findOrFail($id);
		$show = true;
		return view('admin.category.edit', compact('category', 'show', 'message', 'pesan'));
	}

	public function store(Request $request)
	{
		$id = $request->get('id');
		$icon = '';
		if($id){
			$category = Category::findOrFail($id);
		}else{
			$category = new Category;
		}
		$category->type = $request->get('type');
		$category->desc = $request->get('desc');
		switch ($category->type){
			case 'Pesawat':
				$icon = 'fa-plane';
				break;
			case 'Kereta':
				$icon = 'fa-train';
				break;
			default:
			break;
		}
		$category->icon = $icon;
    	$category->save();

    	return redirect()->route('admin.manage-category');
	}

	public function delete($id)
	{
		$category = Category::where('id',$id)->delete();

		return redirect()->route('admin.manage-category');
	}

}
