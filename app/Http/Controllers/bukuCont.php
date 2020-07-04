<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\buku;
use App\kategori;

class bukuCont extends Controller
{
    public function show(){
        $data_buku = buku::all();

        return view('admin.book.mainBook', ['var_book' => $data_buku]);
    }

    public function addBook(Request $req){
        
        $buku = new buku;
        $userLogin = auth()->user();

        $buku->judul = $req->inputJudul;
        $buku->kategori = $req->inputKategori;
        $buku->penerbit = $req->inputPenerbit;
        $buku->pengarang = $req->inputPengarang;
        $buku->tahun_terbit = $req->inputTahun;
        $buku->halaman = $req->inputHalaman;
        $buku->jumlah_buku = $req->inputJumlah;
        $buku->status_buku = $req->inputStatus;
        $buku->waktu_ditambahkan = date("Y-m-d");
        $buku->input_oleh = $userLogin->name;
        
        $buku->save();
        return redirect()->back()->with('addSuccess', 'Telah berhasil menambahkan data buku');

    }

    public function deleteBook($id){
         $idBuku = buku::find($id);
         $idBuku->delete();
         return redirect()->back()->with('deleteSuccess', 'Telah berhasil menghapuskan data buku');
    }

    public function viewUpdate($id){
        $idBuku = buku::find($id);
        return view("admin.book.updateBook", ["var_buku"=>$idBuku]);
    }

    public function update($idBuku, Request $req){
        $buku= buku::find($idBuku);
        $userLogin = auth()->user();

        $buku->judul = $req->inputJudul;
        $buku->penerbit = $req->inputPenerbit;
        $buku->pengarang = $req->inputPengarang;
        $buku->tahun_terbit = $req->inputTahun;
        $buku->halaman = $req->inputHalaman;
        $buku->jumlah_buku = $req->inputJumlah;
        $buku->status_buku = $req->inputStatus;
        $buku->input_oleh = $userLogin->name;

        $buku->save();

        return redirect('/book')->with('updateSuccess', 'Telah berhasil megupdate data buku');
    }
}
