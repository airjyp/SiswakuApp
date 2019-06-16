<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Siswa;
use App\Telepon;
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
            'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon'
        ]);

        if ($validator->fails()){
            return redirect('siswa/create')
                ->withInput()
                ->withErrors($validator);
        }

        else{
            $siswa = Siswa::create($input);

            $telepon = new Telepon;
            $telepon->nomor_telepon = $request->input('nomor_telepon');
            $siswa->telepon()->save($telepon);
            return redirect('siswa');
        }
    }

    public function edit($id){
        $siswa = Siswa::findOrFail($id);

        if (!empty($siswa->telepon->nomor_telepon)){
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }

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
            'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,' . $request->input('id') . ',id_siswa'

        ]);

        if ($validator->fails()){
            return redirect('siswa/' .$id. '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $siswa->update($input);

        if ($siswa->telepon) {
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            } else {
                $siswa->telepon()->delete();
            }
        } else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }

        return redirect('siswa');
        // return $siswa;
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
