<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;
use Alert;
use Session;

class ManjAdminController extends Controller
{
    public function index()
    {
        $users_list = User::all();
        $total_useraktif = User::count();
        return view('manjadmin',compact('users_list', 'total_useraktif'));
    }

    public function create()
    {
        return view('addadmin');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|max:50|string|email|max:255',
            'password' => 'required|min:8',
            'no_telfon' => 'required',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $users_list = new User;
        $users_list->name = ($request->name);
        $users_list->email = ($request->email);
        $users_list->password = Hash::make($request->password);
        $users_list->no_telfon = ($request->no_telfon);

        
        if ($users_list->save()) {
            return redirect('manjadmin')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('manjadmin')->with('error', 'error message');
        }
    }

    public function edit($id)
    {
        $users_list = User::find($id);
        return view('editadmin',compact('users_list'));
    }

    public function update(User $user, Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|max:50|string|email|max:255',
            'no_telfon' => 'required',
        ]);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->update([
            'name' => ($request->name),
            'email' => ($request->email),
            'email_verified_at' => \Carbon\Carbon::now(),
            'no_telfon' => ($request->no_telfon),
            ]);
        
            if ($user->save()) {
                return redirect('manjadmin')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect('manjadmin')->with('error', 'error message');
            }
    }

    protected function destroy(Request $request, $id) 
    { 
       User::where('id',$id)->delete();

       return redirect()->back();
    }

    
}