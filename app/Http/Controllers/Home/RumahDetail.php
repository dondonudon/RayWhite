<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RumahDetail extends Controller
{
    public function index($id) {
        $dtRumah = DB::table('web_rumah_dijual')->where('id','=',$id);
        if ($dtRumah->exists()) {
            $rumah = $dtRumah->first();
            $listGambar = DB::table('web_rumah_gambar')->where('id_rumah','=',$id)->get();

            return view('home.rumah.detail')
                ->with('content',$rumah)
                ->with('listGambar',$listGambar)
                ->with('info',LandingPage::infoLandingPage());
        } else {
            return abort(404);
        }
    }
}
