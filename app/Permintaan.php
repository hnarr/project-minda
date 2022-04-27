<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'permintaan';
    protected $guarded = [];
    
    public function jenisdarah()
    {
    return $this->belongsTo(JenisDarah::class,'jenis_darah');
}   
}

