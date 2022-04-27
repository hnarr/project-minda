<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisDarah;
use App\Permintaan;
use App\Prediksi;

class ProsesPrediksiController extends Controller
{
    public function index(){

        $jenis= JenisDarah::all();
        return view('admin.prosesprediksi', compact('jenis'));
    }

    public function simpan(request $request){

        $prediksi = new Prediksi();
        // $prediksi->tahun = $request->tahun;
        $prediksi->bulan = $request->bulan;
        $prediksi->jenis_darah = $request->jenis_darah;
        $prediksi->alpha = $request->alpha;
        $prediksi->prediksi = $request->prediksi;
        $prediksi->save();


        return redirect()->route('data-prediksi');
    }


    public function prediksi(request $request) {
        // return $request;

        $alpha = 0.2;
        $jenis = $request->jenis;
        // $tahun = $request->tahun;
        $bulan = $request->bulan;
        $permintaan = Permintaan::where('jenis_darah', $jenis)->orderBy('bulan', 'desc')
                ->limit(12)
                ->select('bulan', 'jenis_darah', 'permintaan')
                ->get();

        //smoothing1
        $smoothingOne = [];
        $data = collect();

        $xt = $permintaan[0]['permintaan'];
        $xt2 = $permintaan[0]['permintaan'];
        $xt3 = $permintaan[0]['permintaan'];
        for ($i=1; $i < count($permintaan) ; $i++) { 
            $xtnew = $permintaan[$i]['permintaan'];
            // return [$xt  new, $xt];
            // return $alpha;
            $smoothOne = ($alpha*$xtnew)+(1-$alpha)*$xt;
            // return$smoothOne;
            $data->push([
                'xt' => $xt,
                'st' => $smoothOne,
            ]);
            $xt = $smoothOne;
            $smoothingOne [] = $smoothOne;
        }

        //smoothing2
        for ($d=0; $d < count($smoothingOne) ; $d++) { 
            $xt2new = $smoothingOne[$d];
            $smoothTwo = ($alpha*$xt2new)+(1-$alpha)*$xt2;
            $data->push([
                'xt' => $xt2,
                'st' => $smoothTwo,
            ]); 
            $xt2 = $smoothTwo;
            $smoothingTwo [] = $smoothTwo;
        }

        //smoothing3
        for ($e=0; $e < count($smoothingTwo) ; $e++) { 
            $xt3new = $smoothingTwo[$e];
            $smoothThree = ($alpha*$xt3new)+(1-$alpha)*$xt3;
            $data->push([
                'xt' => $xt3,
                'st' => $smoothThree
            ]); 
            $xt3 = $smoothThree;
            $smoothingThree [] = $smoothThree;
        }

        //konstanta(AT) dan Slope (BT)
        $at = [];
        $bt = [];
        $ct = [];

        // return $hitung;
        foreach ($smoothingOne as $key => $value) {
            $sm1 = $value;
            $sm2 = $smoothingTwo[$key];
            $sm3 = $smoothingThree[$key];
            // rumus AT
            $nilaiAT = (3*$sm1)-(3*$sm2)+$sm3;
            $at[] = $nilaiAT;
            // Rumus BT
            $nilaiBT = ($alpha/(2*(pow((1-$alpha),2))))*((6-5*$alpha)*$sm1-(10-8*$alpha)*$sm2+(4-3*$alpha)*$sm3);
            $bt [] = $nilaiBT;
            
            $nilaCT = (pow($alpha,2)/(pow((1-$alpha),2)))*($sm1-(2*$sm2)+$sm3);
            $ct [] = $nilaCT;
        }
         $endat = end($at);
         $endbt = end($bt);
         $endct = end($ct);

        $forecast = end($at)+(end($bt)*1)+(0.5*end($ct)*(1));
        // return ceil($forecast);
        // return $bulan;
        return view ('admin.hasilprediksi', compact('forecast','bulan', 'jenis','alpha'));
    }
}
