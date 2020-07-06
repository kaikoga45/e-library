@extends('admin.layout')

@section('title')
Database Buku
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
                                <li class="breadcrumb-item active" aria-current="page">Buku</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="#" role="button" data-toggle="modal"
                            data-target="#bd-example-modal-lg" type="button">
                            Tambah buku
                        </a>
                    </div>
                    @if (session('statusSuccess'))
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('statusSuccess') }}!</strong>
                        </div>
                    </div>
                    @endif
                    @if (session('statusFailed'))
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('statusFailed') }}!</strong>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h5 class="text-blue">Databases Buku</h5>
                    </div>
                </div>
                <div class="row">
                    <table class="data-table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Kategori</Th>
                                <th scope="col">Halaman</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Jumlah Buku</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Diinputkan</th>
                                <th scope="col">Diinputkan Oleh</th>
                                <th class="datatable-nosort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;    
                            ?>
                            @foreach ($var_book as $vrb)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$vrb -> judul}}</td>
                                <td>{{$vrb -> pengarang}}</td>
                                <td>{{$vrb -> kategori}}</td>
                                <td>{{$vrb -> halaman}}</td>
                                <td>{{$vrb -> penerbit}}</td>
                                <td>{{$vrb -> jumlah_buku}}</td>
                                <td>{{$vrb -> status_buku}}</td>
                                <td>{{$vrb -> waktu_ditambahkan}}</td>
                                <td>{{$vrb -> input_oleh}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/updateBook/{{$vrb -> id}}"><i
                                                    class="fa fa-pencil"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="/deleteBook/{{$vrb -> id}}"><i
                                                    class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
        <div class="footer-wrap bg-white pd-20 mb-20 border-radius-5 box-shadow" style="margin-top: 95px">
            ELibrary - System Made By <a href="https://github.com/kaikoga7" target="_blank">Kai Koga</a>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
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
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama Pengarang</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" placeholder="Masukkan nama pengarang"
                                            name="inputPengarang">
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
    </div>
</div>
@endsection

@section('code')
<script>
    $('document').ready(function(){
        $('.data-table').DataTable({
            scrollCollapse: true,
            scrollX: true,
            autoWidth: true,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                searchPlaceholder: "Search"
            },
        });
    });
</script>
<script>
    // Switchery
		var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-btn'));
		$('.switch-btn').each(function() {
			new Switchery($(this)[0], $(this).data());
		});

		// Bootstrap Touchspin
		$("input[name='demo_vertical2']").TouchSpin({
			verticalbuttons: true,
			verticalupclass: 'fa fa-plus',
			verticaldownclass: 'fa fa-minus'
		});
		$("input[name='demo3']").TouchSpin();
		$("input[name='demo1']").TouchSpin({
			min: 0,
			max: 100,
			step: 0.1,
			decimals: 2,
			boostat: 5,
			maxboostedstep: 10,
			postfix: '%'
		});
		$("input[name='demo2']").TouchSpin({
			min: -1000000000,
			max: 1000000000,
			stepinterval: 50,
			maxboostedstep: 10000000,
			prefix: '$'
		});
		$("input[name='demo3_22']").TouchSpin({
			initval: 40
		});
		$("input[name='demo5']").TouchSpin({
			prefix: "pre",
			postfix: "post"
		});
</script>
@endsection