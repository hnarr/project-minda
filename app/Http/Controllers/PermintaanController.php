<?php

namespace App\Http\Controllers;

use App\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permintaan = Permintaan::all();
        return view('admin.datapermintaan',compact('permintaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        Permintaan::create([
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'gol_darah' => $request->gol_darah,
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
        $edit = Permintaan::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
        $edit = Permintaan::find($request->id);
        $edit->tahun = $request->tahun;
        $edit->bulan = $request->bulan;
        $edit->gol_darah = $request->gol_darah;
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
