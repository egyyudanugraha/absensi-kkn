<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public function index($id)
    {
        $anggota = Anggota::where('id', $id)->get()->firstOrFail();

        $checkAbsenToday = Absensi::where('anggota_id', $id)->whereDate('created_at', date('Y-m-d'))->first();
        if ($checkAbsenToday) {
            return view('absensi.gagal', compact('anggota'));
        }

        Absensi::create([
            'status' => 'hadir',
            'anggota_id' => $anggota->id,
        ]);

        return view('absensi.sukses', compact('anggota'));
    }

    public function view_absen(){
        $anggota = Anggota::where('nim', '!=', 1912)->get();
        $absensi = Absensi::with('anggota')->orderby('created_at', 'ASC')->get();
        return view('absensi.index', compact('anggota', 'absensi'));
    }

    // public function edit_absen($id){
    //     $anggota = Anggota::where('nim', '!=', 1912)->get();
    //     $idanggota = Anggota::where('id', $id)->get()->firstOrFail();
    //     return view('absensi.edit', compact('anggota', 'idanggota'));
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'anggota_id' => 'required',
            'tanggal' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $tanggal = date_create($request->tanggal);
        $checkAbsenToday = Absensi::where('anggota_id', $request->anggota_id)->whereDate('created_at', date_format($tanggal, 'Y-m-d'))->first();
        if ($checkAbsenToday) {
            return redirect()->back()->with('error', 'Anggota sudah absensi ditanggal tersebut');
        }

        DB::table('absensis')->insert([
            'status' => $request->status,
            'anggota_id' => $request->anggota_id,
            'alasan' => $request->alasan,
            'created_at' => date_format($tanggal, 'Y-m-d H:i:s'),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil');
    }

    public function delete_absen($id)
    {
        Absensi::where('id', $id)->firstOrFail()->delete();

        return redirect()->back()->with('success', 'Absensi berhasil dihapus!');
    }
}
