@extends('admin.layout')

@section('title')
Databases Peminjam
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Buku</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/borrowing">Borrower</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Select-2 Start -->
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue">Tambah Peminjam</h4>
                        <p class="mb-30 font-14">Pilih nama anggota serta nama buku yang akan dipinjam</p>
                    </div>
                </div>
                <form action="/postTambahpeminjam" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Anggota
                            <a href="/postUser" role="button" data-toggle="modal" data-target="#modalAnggota"
                                type="button">
                                <i class="fa fa-question myDIV"></i>
                                <div class="hide">Tidak ditemukan nama anggota? Klik ikonnya untuk menambahkan anggota
                                    baru
                                </div>
                            </a>
                        </label>
                        <select class="custom-select2 form-control" name="inputAnggota"
                            style="width: 100%; height: 38px;">
                            <option selected="">Pilih...</option>
                            @foreach ($var_anggota as $vra)
                            <option value="{{$vra->nama}}">{{$vra->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Buku
                            <a href="/postBook" role="button" data-toggle="modal" data-target="#modalBuku"
                                type="button">
                                <i class="fa fa-question myDIV"></i>
                                <div class="hide">Tidak ditemukan judul buku? Klik ikonnya untuk menambahkan judul buku
                                    baru
                                </div>
                            </a>
                        </label>
                        <select class="custom-select2 form-control" name="inputBuku" style="width: 100%; height: 38px;">
                            <option selected="">Pilih...</option>
                            @foreach ($var_buku as $vrb)
                            @if ($vrb->status_buku == 'Tersedia')
                            <option value="{{$vrb->judul}}">{{$vrb->judul}}</option>
                            @else
                            <option disabled>{{$vrb->judul}} [Buku Habis atau Tidak Tersedia]</option>
                            @endif

                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="clearfix">
                        <div class="pull-right">
                            <button type="button" class="btn btn-danger">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Select-2 end -->
        </div>
        <div class="footer-wrap bg-white pd-20 mb-20 border-radius-5 box-shadow" style="margin-top: 95px">
            ELibrary - System Made By <a href="https://github.com/kaikoga7" target="_blank">Kai Koga</a>
        </div>

        <!-- Modal Tambah Buku -->
        <div class="col-md-4 col-sm-12">
            <div class="modal fade bs-example-modal-lg" id="modalBuku" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Tambah Buku</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form action="/postBook" method="POST" class="needs-validation" novalidate>
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Judul Buku</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan nama buku"
                                            name="inputJudul">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan kategori buku"
                                            name="inputKategori">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama Pengarang</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan nama pengarang"
                                            name="inputPengarang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah Halaman</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan Jumlah Halaman"
                                            name="inputHalaman">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama Penerbit</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan nama penerbit"
                                            name="inputPenerbit">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tahun Terbit</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" placeholder="Pilih tanggal terbitnya" type="date"
                                            name="inputTahun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Jumlah Buku</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan jumlah buku"
                                            name="inputJumlah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Status Buku</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12" name="inputStatus">
                                            <option selected="">Pilih...</option>
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Tidak tersedia">Tidak tersedia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Tambah Buku -->

        <!-- Modal Tambah Anggota -->
        <div class="col-md-4 col-sm-12">
            <div class="modal fade bs-example-modal-lg" id="modalAnggota" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Tambah User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form action="/postUser" method="POST" class="needs-validation" novalidate>
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan nama"
                                            name="inputNama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Alamat Tinggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan alamat tinggal"
                                            name="inputAlamat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nomor Kontak</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan nomor kontak"
                                            name="inputKontak">
                                    </div>
                                </div>
                                <div class=" modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Tambah Anggota -->

    </div>
</div>
@endsection