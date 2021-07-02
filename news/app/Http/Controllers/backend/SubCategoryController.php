<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_en', 'category_vie')
            ->orderByDesc('subcategories.id')->paginate(3);
        return view('backend.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('backend.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories',
            'subcategory_vie' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);
        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_vie'] = $request->subcategory_vie;
        $data['category_id'] = $request->category_id;

        DB::table('subcategories')->insert($data);
        $notification = [
            'message' => 'Subcategories Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('subcategories')->with($notification);
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->get();

        $subcategory = DB::table('subcategories')->where('id', $id)->first();
        return view('backend.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_vie'] = $request->subcategory_vie;
        $data['category_id'] = $request->category_id;

        DB::table('subcategories')->where('id', $id)->update($data);
        $notification = [
            'messages' => 'Subcategories Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('subcategories')->with($notification);
    }

    public function delete($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = [
            'message' => 'Subcategories Deleted Successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('subcategories')->with($notification);
    }
}
