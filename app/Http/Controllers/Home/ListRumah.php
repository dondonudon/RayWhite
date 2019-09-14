<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\OpenFunction\webInfo;
use App\msLister;
use App\msMarketer;
use App\webRumahDijual;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ListRumah extends Controller
{
    public function index() {
        $filter['marketer'] = msMarketer::all();
        $result = webInfo::webInformation('all');
        return view('home.rumah.list')
            ->with('info',$result)
            ->with('filter',$filter);
    }

    public function getRumah(Request $request) {
        $where[] = ['status','=',0];
        if ($request->area !== 'all') {
            $where[] = ['area','=',$request->area];
        }
        if ($request->marketer !== 'all') {
            $where[] = ['id_marketer','=',$request->marketer];
        }
        if ($request->jual_sewa !== 'all') {
            $where[] = ['tipe_biaya','=',$request->jual_sewa];
        }
        if ($request->min_price !== null) {
            $where[] = ['harga','>',$request->min_price];
        }
        if ($request->max_price !== null) {
            $where[] = ['harga','<',$request->max_price];
        }
        if ($request->properti !== 'all') {
            $where[] = ['jenis_properti','=',$request->properti];
        }

        $result = DB::table('web_rumah_dijual')
            ->select('web_rumah_dijual.id', 'id_lister', 'ms_marketer.fullname as marketer', 'jenis_properti', 'tipe_biaya', 'status', 'nama_rumah', 'lokasi', 'detail', 'harga', 'gambar', 'luas_tanah', 'luas_bangunan', 'lantai', 'kamar_tidur', 'kamar_mandi', 'dapur_bersih', 'dapur_kotor', 'taman', 'arah_rumah', 'listrik', 'furniture')
            ->join('ms_marketer','web_rumah_dijual.id_marketer','=','ms_marketer.id')
            ->where($where)
            ->orderBy('web_rumah_dijual.created_at','desc')
            ->get();

        return json_encode($result);
    }
}
