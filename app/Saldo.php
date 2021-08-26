<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldo';

    protected $fillable = [
        'mahasiswa_id',
        'saldoterpakai',
        'jml_saldo',
    ];

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa', 'mahasiswa_id')->withDefault();
    }

}
