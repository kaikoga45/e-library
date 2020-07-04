<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\buku;
use App\peminjam;
use App\anggota;

class dashboardCont extends Controller
{
    public function show(){
        $data_buku = buku::all();
        $data_peminjam = peminjam::all();
        $data_anggota = anggota::all();

        $jumlah_judul_buku = $data_buku->count();
        $jumlah_belum_dikembalikan = $data_peminjam->where('status', 'Belum Dikembalikan')->count();
        $jumlah_anggota = $data_anggota->count();

        return view('admin.dashboard', ['var_buku' => $data_buku, 'var_peminjam'=>$data_peminjam, 'var_jumlah_judul'=>$jumlah_judul_buku, 'var_belum_dikembalikan'=>$jumlah_belum_dikembalikan, 'var_jumlah_anggota'=>$jumlah_anggota]);
    }
}
