<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggota;
use App\peminjam;

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

        if($anggota->save()){
            return redirect()->back()->with('statusSuccess', 'Telah berhasil menambahkan data anggota');
        }else{
            return redirect()->back()->with('statusFailed', 'Gagal menambahkan data anggota');
        }

    }

    public function deleteUser($id){
         $idanggota = anggota::find($id);
         
        if($idanggota->delete()){
            return redirect()->back()->with('statusSuccess', 'Telah berhasil menghapuskan data anggota');
        }else{
            return redirect()->back()->with('statusFailed', 'Gagal menghapuskan data anggota');
        }
    }

    public function viewUpdate($id){
        $idanggota = anggota::find($id);

        return view("admin.user.updateUser", ["var_anggota"=>$idanggota]);
    }

    public function update($idUser, Request $req){
        $anggota = anggota::find($idUser);

        $namaAnggota = $anggota->nama;
        $updateNamaPeminjam = $req->inputNama;

        $cekAnggotaDiPeminjam = peminjam::where('anggota', $namaAnggota)->get();

        $jumlahAnggota = $cekAnggotaDiPeminjam->count();

        if($jumlahAnggota > 0){
            peminjam::where('anggota', $namaAnggota)->update(['anggota'=>$updateNamaPeminjam]);
        }

        $anggota->nama = $req->inputNama;
        $anggota->alamat_tinggal = $req->inputAlamat;
        $anggota->nomor_kontak = $req->inputKontak;

        if($anggota->save()){
            return redirect('/user')->with('statusSuccess', 'Telah berhasil mengupdate data anggota');
        }else{
            return redirect('/user')->with('statusFailed', 'Gagal mengupdate data anggota');
        }
    }
}
