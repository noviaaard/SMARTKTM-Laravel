<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'no_kartu',
        'nim',
        'nama_mhs',
        'tempat_lahir',
        'tgl_lahir',
        'kelas',
        'jurusan',
        'alamat',
        'no_telfon',
        'email',
        'saldo',
        'topup',
    ];

    public function saldo()
    {
        return $this->hasOne('App\Saldo','mhs_id')->withDefault();
    }

    public function dataparkir()
    {
        return $this->hasOne('App\Dataparkir','mhs_id')->withDefault();
    }

    public function kantin()
    {
        return $this->hasOne('App\Kantin','mhs_id')->withDefault();
    }

    public function parkir()
    {
        return $this->hasOne('App\Parkir','mhs_id')->withDefault();
    }


}
