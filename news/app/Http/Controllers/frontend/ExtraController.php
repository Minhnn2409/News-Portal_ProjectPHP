<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExtraController extends Controller
{
    public function EngLish()
    {
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'English');
        return redirect()->back();
    }

    public function Vietnamese()
    {
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'Vietnamese');
        return redirect()->back();
    }

    public function SinglePost($id)
    {

        $singlePost = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
            ->join('users', 'posts.user_id', 'users.id')
            ->select('posts.*', 'categories.category_en', 'categories.category_vie', 'subcategories.subcategory_en', 'subcategories.subcategory_vie', 'users.name')
            ->where('posts.id', $id)->first();

        $relatedPostsRow1 = DB::table('posts')->where('category_id', $singlePost->category_id)->orderByDesc('id')->limit(3)->get();
        $relatedPostsRow2 = DB::table('posts')->where('category_id', $singlePost->category_id)->orderByDesc('id')->skip(3)->limit(3)->get();
        return view('frontend.singlePost', compact('singlePost', 'relatedPostsRow1', 'relatedPostsRow2'));
    }
}
