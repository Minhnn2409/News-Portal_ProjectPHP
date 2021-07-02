<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function SocialSetting()
    {
        $social = DB::table('socials')->first();
        return view('backend.setting.social', compact('social'));
    }

    public function UpdateSetting(Request $request, $id)
    {
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;

        DB::table('socials')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Social Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('social.setting')->with($notification);
    }

    public function SeoSetting()
    {
        $seo = DB::table('seos')->first();
        return view('backend.setting.seo', compact('seo'));
    }

    public function UpdateSeo(Request $request, $id)
    {
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table('seos')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Seo Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('seo.setting')->with($notification);
    }

    public function PrayerSetting()
    {
        $prayer = DB::table('prayers')->first();
        return view('backend.setting.prayer', compact('prayer'));
    }

    public function UpdatePrayer(Request $request, $id)
    {
        $data = array();
        $data['fajr'] = $request->fajr;
        $data['johor'] = $request->johor;
        $data['asor'] = $request->asor;
        $data['magrib'] = $request->magrib;
        $data['eaha'] = $request->eaha;
        $data['jummah'] = $request->jummah;

        DB::table('prayers')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Prayers Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('prayer.setting')->with($notification);
    }

    // LiveTv Settings
    public function LivetvSetting()
    {
        $livetv = DB::table('livetvs')->first();
        return view('backend.setting.livetv', compact('livetv'));
    }

    public function UpdateLivetv(Request $request, $id)
    {
        $data = array();
        $data['embed_code'] = $request->embed_code;
        $data['status'] = $request->status;

        DB::table('livetvs')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Livetvs Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('livetv.setting')->with($notification);
    }

    public function ActiveSetting(Request $request, $id)
    {
        DB::table('livetvs')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'Live TV Active Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function DeActiveSetting(Request $request, $id)
    {
        DB::table('livetvs')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'Live TV DeActive Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    //Notices Setting

    public function NoticeSetting()
    {
        $notice = DB::table('notices')->first();
        return view('backend.setting.notice', compact('notice'));
    }

    public function UpdateNotice(Request $request, $id)
    {
        $data = array();
        $data['notice'] = $request->notice;
        $data['status'] = $request->status;

        DB::table('notices')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Notices Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('notice.setting')->with($notification);
    }

    public function ActiveNotice(Request $request, $id)
    {
        DB::table('notices')->where('id', $id)->update(['status' => 1]);
        $notification = [
            'message' => 'Notice Active Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function DeActiveNotice(Request $request, $id)
    {
        DB::table('notices')->where('id', $id)->update(['status' => 0]);
        $notification = [
            'message' => 'Notice DeActive Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    //Websites settings
    public function index()
    {
        $websites = DB::table('websites')->orderByDesc('id')->paginate(3);
        return view('backend.website.index', compact('websites'));
    }

    public function create()
    {
        return view('backend.website.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'website_name' => 'required|unique:websites',
            'website_link' => 'required|unique:websites',
        ]);
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        DB::table('websites')->insert($data);
        $notification = [
            'message' => 'Website Inserted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('websites')->with($notification);
    }

    public function edit($id)
    {
        $website = DB::table('websites')->where('id', $id)->first();
        return view('backend.website.edit', compact('website'));
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_name'] = $request->website_name;
        DB::table('websites')->where('id', $id)->update($data);
        $notification = [
            'message' => 'Website Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('websites')->with($notification);
    }

    public function delete($id)
    {
        DB::table('websites')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Website deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('websites')->with($notification);
    }
}
