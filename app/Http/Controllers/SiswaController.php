<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Siswa;
use Validator;

class SiswaController extends Controller
{
    public function index(){
        $siswa = Siswa::orderBy('nisn', 'asc')
                ->paginate(10);
        $jumlah_siswa = Siswa::all()->count();
        return view('siswa.index', compact('siswa', 'jumlah_siswa'));
    }

    public function show($id){
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function create(){
        return view('siswa.create');
    }

    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:9|unique:siswa,nisn',
            'nama' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        if ($validator->fails()){
            return redirect('siswa/create')
                ->withInput()
                ->withErrors($validator);
        }

        else{
            Siswa::create($input);
            return redirect('siswa');
        }
    }

    public function edit($id){
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update($id, Request $request){
        $siswa = Siswa::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:9|unique:siswa,nisn,' .$request->input('id'),
            'nama' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        if ($validator->fails()){
            return redirect('siswa/' .$id. '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $siswa->update($input);
        return redirect('siswa');
    }

    public function destroy($id){
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }

    public function dateMutator(){
        $siswa = Siswa::findOrFail(4);
        $tanggal_lahir = $siswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun = $siswa->tanggal_lahir->addYears(50)->format('d-m-Y');
        return "Siswa <strong>{$siswa->nama}</strong> lahir pada <strong>{$tanggal_lahir}</strong>. <br>
        Ulang tahun ke-50 akan jatuh pada <strong>{$ulang_tahun}</strong> ";
    }
}
