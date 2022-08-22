<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kas;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasController extends Controller
{
    public function index()
    {
        $kas = Kas::with('anggota')->get();
        $pengeluaran = Pengeluaran::all();
        $totalPengeluaran = Pengeluaran::sum('nominal');
        $saldo = Kas::sum('nominal') - $totalPengeluaran;
        return view('kas.index', compact('kas', 'pengeluaran', 'saldo', 'totalPengeluaran'));
    }
    
    public function pemasukan()
    {
        $kas = Kas::with('anggota')->get();
        return view('kas.pemasukan', compact('kas'));
    }

    public function tambahPemasukan()
    {
        $anggota = Anggota::all();
        return view('kas.tambah-pemasukan', compact('anggota'));
    }

    public function pemasukanStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nominal' => 'required',
            'anggota_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        Kas::create([
            'anggota_id' => $request->anggota_id,
            'nominal' => $request->nominal,
        ]);

        return redirect('/kas/pemasukan')->with('success', 'Kas berhasil ditambahkan');
    }

    public function pemasukanEdit($id)
    {
        $kas = Kas::where('id', $id)->firstOrFail();
        $anggota = Anggota::all();

        return view('kas.edit-pemasukan', compact('kas', 'anggota'));
    }

    public function pemasukanUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nominal' => 'required',
            'anggota_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        Kas::where('id', $id)->firstOrFail()->update($request->all());

        return redirect('/kas/pemasukan')->with('success', 'Kas berhasil diubah');
    }

    public function pemasukanDelete($id)
    {
        Kas::where('id', $id)->firstOrFail()->delete();

        return redirect('/kas/pemasukan')->with('success', 'Kas berhasil dihapus');
    }

    
    public function pengeluaran()
    {
        $pengeluaran = Pengeluaran::all();
        return view('kas.pengeluaran', compact('pengeluaran'));
    }

    public function tambahPengeluaran()
    {
        return view('kas.tambah-pengeluaran');
    }

    public function pengeluaranStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        Pengeluaran::create([
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
        ]);

        return redirect('/kas/pengeluaran')->with('success', 'Pengeluaran berhasil dicatat');
    }

    public function pengeluaranEdit($id)
    {
        $pengeluaran = Pengeluaran::where('id', $id)->firstOrFail();

        return view('kas.edit-pengeluaran', compact('pengeluaran'));
    }

    public function pengeluaranUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        Pengeluaran::where('id', $id)->firstOrFail()->update($request->all());

        return redirect('/kas/pengeluaran')->with('success', 'Pengeluaran berhasil diubah');
    }

    public function pengeluaranDelete($id)
    {
        Pengeluaran::where('id', $id)->firstOrFail()->delete();

        return redirect('/kas/pengeluaran')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
