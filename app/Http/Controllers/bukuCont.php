<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\buku;
use App\peminjam;

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

        if($buku->save()){
            return redirect()->back()->with('statusSuccess', 'Telah berhasil menambahkan data buku');
        }else{
            return redirect()->back()->with('statusFailed', 'Gagal menambahkan data buku');
        }

    }

    public function deleteBook($id){
         $idBuku = buku::find($id);

         if($idBuku->delete()){
            return redirect()->back()->with('statusSuccess', 'Telah berhasil menghapuskan data buku');
         }else{
            return redirect()->back()->with('statusFailed', 'Telah gagal menghapuskan data buku');
         }
    }

    public function viewUpdate($id){
        $idBuku = buku::find($id);
        return view("admin.book.updateBook", ["var_buku"=>$idBuku]);
    }

    public function update($idBuku, Request $req){
        
        $buku= buku::find($idBuku);
        
        $namaBuku = $buku->judul;
        
        $updateNamaJudul = $req->inputJudul;

        $cekJudulDiPeminjam = peminjam::where('buku', $namaBuku)->get();

        $jumlahJudulDiPinjam = $cekJudulDiPeminjam->count();

        if($jumlahJudulDiPinjam > 0){
            peminjam::where('buku', $namaBuku)->update(['buku'=>$updateNamaJudul]);
        }

        $userLogin = auth()->user();

        $buku->judul = $req->inputJudul;
        $buku->penerbit = $req->inputPenerbit;
        $buku->kategori = $req->inputKategori;
        $buku->pengarang = $req->inputPengarang;
        $buku->tahun_terbit = $req->inputTahun;
        $buku->halaman = $req->inputHalaman;
        $buku->jumlah_buku = $req->inputJumlah;
        $buku->status_buku = $req->inputStatus;
        $buku->input_oleh = $userLogin->name;
        $buku->waktu_ditambahkan = date("Y-m-d");

        if($buku->save()){
            return redirect('/book')->with('statusSuccess', 'Telah berhasil mengupdate data buku');
        }else{
            return redirect('/book')->with('statusFailed', 'Gagal mengupdate data buku');
        }

    }
}
