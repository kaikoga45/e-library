<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', 'authCont@viewLogin')->name('login');

Route::post('postLogin', 'authCont@login');

Route::get('/logout', 'authCont@logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'dashboardCont@show');

    /*----------*/

    //Tampil data buku
    Route::get('/book', 'bukuCont@show');

    //Inputan Data Buku
    Route::post('/postBook','bukuCont@addBook');

    //Menghapus Data Buku
    Route::get('/deleteBook/{id}', 'bukuCont@deleteBook');

    //Menuju ke view update
    Route::get('/updateBook/{id}', 'bukuCont@viewUpdate');

    //Memproses update buku
    Route::post('/postUpdatebook/{id}', 'bukuCont@update');

    /*------------*/

    //Tampil data user
    Route::get('/user', 'userCont@show');

    //Tambah User
    Route::post('/postUser', 'userCont@addUser');

    //Menghapus Data User
    Route::get('/deleteUser/{id}', 'userCont@deleteUser');

    //Menuju ke view update
    Route::get('/updateUser/{id}', 'userCont@viewUpdate');

    //Memproses update user
    Route::post('/postUpdateuser/{id}', 'userCont@update');

    /*------------*/

    //Tampil data peminjam
    Route::get('/borrowing', 'peminjamCont@show');

    //Tampil view tambah peminjam
    Route::get('/tambahPeminjam', 'peminjamCont@viewTambahpeminjam');

    Route::post('/postTambahpeminjam', 'peminjamCont@tambahPeminjam');

    Route::get('/kembalikan/{id}', 'peminjamCont@kembalikanBuku');

    Route::get('/hapusPeminjam/{id}', 'peminjamCont@hapusDatapeminjam');
});

    