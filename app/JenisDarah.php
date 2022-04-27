<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisDarah extends Model
{
    protected $table = 'jenis_darah';
    protected $guarded = [];
    
    public function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'permintaan');
    }
}

