<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->orderByDesc('id')->paginate(3);
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_en' => 'required|unique:categories',
            'category_vie' => 'required|unique:categories',
        ]);
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_vie'] = $request->category_vie;
        DB::table('categories')->insert($data);
        $notification = [
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('categories')->with($notification);
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_vie'] = $request->category_vie;
        DB::table('categories')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('categories')->with($notification);
    }

    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('categories')->with($notification);
    }
}
