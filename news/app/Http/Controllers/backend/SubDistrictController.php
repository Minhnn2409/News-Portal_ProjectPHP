<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDistrictController extends Controller
{
    public function index()
    {
        $subdistricts = DB::table('subdistricts')
            ->join('districts', 'subdistricts.district_id', 'districts.id')
            ->select('subdistricts.*', 'districts.district_en', 'districts.district_vie')
            ->orderByDesc('subdistricts.id')->paginate(3);
        return view('backend.subdistrict.index', compact('subdistricts'));
    }

    public function create()
    {
        $districts = DB::table('districts')->get();
        return view('backend.subdistrict.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts',
            'subdistrict_vie' => 'required|unique:subdistricts',
            'district_id' => 'required'
        ]);
        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_vie'] = $request->subdistrict_vie;
        $data['district_id'] = $request->district_id;

        DB::table('subdistricts')->insert($data);
        $notification = [
            'message' => 'Subdistricts Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('subdistricts')->with($notification);
    }

    public function edit($id)
    {
        $districts = DB::table('districts')->get();

        $subdistrict = DB::table('subdistricts')->where('id', $id)->first();
        return view('backend.subdistrict.edit', compact('subdistrict', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_vie'] = $request->subdistrict_vie;
        $data['district_id'] = $request->district_id;

        DB::table('subdistricts')->where('id', $id)->update($data);
        $notification = [
            'messages' => 'Subdistricts Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('subdistricts')->with($notification);
    }

    public function delete($id)
    {
        DB::table('subdistricts')->where('id', $id)->delete();
        $notification = [
            'message' => 'Subdistricts Deleted Successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('subdistricts')->with($notification);
    }
}
