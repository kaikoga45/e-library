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
                            <h4>Peminjam</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Peminjam</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="/tambahPeminjam">
                            Tambah Peminjam
                        </a>
                    </div>
                    @if (session('addSuccess'))
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('addSuccess') }}!</strong>
                        </div>
                    </div>
                    @endif
                    @if (session('returnSuccess'))
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('returnSuccess') }}!</strong>
                        </div>
                    </div>
                    @endif
                    @if (session('deleteSuccess'))
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('deleteSuccess') }}!</strong>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h5 class="text-blue">Databases Peminjam</h5>
                    </div>
                </div>
                <div class="row">
                    <table class="data-table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Anggota</th>
                                <th scope="col">Buku</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Tanggal Dikembalikan</th>
                                <th scope="col">Durasi Terlambat</th>
                                <th scope="col">Denda (500 x hari)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Diterima Oleh</th>
                                <th class="datatable-nosort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;    
                            ?>
                            @foreach ($var_peminjam as $vrp)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$vrp -> anggota}}</td>
                                <td>{{$vrp -> buku}}</td>
                                <td>{{$vrp -> tanggal_peminjaman}}</td>
                                <td>{{$vrp -> tanggal_dikembalikan}}</td>
                                <td>{{$vrp -> durasi_terlambat}}</td>
                                <td>{{$vrp -> total_denda}}</td>
                                <td>{{$vrp -> status}}</td>
                                <td>{{$vrp -> terima_oleh}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @if ($vrp->status == "Belum Dikembalikan")
                                            <a class="dropdown-item" href="/kembalikan/{{$vrp -> id}}"><i
                                                    class="fa fa-hand-paper-o"></i>
                                                Dikembalikan
                                            </a>
                                            @endif
                                            <a class="dropdown-item" href="/hapusPeminjam/{{$vrp -> id}}"><i
                                                    class="fa fa-trash"></i> Hapus
                                            </a>
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