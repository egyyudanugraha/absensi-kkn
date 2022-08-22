<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('nim', '!=', 1912)->get();
        return view('absensi.index', compact('anggota'));

        // $anggota = Anggota::where('id', $id)->get()->firstOrFail();

        // $checkAbsenToday = Absensi::where('anggota_id', $id)->whereDate('created_at', date('Y-m-d'))->first();
        // if ($checkAbsenToday) {
        //     return view('absensi.gagal', compact('anggota'));
        // }

        // Absensi::create([
        //     'status' => 'hadir',
        //     'anggota_id' => $anggota->id,
        // ]);

        // return view('absensi.sukses', compact('anggota'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'anggota_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $checkAbsenToday = Absensi::where('anggota_id', $request->anggota_id)->whereDate('created_at', date('Y-m-d'))->first();
        if ($checkAbsenToday) {
            return redirect()->back()->with('error', 'Anda sudah absen hari ini');
        }

        if (date('H') > '10' && date('H') < '21') {
            return redirect()->back()->with('error', 'Absensi dibuka pukul 07.00 - 17.00');
        }

        Absensi::create([
            'status' => $request->status,
            'anggota_id' => $request->anggota_id,
            'alasan' => $request->alasan,
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil');
    }
}
