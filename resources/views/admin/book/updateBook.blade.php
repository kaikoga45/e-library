@extends('admin.layout')

@section('title')
Update Buku
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
                                <li class="breadcrumb-item" aria-current="page"><a href="/book">Buku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h5 class="text-blue">Data Buku</h5>
                    </div>
                </div>
                <form action="{{ url('/postUpdatebook/'.$var_buku->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Judul Buku</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_buku -> judul}}" name="inputJudul">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Kategori</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_buku -> kategori}}"
                                name="inputKategori">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Pengarang</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_buku -> pengarang}}"
                                name="inputPengarang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Jumlah Halaman</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_buku -> halaman}}"
                                name="inputHalaman">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Penerbit</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_buku -> penerbit}}"
                                name="inputPenerbit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" value="{{$var_buku -> tahun_terbit}}" type="date"
                                name="inputTahun">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Jumlah Buku</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_buku -> jumlah_buku}}"
                                name="inputJumlah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Status Buku</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="inputStatus">
                                <option selected value="{{$var_buku->status_buku}}">{{$var_buku->status_buku}}
                                </option>
                                @if ($var_buku->status_buku == "Tersedia")
                                <option value="Tidak tersedia">Tidak tersedia</option>
                                @elseif($var_buku->status_buku == "Tidak tersedia")
                                <option value="Tersedia">Tersedia</option>
                                @else
                                <option value="Tidak tersedia">Tidak tersedia</option>
                                <option value="Tersedia">Tersedia</option>
                                @endif
                            </select>
                        </div>
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
            <!-- Simple Datatable End -->
        </div>
        <div class="footer-wrap bg-white pd-20 mb-20 border-radius-5 box-shadow" style="margin-top: 95px">
            ELibrary - System Made By <a href="https://github.com/kaikoga7" target="_blank">Kai Koga</a>
        </div>
    </div>
</div>
@endsection