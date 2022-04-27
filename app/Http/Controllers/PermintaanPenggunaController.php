<?php

namespace App\Http\Controllers;

use App\Permintaan;
use App\JenisDarah;
use Illuminate\Http\Request;

class PermintaanPenggunaController extends Controller
{
    public function index()
    {
        $permintaan = Permintaan::all();
        $jenisdarah = JenisDarah::all();
        return view('pengguna.datapermintaan',compact('permintaan', 'jenisdarah'));
    }
    
    public function create()
    {
        //
    }

    public function tambah(Request $request)
    {
        Permintaan::create([
            // 'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'jenis_darah' => $request->jenis_darah,
            'permintaan' => $request->permintaan,
        ]);
        // Alert::success('Data Berhasil di simpan');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        $edit = Permintaan::where('id',$id)->first();
        // return $edit
        return response()->json($edit);
    }

    public function update(Request $request)
    {
        $edit = Permintaan::find($request->id);
        // $edit->tahun = $request->tahun;
        $edit->bulan = $request->bulan;
        $edit->jenis_darah = $request->jenis_darah;
        $edit->permintaan = $request->permintaan;
        $edit->save();
        
        // Alert::success('Data Berhasil di Update');
        return redirect()->back();
    }

    public function hapus($id){
        Permintaan::destroy($id);
        // Alert::success('Data Berhasil di Hapus');
        return redirect()->back();
    }
}
