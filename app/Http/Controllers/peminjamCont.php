<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\peminjam;
use App\buku;
use App\anggota;

class peminjamCont extends Controller
{
    public function show(){
        $data_peminjam = peminjam::all();

        return view('admin.borrower.mainBorrower', ['var_peminjam' => $data_peminjam]);
    }

    public function viewTambahpeminjam(){
        $data_anggota = anggota::all();
        $data_buku = buku::all();

        return view('admin.borrower.addBorrower', ['var_anggota' => $data_anggota, 'var_buku'=>$data_buku]);
    }

    public function tambahPeminjam(Request $req){

        $peminjam = new peminjam;

        $judul_buku = $req->inputBuku;
        $dataJumlahBuku = buku::select('jumlah_buku')->where('judul', $judul_buku )->first();

        if($dataJumlahBuku->jumlah_buku > 0){
            buku::select('jumlah_buku')->where('judul', $judul_buku )->decrement('jumlah_buku');

            $peminjam->anggota = $req->inputAnggota;
            $peminjam->buku = $req->inputBuku;
            $peminjam->tanggal_peminjaman = date("Y-m-d");
            $peminjam->tanggal_dikembalikan = null;
            $peminjam->durasi_terlambat = "0";
            $peminjam->total_denda = "0";
            $peminjam->status = "Belum Dikembalikan";
            $peminjam->terima_oleh = '-';

            $peminjam->save();

            $dataJumlahBukuTerbaru = buku::select('jumlah_buku')->where('judul', $judul_buku )->first();

            if($dataJumlahBukuTerbaru->jumlah_buku < 1){
                buku::select('status_buku')->where('judul', $judul_buku )->update(['status_buku'=>'Habis']);
            }
        }
        return redirect("/borrowing")->with('addSuccess', 'Telah berhasil menambahkan data peminjam');
    }

    public function kembalikanBuku($idPeminjam){
        
        $peminjam = peminjam::find($idPeminjam);
        $judul_buku = $peminjam->buku;
        buku::select('jumlah_buku')->where('judul', $judul_buku)->increment('jumlah_buku');

        $tgl_kembali = date("Y-m-d");
        $tglPinjam = peminjam::select('tanggal_peminjaman')->where('id', $idPeminjam)->first();
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tgl_kembali);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $tglPinjam->tanggal_peminjaman);
        $diff_in_days = $to->diffInDays($from);
        
        $satu_minggu = 7;
        $batas_pinjam = 7;
        $denda = 500;

        if($diff_in_days > $satu_minggu){
            $durasiTerlambat = $diff_in_days - $satu_minggu;
            $totalDenda = $durasiTerlambat * $denda;
            
            $peminjam->tanggal_dikembalikan = $tgl_kembali;
            $peminjam->durasi_terlambat = $durasiTerlambat;
            $peminjam->total_denda = $totalDenda;
        }else{
            $peminjam->tanggal_dikembalikan = $tgl_kembali;
            $peminjam->durasi_terlambat = 0;
            $peminjam->total_denda = 0;
            
        }
        
        $peminjam->status = 'Telah Dikembalikan';
        
        $userLogin = auth()->user();

        $peminjam->terima_oleh = $userLogin->name;

        $peminjam->save();

        $dataStatusBuku = buku::select('status_buku')->where('judul', $judul_buku )->first();

        if($dataStatusBuku->status_buku == 'Habis'){
            buku::select('status_buku')->where('judul', $judul_buku )->update(['status_buku'=>'Tersedia']);
        }
        
        return redirect()->back()->with('returnSuccess', 'Telah berhasil memproses data peminjaman');
    }

    public function hapusDatapeminjam($id){
        
        $idPeminjam = peminjam::find($id);

        $statusPinjam = $idPeminjam->status;

        if($statusPinjam == 'Belum Dikembalikan'){
            $judul_buku = $idPeminjam->buku;
            buku::select('jumlah_buku')->where('judul', $judul_buku)->increment('jumlah_buku');
            $idPeminjam->delete();
        }else{
            $idPeminjam->delete();
        }

        return redirect()->back()->with('deleteSuccess', 'Telah berhasil menghapuskan data peminjaman');
    }
}
