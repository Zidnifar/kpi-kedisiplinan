
@extends('layouts.app')
@section('content')
<style>
.dashboard-page{width:100%;max-width:none;margin:0;padding:0 8px 24px;box-sizing:border-box;color:#111827;font-family:'Segoe UI',Inter,Arial,sans-serif}
.dashboard-page *{box-sizing:border-box}
.process-card,.stat-card,.content-card,.action-card{background:#fff;border:1px solid #d0d5dd;border-radius:18px}
.process-card{min-height:157px;padding:24px;margin-bottom:20px}
.process-title{font-size:20px;font-weight:600;margin:0 0 25px}
.process-steps{display:grid;grid-template-columns:repeat(5,minmax(0,1fr))}
.process-step{position:relative;text-align:center;min-width:0}
.process-step:not(:last-child):after{content:"";position:absolute;top:15px;left:calc(50% + 16px);width:calc(100% - 32px);height:2px;background:#d8dee7}
.process-step.completed:not(:last-child):after{background:#ff941c}
.step-circle{position:relative;z-index:1;width:30px;height:30px;margin:0 auto 10px;border:2px solid #acb1b9;border-radius:50%;display:flex;align-items:center;justify-content:center;background:#fff;color:#6b7280;font-size:14px;font-weight:700}
.process-step.completed .step-circle{background:#ff941c;border-color:#ff941c;color:#fff}
.process-step.active .step-circle{border-color:#ff941c;color:#ff941c}
.step-name{font-size:13px;font-weight:600;white-space:normal}
.step-status{font-size:12px;color:#6b7280;margin-top:5px}
.stats-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;margin-bottom:20px}
.stat-card{min-height:95px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;gap:12px;min-width:0}
.stat-number{font-size:clamp(26px,2vw,34px);font-weight:700;line-height:1.1;margin-bottom:7px;color:#000}
.stat-label{font-size:14px;color:#344054;white-space:normal}
.stat-icon,.action-icon{width:46px;height:46px;flex-shrink:0;border-radius:13px;background:#eef2f6;display:flex;align-items:center;justify-content:center}
.stat-icon svg,.action-icon svg{width:23px;height:23px;stroke:#111827;stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round}
.dashboard-columns{display:grid;grid-template-columns:minmax(0,1.8fr) minmax(300px,1fr);gap:20px;margin-bottom:20px;align-items:stretch}
.content-card{min-width:0;min-height:305px;padding:22px}
.card-title{font-size:19px;font-weight:600;margin:0 0 20px;color:#111}
.problem-table-wrap{width:100%;overflow-x:auto;border:1px solid #acb1b9;border-radius:9px}
.problem-table{width:100%;border-collapse:collapse;min-width:570px}
.problem-table thead{background:#eef2f6}
.problem-table th{height:43px;padding:0 13px;text-align:left;font-size:13px;font-weight:700;color:#111}
.problem-table td{height:43px;padding:0 13px;border-top:1px solid #d8dee7;font-size:14px;color:#111;white-space:nowrap}
.problem-table td:first-child{font-weight:600}
.status-pill{display:inline-flex;align-items:center;min-height:23px;padding:3px 10px;border-radius:12px;font-size:12px;font-weight:600;white-space:nowrap}
.status-danger{color:#c62828;background:rgba(234,74,76,.1)}
.status-warning{color:#9a4a00;background:rgba(255,207,172,.5)}
.summary-subtitle{font-size:13px;color:#6b7280;margin-top:-12px;margin-bottom:12px}
.summary-score{font-size:34px;font-weight:700;color:#000;margin-bottom:18px}
.summary-item{display:grid;grid-template-columns:minmax(75px,95px) minmax(40px,1fr) 48px;align-items:center;gap:9px;margin-bottom:21px;font-size:13px}
.summary-item:last-child{margin-bottom:0}
.summary-label{white-space:nowrap}
.summary-bar{height:11px;background:#eef2f6;border-radius:6px;overflow:hidden}
.summary-fill{height:100%;border-radius:6px}
.summary-count{text-align:right;font-size:13px;font-weight:600;white-space:nowrap}
.action-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px}
.action-card{min-height:86px;padding:15px 18px;display:flex;align-items:center;gap:14px;text-decoration:none;color:#111;transition:background .2s,border-color .2s}
.action-card:hover{background:#fafafa;border-color:#ff941c}
.action-title{font-size:15px;font-weight:600;margin-bottom:5px}
.action-description{font-size:12px;color:#6b7280}
@media(min-width:1600px){.dashboard-page{padding-left:8px;padding-right:8px}.process-card{padding:26px 28px}.content-card{padding:24px}.stats-grid,.action-grid{gap:20px}.dashboard-columns{gap:22px}}
@media(max-width:1100px){.dashboard-page{padding-left:6px;padding-right:6px}.stats-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.dashboard-columns{grid-template-columns:minmax(0,1fr)}.content-card{min-height:unset}.summary-card{min-height:300px}}
@media(max-width:700px){.dashboard-page{padding:0 6px 18px}.process-card{padding:18px 14px;overflow-x:auto}.process-title{font-size:17px;margin-bottom:22px}.process-steps{min-width:620px}.stats-grid{gap:10px;margin-bottom:14px}.stat-card{min-height:82px;padding:12px}.stat-number{font-size:26px}.stat-label{font-size:12px}.stat-icon{width:36px;height:36px}.stat-icon svg{width:20px;height:20px}.dashboard-columns{gap:14px;margin-bottom:14px}.content-card{padding:17px 13px}.card-title{font-size:17px;margin-bottom:16px}.problem-table{min-width:570px}.summary-item{grid-template-columns:75px minmax(40px,1fr) 45px;gap:7px}.action-grid{grid-template-columns:1fr;gap:10px}.action-card{min-height:76px;padding:12px 15px}.action-icon{width:40px;height:40px}}
@media(max-width:380px){.stats-grid{grid-template-columns:1fr}.stat-card{min-height:75px}}
</style>
<div class="dashboard-page">
    <section class="process-card">
        <h2 class="process-title">Proses Penilaian · Triwulan 3 2026</h2>
        <div class="process-steps">
            <div class="process-step completed"><div class="step-circle">✓</div><div class="step-name">Rekap absensi</div><div class="step-status">Selesai</div></div>
            <div class="process-step active"><div class="step-circle">2</div><div class="step-name">Konfirmasi kehadiran</div><div class="step-status">Dalam proses</div></div>
            <div class="process-step"><div class="step-circle">3</div><div class="step-name">Perhitungan KPI</div><div class="step-status">Belum dimulai</div></div>
            <div class="process-step"><div class="step-circle">4</div><div class="step-name">Validasi nilai</div><div class="step-status">Belum dimulai</div></div>
            <div class="process-step"><div class="step-circle">5</div><div class="step-name">Hasil akhir</div><div class="step-status">Belum dimulai</div></div>
        </div>
    </section>
    <section class="stats-grid">
        <div class="stat-card">
            <div><div class="stat-number">28</div><div class="stat-label">Total Karyawan</div></div>
            <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        </div>
        <div class="stat-card">
            <div><div class="stat-number">5</div><div class="stat-label">Belum Dihitung</div></div>
            <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="M4 2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zM8 6h8M8 11h.01M12 11h.01M16 11h.01M8 15h.01M12 15h.01M16 15h.01M8 19h.01M12 19h.01M16 19h.01"/></svg></div>
        </div>
        <div class="stat-card">
            <div><div class="stat-number">5</div><div class="stat-label">Belum Dikonfirmasi</div></div>
            <div class="stat-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></div>
        </div>
        <div class="stat-card">
            <div><div class="stat-number">28</div><div class="stat-label">Menunggu Validasi</div></div>
            <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2M9 2h6v4H9z"/></svg></div>
        </div>
    </section>
    <section class="dashboard-columns">
        <div class="content-card">
            <h2 class="card-title">Perlu Tindakan</h2>
            <div class="problem-table-wrap">
                <table class="problem-table">
                    <thead><tr><th>Karyawan</th><th>Tanggal</th><th>Masalah</th><th>Status</th></tr></thead>
                    <tbody>
                        <tr><td>Andi Pratama</td><td>1 Okt</td><td>Jam pulang kosong</td><td><span class="status-pill status-danger">Bermasalah</span></td></tr>
                        <tr><td>Andi Pratama</td><td>2 Okt</td><td>Berpotensi ganda</td><td><span class="status-pill status-warning">Perlu dicek</span></td></tr>
                        <tr><td>Andi Pratama</td><td>5 Okt</td><td>Shift malam, perlu konfirmasi</td><td><span class="status-pill status-warning">Belum dikonfirmasi</span></td></tr>
                        <tr><td>Andi Pratama</td><td>7 Okt</td><td>Tidak ada di file Excel</td><td><span class="status-pill status-warning">Belum dikonfirmasi</span></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="content-card summary-card">
            <h2 class="card-title">Ringkasan KPI TW3 2026</h2>
            <div class="summary-subtitle">Rata-rata nilai karyawan</div>
            <div class="summary-score">90,3</div>
            <div class="summary-item"><span class="summary-label">Sangat Baik</span><div class="summary-bar"><div class="summary-fill" style="width:85.7%;background:#1e8a4c"></div></div><span class="summary-count">12 org</span></div>
            <div class="summary-item"><span class="summary-label">Baik</span><div class="summary-bar"><div class="summary-fill" style="width:78.6%;background:#3b82f6"></div></div><span class="summary-count">11 org</span></div>
            <div class="summary-item"><span class="summary-label">Cukup</span><div class="summary-bar"><div class="summary-fill" style="width:28.6%;background:#ff941c"></div></div><span class="summary-count">4 org</span></div>
            <div class="summary-item"><span class="summary-label">Kurang</span><div class="summary-bar"><div class="summary-fill" style="width:7.1%;background:#c62828"></div></div><span class="summary-count">1 org</span></div>
        </div>
    </section>
    <section class="action-grid">
        <a href="#" class="action-card">
            <div class="action-icon"><svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg></div>
            <div><div class="action-title">Impor Absensi</div><div class="action-description">Unggah dan periksa data</div></div>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><svg viewBox="0 0 24 24"><path d="M4 2h16a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zM8 6h8M8 11h.01M12 11h.01M16 11h.01M8 15h.01M12 15h.01M16 15h.01M8 19h.01M12 19h.01M16 19h.01"/></svg></div>
            <div><div class="action-title">Hitung KPI</div><div class="action-description">Triwulan 3 2026</div></div>
        </a>
        <a href="#" class="action-card">
            <div class="action-icon"><svg viewBox="0 0 24 24"><path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2M6 14h12v8H6z"/></svg></div>
            <div><div class="action-title">Lihat Laporan</div><div class="action-description">Cetak / ekspor hasil</div></div>
        </a>
    </section>
</div>
@endsection
