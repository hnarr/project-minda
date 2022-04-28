<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisDarah;

class DataDarahPenggunaController extends Controller
{
    public function index()
    {
        $jenisdarah = JenisDarah::all();
        return view('pengguna.datadarah',compact('jenisdarah'));
    }
    
    public function create()
    {
        //
    }

    public function tambah(Request $request)
    {
        JenisDarah::create([
            'jenis_darah' => $request->jenis_darah,
        ]);
        // Alert::success('Data Berhasil di simpan');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        $edit = JenisDarah::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
        $edit = JenisDarah::find($request->id);
        $edit->jenis_darah = $request->jenis_darah;
        $edit->save();
        
        // Alert::success('Data Berhasil di Update');
        return redirect()->back();
    }

    public function hapus($id){
        JenisDarah::destroy($id);
        // Alert::success('Data Berhasil di Hapus');
        return redirect()->back();
    }
}
