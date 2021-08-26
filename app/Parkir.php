<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $table = 'parkirs';

    protected $fillable = [
        'mhs_id',
        'no_kartu',
        'jam_masuk',
        'status',

    ];

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa', 'mhs_id')->withDefault();
    }

    public function dataparkir()
    {
    	return $this->hasOne('App\Dataparkir', 'mhs_id')->withDefault();
    }
}
