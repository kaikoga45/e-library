@extends('admin.layout')

@section('title')
Update Anggota
@endsection

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>User</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/user">User</a></li>
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
                        <h5 class="text-blue">Data User</h5>
                    </div>
                </div>
                <form action="{{ url('/postUpdateuser/'.$var_anggota->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_anggota -> nama}}" name="inputNama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_anggota -> alamat_tinggal}}"
                                name="inputAlamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nomor Kontak</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="{{$var_anggota -> nomor_kontak}}"
                                name="inputKontak">
                        </div>
                    </div>
                    <hr>
                    <div class="clearfix">
                        <div class="pull-right">
                            <a href="/user"><button type="button" class="btn btn-danger">Batal</button></a>
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