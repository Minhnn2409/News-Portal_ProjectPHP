<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    //Photo Function
    public function PhotoIndex()
    {
        $photos = DB::table("photos")->orderByDesc("photos.id")->paginate(5);
        return view('backend.photo.index', compact('photos'));
    }

    public function PhotoCreate()
    {
        return view('backend.photo.create');
    }

    public function PhotoStore(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'photo' => 'required',
                'title' => 'required|unique:photos',
                'type' => 'required',
            ]);
            $data = array();
            $data['title'] = $request->title;
            $data['type'] = $request->type;


            $newFile = $request->photo;
            if ($newFile) {
                $img = uniqid() . '.' . $newFile->getClientOriginalExtension();
                Image::make($newFile)->resize(500, 300)->save("images/Gallery/photos/" . $img);
                $data['photo'] = "images/Gallery/photos/" . $img;
                DB::table('photos')->insert($data);
                $notification = [
                    'message' => 'Photos Inserted Successfully',
                    'alert-type' => 'success'
                ];
                DB::commit();
                return redirect()->route('photos')->with($notification);
            } else {
                $notification = [
                    'message' => 'Photos Inserted Failed',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
        } catch (\Exception $exception) {
        }
    }

    public function PhotoEdit($id)
    {
        $photo = DB::table('photos')->where('id', $id)->first();
        return view('backend.photo.edit', compact('photo'));
    }

    public function PhotoUpdate(Request $request, $id)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['type'] = $request->type;

        $newFile = $request->photo;
        if ($newFile) {
            $img = uniqid() . '.' . $newFile->getClientOriginalExtension();
            Image::make($newFile)->resize(500, 300)->save("images/Gallery/photos/" . $img);
            $data['photo'] = "images/Gallery/photos/" . $img;
            unlink($request->oldPhoto);
        } else {
            $data['photo'] = $request->oldPhoto;
        }
        DB::table('photos')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Photos Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('photos')->with($notification);
    }

    public function PhotoDelete($id)
    {
        $photo = DB::table('photos')->where('id', $id)->first();
        unlink($photo->photo);
        DB::table('photos')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Photos deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('photos')->with($notification);
    }
    //End Photo Function

    //Video functions
    public function VideoIndex()
    {
        $videos = DB::table("videos")->orderByDesc("videos.id")->paginate(5);
        return view('backend.video.index', compact('videos'));
    }

    public function VideoCreate()
    {
        return view('backend.video.create');
    }

    public function VideoStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:videos',
            'embed_code' => 'required|unique:videos',
            'type' => 'required',
        ]);
        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;


        DB::table('videos')->insert($data);
        $notification = [
            'message' => 'Videos Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('videos')->with($notification);
    }

    public function VideoEdit($id)
    {
        $video = DB::table('videos')->where('id', $id)->first();
        return view('backend.video.edit', compact('video'));
    }

    public function VideoUpdate(Request $request, $id)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;


        DB::table('videos')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Videos Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('videos')->with($notification);
    }

    public function VideoDelete($id)
    {
        DB::table('videos')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Videos deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('videos')->with($notification);
    }
    //End Video Functions

}
