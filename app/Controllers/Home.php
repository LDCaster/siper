<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IndikatorKinerjaUrusanModel;
use App\Models\SubKegiatanModel;
use App\Models\KaryawanModel;
use App\Models\AnggaranModel;

class Home extends BaseController
{
    public function index()
    {
        // Mengambil data dari model
        $indikatorKinerjaModel = new IndikatorKinerjaUrusanModel();
        $subKegiatanModel = new SubKegiatanModel();
        $karyawanModel = new KaryawanModel();
        $anggaranModel = new AnggaranModel();

        $totalIndikator = $indikatorKinerjaModel->countAll();
        $totalSubKegiatan = $subKegiatanModel->countAll();
        $totalKaryawan = $karyawanModel->countAll();
        $totalAnggaran = $anggaranModel->selectSum('pagu_indikatif')->get()->getRow()->pagu_indikatif;


        // Mengirim data ke view
        $data = [
            'totalIndikator' => $totalIndikator,
            'totalSubKegiatan' => $totalSubKegiatan,
            'totalKaryawan' => $totalKaryawan,
            'totalAnggaran' => $totalAnggaran,
        ];

        return view('dashboard/index', $data);
    }
}
