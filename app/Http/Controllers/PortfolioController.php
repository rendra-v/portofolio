<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = [
            [
                'title' => '🚀 ORBIT - Sistem Manajemen Organisasi Mahasiswa',
                'description' => 'Platform digital terintegrasi untuk manajemen organisasi mahasiswa di Universitas Yarsi. ORBIT memfasilitasi perencanaan, pelaksanaan, dan pelaporan kegiatan organisasi dengan sistem yang terstruktur dan efisien.',
                'features' => [
                    ' Manajemen Program Kerja',
                    ' Pengajuan Kegiatan dengan RAB',
                    ' Laporan Kegiatan (LPJ)',
                    ' Dokumentasi Kegiatan',
                    ' Prestasi Organisasi',
                    ' Multi-role (UKM, BEM, Kongres, Puskaka)',
                    ' Authentication dengan Laravel Fortify'
                ],
                'image' => '/images/orbit1.png',
                'tags' => ['Laravel 12', 'React 19', 'TypeScript', 'Inertia.js', 'Tailwind CSS'],
                'link' => '#',
            ],
        ];

        return view('portfolio', compact('portfolios'));
    }
}
