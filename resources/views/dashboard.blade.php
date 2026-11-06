@extends('layouts.app')
@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('content')
    <h2 class="page-title">Selamat Datang, {{ Auth::user()->username }}!</h2>
    <p class="page-description">
        Selamat datang di Sistem Informasi KPI Kedisiplinan
        PT Intan Wijaya Internasional.
    </p>
    <div style="
        background-color: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 5px #00000010;
    ">
        <h3 style="color: #17365d; margin-bottom: 12px;">
            Dashboard Admin
        </h3>
        <p style="font-size: 14px; color: #666; line-height: 1.7;">
            Anda berhasil masuk ke dalam sistem KPI Kedisiplinan.
            Silakan gunakan menu navigasi di sebelah kiri untuk
            mengelola data dan proses penilaian KPI karyawan.
        </p>
    </div>
@endsection
