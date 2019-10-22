<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\OpenFunction\login;
use App\webRumahGambar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class WebInputRumah_tambahgambar extends Controller
{
    public function index($id) {
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
                $data = DB::table('web_rumah_dijual')
                    ->select('web_rumah_dijual.id','ms_lister.fullname as lister','nama_rumah','lokasi','detail','harga','gambar','luas_tanah','luas_bangunan','lantai','kamar_tidur','kamar_mandi','dapur_bersih','dapur_kotor','taman','arah_rumah','listrik','furniture')
                    ->join('ms_lister','web_rumah_dijual.id_lister','=','ms_lister.id')
                    ->where('web_rumah_dijual.id','=',$id)
                    ->first();
                $img = DB::table('web_rumah_gambar')->where('id_rumah','=',$id)->get()->toArray();
                return view('dashboard.web-component.input-rumah-dijual-tambah-gambar')
                    ->with('data',$data)
                    ->with('image',$img);
                break;
        }
    }

    public function submit(Request $request) {
        $id = $request->id;
        $file = $request->file('filepond');
        $extension = $request->file('filepond')->getClientOriginalExtension();

        try {
            DB::beginTransaction();
            $filename = Uuid::uuid1()->toString().'.'.$extension;

            Storage::putFileAs('public',$file,$filename);

            $gambar = new webRumahGambar();
            $gambar->id_rumah = $id;
            $gambar->gambar = $filename;
            $gambar->save();

            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            dd('Exception Block',$ex);
        }
    }

    public function delete(Request $request) {
        $id = $request->id;

        try {
            DB::table('web_rumah_gambar')->where('id','=',$id)->delete();
            return 'success';
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
    }
}
