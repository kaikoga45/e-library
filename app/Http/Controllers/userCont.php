<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggota;

class userCont extends Controller
{
    public function show(){
        $data_anggota = anggota::all();

        return view('admin.user.mainUser', ['var_user' => $data_anggota]);
    }

    public function addUser(Request $req){
        
        $anggota = new anggota;

        $anggota->nama = $req->inputNama;
        $anggota->alamat_tinggal = $req->inputAlamat;
        $anggota->nomor_kontak = $req->inputKontak;
        $anggota->bergabung_sejak = date("Y-m-d");
        
        $anggota->save();
        return redirect("/user");

    }

    public function deleteUser($id){
         $idanggota = anggota::find($id);
         $idanggota->delete();
         return redirect('/user');
    }

    public function viewUpdate($id){
        $idanggota = anggota::find($id);

        return view("admin.user.updateUser", ["var_anggota"=>$idanggota]);
    }

    public function update($idUser, Request $req){
        $anggota= anggota::find($idUser);

        $anggota->nama = $req->inputNama;
        $anggota->alamat_tinggal = $req->inputAlamat;
        $anggota->nomor_kontak = $req->inputKontak;

        $anggota->save();

        return redirect('/user');
    }
}
