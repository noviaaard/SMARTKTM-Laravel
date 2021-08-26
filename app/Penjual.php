<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    protected $table = 'penjual';

    protected $fillable = [
        'nama_warung',
        'saldo_penjual',
    ];

    public function kantin()
    {
        return $this->hasOne('App\Kantin','penjual_id')->withDefault();
    }

}