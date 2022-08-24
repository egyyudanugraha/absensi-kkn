<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kas;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kas = Kas::with('anggota')->get();
        $pengeluaran = Pengeluaran::all();
        $totalPengeluaran = Pengeluaran::sum('nominal');
        $saldo = Kas::sum('nominal') - $totalPengeluaran;
        $absensi = Absensi::with('anggota')->orderby('created_at', 'ASC')->get();
        return view('home.index', compact('kas', 'pengeluaran', 'absensi', 'saldo', 'totalPengeluaran'));
    }
}
