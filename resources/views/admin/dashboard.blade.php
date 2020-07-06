@extends('admin.layout')

@section('title')
Dashboard
@endsection

@section('content')
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="row clearfix progress-box">
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-blue text-white">
								<i class="fa fa-book"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-blue weight-500 font-24">{{$var_jumlah_judul}}</span>
							<p class="weight-400 font-18">Judul Buku Tersimpan</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-green text-white">
								<i class="fa fa-exchange"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-green weight-500 font-24">{{$var_belum_dikembalikan}}</span>
							<p class="weight-400 font-18">Buku Sedang Dipinjam</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-orange text-white">
								<i class="fa fa-user-o"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-orange weight-500 font-24">{{$var_jumlah_anggota}}</span>
							<p class="weight-400 font-18">Anggota Terdaftar</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<div class="card-header">
						Pesan
					</div>
					<div class="card-body">
						<blockquote class="blockquote mb-0">
							<p>Selamat datang di sistem manajemen data-data perpustakaan</p>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<h4 class="mb-20">Tambahan judul buku terbaru</h4>
					<div class="notification-list mx-h-450 customscroll">
						<ul>
							@foreach ($var_buku as $vrb)
							@php
							$tanggal_sekarang = date("Y-m-d");
							$to = $vrb->waktu_ditambahkan;
							$from = $tanggal_sekarang;
							@endphp
							@if ($to == $from)
							<li>
								<a href="#">
									<h3 class="clearfix">{{$vrb->judul}}</h3>
									<p>Ditambahkan oleh {{$vrb->input_oleh}}</p>
								</a>
							</li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<h4 class="mb-20">Peminjam buku terbaru</h4>
					<div class="notification-list mx-h-450 customscroll">
						<ul>
							@foreach ($var_peminjam as $vrp)
							@php
							$tanggal_sekarang = date("Y-m-d");
							$to = $vrp->tanggal_peminjaman;
							$from = $tanggal_sekarang;
							@endphp
							@if ($to == $from)
							<li>
								<a href="#">
									<h3 class="clearfix">{{$vrp->anggota}}</h3>
									<p>Telah meminjam sebuah buku dengan judul "{{$vrp->buku}}"</p>
								</a>
							</li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('code')
<script type="text/javascript">
	Highcharts.chart('areaspline-chart', {
			chart: {
				type: 'areaspline'
			},
			title: {
				text: ''
			},
			legend: {
				layout: 'vertical',
				align: 'left',
				verticalAlign: 'top',
				x: 70,
				y: 20,
				floating: true,
				borderWidth: 1,
				backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
			},
			xAxis: {
				categories: [
					'Monday',
					'Tuesday',
					'Wednesday',
					'Thursday',
					'Friday',
					'Saturday',
					'Sunday'
				],
				plotBands: [{
					from: 4.5,
					to: 6.5,
				}],
				gridLineDashStyle: 'longdash',
                gridLineWidth: 1,
                crosshair: true
			},
			yAxis: {
				title: {
					text: ''
				},
				gridLineDashStyle: 'longdash',
			},
			tooltip: {
				shared: true,
				valueSuffix: ' units'
			},
			credits: {
				enabled: false
			},
			plotOptions: {
				areaspline: {
					fillOpacity: 0.6
				}
			},
			series: [{
				name: 'John',
				data: [0, 5, 8, 6, 3, 10, 8],
				color: '#f5956c'
			}, {
				name: 'Jane',
				data: [0, 3, 6, 3, 7, 5, 9],
				color: '#f56767'
			}, {
				name: 'Johnny',
				data: [0, 2, 5, 3, 2, 4, 0],
				color: '#a683eb'
			}, {
				name: 'Daniel',
				data: [0, 4, 7, 3, 0, 7, 4],
				color: '#41ccba'
			}]
		});


		// Device Usage chart
		Highcharts.chart('device-usage', {
			chart: {
				type: 'pie'
			},
			title: {
				text: ''
			},
			subtitle: {
				text: ''
			},
			credits: {
				enabled: false
			},
			plotOptions: {
				series: {
					dataLabels: {
						enabled: false,
						format: '{point.name}: {point.y:.1f}%'
					}
				},
				pie: {
					innerSize: 127,
					depth: 45
				}
			},

			tooltip: {
				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
			},
			series: [{
				name: 'Brands',
				colorByPoint: true,
				data: [{
					name: 'IE',
					y: 10,
					color: '#ecc72f'
				}, {
					name: 'Chrome',
					y: 40,
					color: '#46be8a'
				}, {
					name: 'Firefox',
					y: 30,
					color: '#f2a654'
				}, {
					name: 'Safari',
					y: 10,
					color: '#62a8ea'
				}, {
					name: 'Opera',
					y: 10,
					color: '#e14e50'
				}]
			}]
		});

		// gauge chart
		Highcharts.chart('ram', {

			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			title: {
				text: ''
			},
			credits: {
				enabled: false
			},
			pane: {
				startAngle: -150,
				endAngle: 150,
				background: [{
					borderWidth: 0,
					outerRadius: '109%'
				}, {
					borderWidth: 0,
					outerRadius: '107%'
				}, {
				}, {
					backgroundColor: '#fff',
					borderWidth: 0,
					outerRadius: '105%',
					innerRadius: '103%'
				}]
			},

			yAxis: {
				min: 0,
				max: 200,

				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 10,
				minorTickPosition: 'inside',
				minorTickColor: '#666',

				tickPixelInterval: 30,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				labels: {
					step: 2,
					rotation: 'auto'
				},
				title: {
					text: 'RAM'
				},
				plotBands: [{
					from: 0,
					to: 120,
					color: '#55BF3B'
				}, {
					from: 120,
					to: 160,
					color: '#DDDF0D'
				}, {
					from: 160,
					to: 200,
					color: '#DF5353'
				}]
			},

			series: [{
				name: 'Speed',
				data: [80],
				tooltip: {
					valueSuffix: '%'
				}
			}]
		});
		Highcharts.chart('cpu', {

			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false
			},
			title: {
				text: ''
			},
			credits: {
				enabled: false
			},
			pane: {
				startAngle: -150,
				endAngle: 150,
				background: [{
					borderWidth: 0,
					outerRadius: '109%'
				}, {
					borderWidth: 0,
					outerRadius: '107%'
				}, {
				}, {
					backgroundColor: '#fff',
					borderWidth: 0,
					outerRadius: '105%',
					innerRadius: '103%'
				}]
			},

			yAxis: {
				min: 0,
				max: 200,

				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 10,
				minorTickPosition: 'inside',
				minorTickColor: '#666',

				tickPixelInterval: 30,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				labels: {
					step: 2,
					rotation: 'auto'
				},
				title: {
					text: 'CPU'
				},
				plotBands: [{
					from: 0,
					to: 120,
					color: '#55BF3B'
				}, {
					from: 120,
					to: 160,
					color: '#DDDF0D'
				}, {
					from: 160,
					to: 200,
					color: '#DF5353'
				}]
			},

			series: [{
				name: 'Speed',
				data: [120],
				tooltip: {
					valueSuffix: ' %'
				}
			}]
		});
</script>
@endsection