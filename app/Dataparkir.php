<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataparkir extends Model
{
    protected $table = 'dataparkirs';

    protected $fillable = [
        'mhs_id',
        'no_kartu',
        'jam_masuk',
        'jam_keluar',
    ];

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa', 'mhs_id')->withDefault();
    }

    public function parkir()
    {
    	return $this->belongsTo('App\Parkir', 'mhs_id')->withDefault();
    }
}
