<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Saldo;
use App\Parkir;
use App\Dataparkir;
use App\Kantin;

use Carbon\Carbon;
use DB;
use Validator;
use Alert;

class ManjMhsController extends Controller
{
    public function index()
    {
        $mhs_mnj = Mahasiswa::all();
        $total_mhs = Mahasiswa::count();
        return view('manjmhs',compact('mhs_mnj','total_mhs'));

    }

    public function show($id)
    {
        $mhs_mnj = Mahasiswa::find($id);
        $dataparkirs = Dataparkir::where('mhs_id', $id)
        ->with('parkir')
        ->get();
        $kantins = DB::table('kantins')->where([ 
            ['mhs_id', $id],
        ])->get();
        return view('profile', compact('mhs_mnj','dataparkirs','kantins'));
    }

    public function invoice($id)
    {
        $mhs_mnj = Mahasiswa::find($id);
        return view('invoice', compact('mhs_mnj'));
    }

    public function topup($id)
    {
        $mhs_mnj = Mahasiswa::find($id);
        return view('topup', compact('mhs_mnj'));
    }

    public function create()
    {
        return view('addmhs');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'           => 'required|unique:mahasiswa',
            'nama_mhs'      => 'required',
            'foto'          => 'mimes:jpg,jpeg,png,gif,svg,JPG,PNG,JPEG',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'kelas'         => 'required',
            'jurusan'       => 'required',
            'alamat'        => 'required',
            'email'         => 'required|max:50|string|email|max:255',
            'no_telfon'     => 'required',
            'saldo'         => 'required' 
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            $fotoName = $request->nama_mhs . date('YmdHis') . '.' . $ext;
            $path = public_path('img/');
            $foto->move($path, $fotoName);
        } else {
            $fotoName = 'default.png';
        }
        
        $only = $request->only('nim', 'nama_mhs', 'tempat_lahir', 'tgl_lahir', 'kelas', 
                                'jurusan', 'alamat', 'email', 'no_telfon', 'saldo');
        $dataFoto = [
            'foto' => $fotoName
        ];
        $data = array_merge($only, $dataFoto);
        Mahasiswa::create($data);

        return redirect('manjmhs');

    }

    public function edit($id)
    {
        $mhs_mnj = Mahasiswa::find($id);
        return view('editmhs',compact('mhs_mnj'));
    }

    public function update(Mahasiswa $mahasiswa, Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nim' => 'required',
            'nama_mhs' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'email' => 'required|max:50|string|email|max:255',
            'no_telfon' => 'required',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update([
            'nim' => ($request->nim),
            'nama_mhs' => ($request->nama_mhs),
            'tempat_lahir' => ($request->tempat_lahir),
            'tgl_lahir' => ($request->tgl_lahir),
            'kelas' => ($request->kelas),
            'jurusan' => ($request->jurusan),
            'alamat' => ($request->alamat),
            'email' => ($request->email),
            'no_telfon' => ($request->no_telfon),
            ]);
        
            if ($mahasiswa->save()) {
                return redirect('manjmhs')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('manjmhs')->with('error', 'error message');
            }
        
    }

    protected function destroy(Request $request, $id) 
    { 
       Mahasiswa::where('id',$id)->delete();

       return redirect()->back();
    }

    public function editsaldo(Mahasiswa $mahasiswa, Request $request, $id)
    {
        $request->validate([
            'saldo'         => 'required' 
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update([
            'saldo' => ($request->saldo),
            ]);
        
            if ($mahasiswa->save()) {
                return redirect('manjmhs')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('manjmhs')->with('error', 'error message');
            }
    }

    public function laparkir()
    {
        $dataparkirs = Dataparkir::all();
        return view('laporanparkir',compact('dataparkirs'));
    }

    public function lakantin()
    {
        $kantins = Kantin::all();
        return view('laporankantin',compact('kantins'));
    }

    public function terparkir()
    {
        $parkirs = Parkir::all();
        $total_terparkir = Parkir::count();
        return view('kendaraanterparkir',compact('parkirs','total_terparkir'));
    }

     public function search (Request $request )
    {

        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $dataparkirs = Dataparkir::with('mahasiswa')->select()->where([
            ['jam_keluar', '>=', $fromDate],
            ['jam_keluar', '<=', $toDate],
        ])->get();
        
        
        return view ('laporanparkir', compact('dataparkirs'));
    }


}