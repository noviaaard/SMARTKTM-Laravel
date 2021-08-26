<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjual;
use Validator;

class PenjualController extends Controller
{
    public function index()
    {
        $penjual = Penjual::all();
        return view('penjual',compact('penjual'));
    }

    public function create()
    {
        return view('addpenjual');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_warung' => 'required|max:20',
            'saldo_penjual' => 'required|integer',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penjual = new Penjual;
        $penjual->nama_warung = ($request->nama_warung);
        $penjual->saldo_penjual = ($request->saldo_penjual);

        
        if ($penjual->save()) {
            return redirect('penjual')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('penjual')->with('error', 'error message');
        }
    }

    protected function destroy(Request $request, $id) 
    { 
       Penjual::where('id',$id)->delete();
       return redirect()->back();
    }

    public function edit($id)
    {
        $penjual = Penjual::find($id);
        return view('editpenjual',compact('penjual'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'nama_warung' => 'required|max:20',
            'saldo' => 'required|integer',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penjual = Penjual::find($id);
        $penjual->update([
            'nama_warung' => ($request->nama_warung),
            'saldo' => ($request->saldo),
            ]);
        
            if ($penjual->save()) {
                return redirect('penjual')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('penjual')->with('error', 'error message');
            }
    }
}
