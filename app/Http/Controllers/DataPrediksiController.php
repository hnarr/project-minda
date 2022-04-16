<?php

namespace App\Http\Controllers;

use App\Prediksi;
use Illuminate\Http\Request;

class DataPrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $prediksi = Prediksi::all();
        return view('admin.dataprediksi',compact('prediksi'));
    }

    public function create()
    {
        //
    }

    public function tambah(Request $request){
        
    }

    public function show($id){
        //
    }

    public function edit($id){
        
    }

    public function update(Request $request){
    
    }

    public function hapus($id){
        Prediksi::destroy($id);
        // Alert::success('Data Berhasil di Hapus');
        return redirect()->back();
    }
}
