<?php
use App\JenisDarah;

function JenisDarah($id) {

    $jenis = JenisDarah::where('id', $id)->first();
    // return $jenis;
    return $jenis->jenis_darah;

}