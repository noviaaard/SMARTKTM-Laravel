<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use App\Saldo;
use DB;
use Validator;

use Illuminate\Http\Request;

class SaldoController extends Controller
{

    public function edit($id)
    {
        $mhs_mnj = Mahasiswa::find($id);
        return view('topup', compact('mhs_mnj'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mhs'      => 'required',
            'nim'           => 'required',
            'jurusan'       => 'required',
            'kelas'         => 'required',
            'saldo'         => 'required' 
        ]);

        $mhs_mnj = Mahasiswa::find($id);
        $mhs_mnj->update([
            'saldo' => ($request->saldo),
            ]);
        
            if ($mhs_mnj->save()) {
                return redirect('manjmhs')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('manjmhs')->with('error', 'error message');
            }
    }

}
