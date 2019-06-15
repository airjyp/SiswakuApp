<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
        'nisn',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    protected $dates = ['tanggal_lahir'];

    public function setNamaAttribute($nama){
        // return strtolower($nama);
        $this->attributes['nama'] = strtolower($nama);
    }

    public function getNamaAttribute($nama){
        return ucwords($nama);
    } //Accessor


}
