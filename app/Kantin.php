<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    protected $table = 'kantins';

    protected $fillable = [
        'mhs_id',
        'penjual_id',
        'no_kartu',
        'jam_transaksi',
    ];

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa', 'mhs_id')->withDefault();
    }

    public function penjual()
    {
    	return $this->belongsTo('App\Penjual', 'penjual_id')->withDefault();
    }
}
