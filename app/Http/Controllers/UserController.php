<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\User;
use App\Roles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $roles = Roles::all();
        $roles = Roles::where('nama','user')->pluck('id')->first();
        $users = User::where('roles',$roles)->get();
        return view('admin.datapengguna', compact('users','roles'));
        // return $users;

        // $data_user = User::all();
        
    }

    public function create()
    {
        //
    }

    public function tambah(Request $request)
    {
        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->username),
            'roles' => 2,
        ]);
        // Alert::success('Data Berhasil di simpan');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        $edit = User::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
        $edit = User::find($request->id);
        $edit->nama = $request->nama;
        $edit->username = $request->username;
        $edit->save();
        
        // Alert::success('Data Berhasil di Update');
        return redirect()->back();
    }

    public function hapus($id){
        User::destroy($id);
        // Alert::success('Data Berhasil di Hapus');
        return redirect()->back();
    }
}
