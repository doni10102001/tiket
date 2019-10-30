<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Yajra\Datatables\Datatables;

class ManageCategoryController extends Controller
{
	 public function index()
    {
    	return view('admin.category.index');
    }
    
	public function CategoryDatatables()
	{
		$category = Category::all();

		return Datatables::of($category)
						   ->addColumn('action', 'admin.category.action')->make(true);

	}

	public function CategoryCreate()
	{
		return view('admin.category.add');
	}

	public function CategoryEdit($id)
	{
		$category = Category::findOrFail($id);
		$show = false;
		return view('admin.category.edit', ['category' => $category, 'show' => $show]);
	}

	public function CategoryShow($id)
	{
		$category = Category::findOrFail($id);
		$show = true;
		return view('admin.category.edit', ['category' => $category, 'show' => $show]);
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
