<?php

namespace App\Http\Controllers\Home;

use App\webGeneralInfo;
use App\webImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LandingPage extends Controller
{
    public static function infoLandingPage() {
        $result = [];

        try {
            $generalInfo = DB::table('web_general_info')
                ->select('web_general_info.section', 'web_general_info.area', 'web_general_info.type', 'web_general_info.data', 'web_image.filename')
                ->leftJoin('web_image','web_general_info.section','=','web_image.section')
                ->get();
            foreach ($generalInfo as $c) {
                if ($c->section == 'contact-us') {
                    $result['contact-us'][$c->area] = $c->data;
                } elseif ($c->section == 'header-section') {
                    $result['header-section'][$c->area] = $c->data;
                } else {
                    $result[$c->section] = [
                        'area' => $c->area,
                        'type' => $c->type,
                        'data' => $c->data,
                        'filename' => $c->filename,
                    ];
                }
            }

//            $team = DB::table('web_our_team')
//                ->select('fullname','jabatan','foto as photo')
//                ->get();
//            foreach ($team as $t) {
//                $result['team'][] = [
//                    'fullname' => $t->fullname,
//                    'jabatan' => $t->jabatan,
//                    'photo' => $t->photo,
//                ];
//            }

            $result['image-slider'] = DB::table('web_image')->where('section','=','image-slider')->get()->toArray();
            $result['header-section-image'] = DB::table('web_image')->where('section','=','header-section')->first();

//            $result['top-lister'] = DB::table('web_rumah_dijual')
//                ->select('ms_lister.fullname','ms_lister.photo',DB::raw('count(*) as total'))
//                ->join('ms_lister','web_rumah_dijual.id_lister','=','ms_lister.id')
//                ->groupBy('id_lister')
//                ->limit(3)
//                ->get()->toArray();

//            $result['top-marketer'] = DB::table('web_top_marketer')
//                ->select('ms_marketer.fullname','ms_marketer.photo','web_top_marketer.id')
//                ->join('ms_marketer','web_top_marketer.id_marketer','=','ms_marketer.id')
//                ->get()->toArray();
//            $result['favorite-marketer'] = DB::table('web_favorite_marketer')
//                ->select('ms_marketer.fullname','ms_marketer.photo','web_favorite_marketer.id')
//                ->join('ms_marketer','web_favorite_marketer.id_marketer','=','ms_marketer.id')
//                ->get()->toArray();
            $result['aktivitas-kita'] = DB::table('web_aktivitas_kita')
                ->select('id','judul','image','short_desc','content','username','created_at')
                ->where('status','=',1)
                ->orderBy('created_at','desc')
                ->limit(4)
                ->get()->toArray();
//            $result['rumah-dijual'] = DB::table('web_rumah_dijual')
//                ->select('web_rumah_dijual.id', 'id_lister', 'ms_marketer.fullname as marketer', 'jenis_properti', 'tipe_biaya', 'status', 'nama_rumah', 'lokasi', 'detail', 'harga', 'gambar', 'luas_tanah', 'luas_bangunan', 'lantai', 'kamar_tidur', 'kamar_mandi', 'dapur_bersih', 'dapur_kotor', 'taman', 'arah_rumah', 'listrik', 'furniture')
//                ->leftJoin('ms_marketer','web_rumah_dijual.id_marketer','=','ms_marketer.id')
//                ->where('status','=',0)
//                ->orderBy('web_rumah_dijual.created_at','desc')
//                ->get()->toArray();

            $result['konten-video'] = DB::table('web_konten_videos')
                ->orderBy('created_at','desc')
                ->limit(4)
                ->get()->toArray();

            return $result;
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
    }
}
