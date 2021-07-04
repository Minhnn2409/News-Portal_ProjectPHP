<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table("posts")
            ->join("categories", "posts.category_id", "categories.id")
            ->join("subcategories", "posts.subcategory_id", "subcategories.id")
            ->join("districts", "posts.district_id", "districts.id")
            ->join("subdistricts", "posts.subdistrict_id", "subdistricts.id")
            ->select("posts.*", "categories.category_en", "categories.category_vie", "districts.district_en", "districts.district_vie")
            ->orderByDesc("posts.id")->paginate(10);
        return view('backend.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();
        $districts = DB::table('districts')->get();
        $subdistricts = DB::table('subdistricts')->get();
        return view('backend.post.create', compact('categories', 'subcategories', 'districts', 'subdistricts'));
    }

    public function GetSubCategory($category_id)
    {
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();
        return response()->json($sub);
    }

    public function GetSubDistrict($district_id)
    {
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();
        return response()->json($sub);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'category_id' => 'required',
                'district_id' => 'required',
                'image' => 'required',
                'details_en' => 'required',
                'details_vie' => 'required',
                'title_en' => 'required',
                'title_vie' => 'required',
                'tags_en' => 'required',
                'tags_vie' => 'required',
            ]);
            $data = array();
            $data['title_en'] = $request->title_en;
            $data['title_vie'] = $request->title_vie;
            $data['user_id'] = Auth::user()->id;
            $data['category_id'] = $request->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['subdistrict_id'] = $request->subdistrict_id;
            $data['district_id'] = $request->district_id;
            $data['tags_vie'] = $request->tags_vie;
            $data['tags_en'] = $request->tags_en;
            $data['details_en'] = $request->details_en;
            $data['details_vie'] = $request->details_vie;
            $data['headline'] = $request->headline;
            $data['bigthumbnail'] = $request->bigthumbnail;
            $data['first_section'] = $request->first_section;
            $data['first_section_thumbnail'] = $request->first_section_thumbnail;
            $data['post_date'] = date("d-m-Y");
            $data['post_month'] = date("F");

            $newFile = $request->image;
            if ($newFile) {
                $img = uniqid() . '.' . $newFile->getClientOriginalExtension();
                Image::make($newFile)->resize(500, 300)->save("images/postimg/" . $img);
                $data['image'] = "images/postimg/" . $img;
                DB::table('posts')->insert($data);
                $notification = [
                    'message' => 'Posts Inserted Successfully',
                    'alert-type' => 'success'
                ];
                DB::commit();
                return redirect()->route('posts')->with($notification);
            } else {
                $notification = [
                    'message' => 'Posts Inserted Failed',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $exception) {
        }
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();
        $districts = DB::table('districts')->get();
        $subdistricts = DB::table('subdistricts')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('backend.post.edit', compact('post', 'categories', 'subcategories', 'districts', 'subdistricts'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['title_en'] = $request->title_en;
        $data['title_vie'] = $request->title_vie;
        $data['user_id'] = Auth::user()->id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['district_id'] = $request->district_id;
        $data['tags_vie'] = $request->tags_vie;
        $data['tags_en'] = $request->tags_en;
        $data['details_en'] = $request->details_en;
        $data['details_vie'] = $request->details_vie;
        $data['headline'] = $request->headline;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;


        $newFile = $request->image;
        if ($newFile) {
            $img = uniqid() . '.' . $newFile->getClientOriginalExtension();
            Image::make($newFile)->resize(500, 300)->save("images/postimg/" . $img);
            $data['image'] = "images/postimg/" . $img;
            unlink($request->oldImage);
        } else {
            $data['image'] = $request->oldImage;
        }
        DB::table('posts')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Posts Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('posts')->with($notification);
    }

    public function delete($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        unlink($post->image);
        $post->delete();
        $notification = array(
            'message' => 'District deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('posts')->with($notification);
    }
}
