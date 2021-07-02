<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = DB::table('districts')->orderByDesc('id')->paginate(3);
        return view('backend.district.index', compact('districts'));
    }

    public function create()
    {
        return view('backend.district.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'district_en' => 'required|unique:districts',
            'district_vie' => 'required|unique:districts',
        ]);
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_vie'] = $request->district_vie;
        DB::table('districts')->insert($data);
        $notification = [
            'message' => 'district Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('districts')->with($notification);
    }

    public function edit($id)
    {
        $district = DB::table('districts')->where('id', $id)->first();
        return view('backend.district.edit', compact('district'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_vie'] = $request->district_vie;
        DB::table('districts')->where('id', $id)->update($data);
        $notification = [
            'message' => 'district Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('districts')->with($notification);
    }

    public function delete($id)
    {
        DB::table('districts')->where('id', $id)->delete();
        $notification = array(
            'message' => 'District deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('districts')->with($notification);
    }
}
