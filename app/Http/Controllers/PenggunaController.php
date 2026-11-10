<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengguna::with('karyawan')
            ->orderBy('id_pengguna', 'desc');

        // Pencarian nama atau username
        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->where(function ($q) use ($cari) {
                $q->where('username', 'like', '%' . $cari . '%')
                    ->orWhereHas('karyawan', function ($k) use ($cari) {
                        $k->where('nama_karyawan', 'like', '%' . $cari . '%');
                    });
            });
        }

        // Filter berdasarkan role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter berdasarkan status akun
        if ($request->filled('status')) {
            $query->where('status_akun', $request->status);
        }

        // Data pengguna dengan pagination
        $pengguna = $query->paginate(10)->withQueryString();

        // Ringkasan jumlah akun
        $totalAkun = Pengguna::count();

        $akunAktif = Pengguna::where('status_akun', 'aktif')
            ->count();

        $akunNonaktif = Pengguna::where('status_akun', 'nonaktif')
            ->count();

        $totalPeran = Pengguna::distinct('role')
            ->count('role');

        return view('admin.pengguna.index', compact(
            'pengguna',
            'totalAkun',
            'akunAktif',
            'akunNonaktif',
            'totalPeran'
        ));
    }
}
