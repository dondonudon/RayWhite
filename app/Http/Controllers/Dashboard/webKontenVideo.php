<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\OpenFunction\login;
use App\webKontentVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class webKontenVideo extends Controller
{
    public function index() {
        $segment = \request()->segment(3);
        $permit = login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            case 'not available':
                return redirect('admin');
                break;

            default:
                return view('dashboard.web-component.konten-video');
                break;
        }
    }

    public function list() {
        return webKontentVideo::all()->toJson();
    }

    public function add() {
        $segment = \request()->segment(3);
        $permit = login::permission($segment);

        switch ($permit) {
            case 'login':
                return redirect('admin/login');
                break;

            case 'not available':
                return redirect('admin');
                break;

            default:
                return view('dashboard.web-component.konten-video-add');
                break;
        }
    }

    public function addSubmit(Request $request) {
        $judul = $request->judul;
        $url = $request->url;
        $username = \Illuminate\Support\Facades\Session::get('username');

        DB::beginTransaction();
        try {
            $video = new webKontentVideo();
            $video->judul = $judul;
            $video->url = $url;
            $video->username = $username;
            $video->save();

            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }

    public function delete(Request $request) {
        $id = $request->id;

        DB::beginTransaction();
        try {
            DB::table('web_konten_videos')->where('id','=',$id)->delete();
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }
}
