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


Route::get('/', 'PagesController@homepage');
Route::get('about', 'PagesController@about');
Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
Route::patch('siswa/{siswa}', 'SiswaController@update');
Route::get('siswa', 'SiswaController@index');
Route::get('siswa/create', 'SiswaController@create');
Route::get('siswa/{siswa}', 'SiswaController@show');
Route::post('siswa', 'SiswaController@store');
Route::delete('siswa/{siswa}', 'SiswaController@destroy');

Route::get('halaman-rahasia', 'RahasiaController@halamanRahasia')->name('secret');

Route::get('showmesecret', 'RahasiaController@showMeSecret');

Route::get('sampledata', function () {
    DB::table('siswa')->insert([
        [
            'nisn'          => 'G64150001',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150002',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150003',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150004',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150005',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150006',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150007',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150008',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150009',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
        [
            'nisn'          => 'G64150010',
            'nama'          => 'Achmad Ismail Rivaldi',
            'tanggal_lahir' => '1996-12-18',
            'jenis_kelamin' => 'L',
            'created_at'    => '2019-06-12 00:00:00',
            'updated_at'    => '2019-06-12 00:00:00',
        ],
    ]);
});

