<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RumahDetail extends Controller
{
    public function index($id) {
        $rumah = DB::table('web_rumah_dijual')->where('id','=',$id)->first();
        $listGambar = DB::table('web_rumah_gambar')->where('id','=',$id)->get();
        return view('home.rumah.detail')
            ->with('content',$rumah)
            ->with('listGambar',$listGambar)
            ->with('info',LandingPage::infoLandingPage());
    }
}
