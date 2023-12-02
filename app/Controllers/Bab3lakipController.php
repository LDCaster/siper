<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bab3lakipModel;
use App\Models\PenatausahaanModel;
// use App\Models\AnggaranModel;
use App\Models\PelaporanModel;

class Bab3lakipController extends BaseController
{
    protected $bab3lakipModel;
    protected $PenatausahaanModel;
    // protected $AnggaranModel;
    protected $PelaporanModel;

    public function __construct()
    {
        $this->bab3lakipModel = new Bab3lakipModel();
        $this->PenatausahaanModel = new PenatausahaanModel();
        // $this->AnggaranModel = new AnggaranModel();
        $this->PelaporanModel = new PelaporanModel();
    }

    public function index()
    {
        $data = [
            'bab3lakips' => $this->bab3lakipModel->findAll(),
        
        ];
        // dd($data);

        return view('bab3lakip/index', $data);
    }
    

    public function create()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $penatausahaans = $this->PenatausahaanModel->findAll();
        $pelaporans = $this->PelaporanModel->findAll();

        return view('bab3lakip/create', ['penatausahaans' => $penatausahaans, 'pelaporans' => $pelaporans]);
    }

    public function store()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            // 'id_penatausahaan'  => 'required',
            // 'id_pelaporan'  => 'required',
            
            'narasi_capaian'  => 'required',
            'penyebab'  => 'required',
            'alternatif'  => 'required',
            'analisis_sumberdaya'  => 'required',
            'analisis_program_kegiatan'  => 'required',
            'tahun'  => 'required',
            'status_laporan' => 'required'
            
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                // 'id_penatausahaan'  => $this->request->getPost('id_penatausahaan'),
                // 'id_pelaporan'  => $this->request->getPost('id_pelaporan'),
                'narasi_capaian'  => $this->request->getPost('narasi_capaian'),
                'penyebab'  => $this->request->getPost('penyebab'),
                'alternatif'  => $this->request->getPost('alternatif'),
                'analisis_sumberdaya'  => $this->request->getPost('analisis_sumberdaya'),
                'analisis_program_kegiatan'  => $this->request->getPost('analisis_program_kegiatan'),
                'tahun'  => $this->request->getPost('tahun'),
                'status_laporan' => $this->request->getPost('status_laporan')               
            ];

            $this->bab3lakipModel->insert($data);

            return redirect()->to('/bab3lakip');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('bab3lakip/create', [
                'penatausahaans' => $this->PenatausahaanModel->findAll(),
                'pelaporans' => $this->PelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $bab3lakip = $this->bab3lakipModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        $penatausahaans = $this->PenatausahaanModel->findAll();
        $pelaporans = $this->PelaporanModel->findAll();

        return view('bab3lakip/edit', ['bab3lakip' => $bab3lakip, 'penatausahaans' => $penatausahaans, 'pelaporans' => $pelaporans]);
    }

    public function update($id)
    {
        // Validasi dan pembaruan data Indikator Kinerja Urusan berdasarkan ID
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk memperbarui data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            // 'id_penatausahaan'  => 'required',
            // 'id_pelaporan'  => 'required',
            'narasi_capaian'  => 'required',
            'penyebab'  => 'required',
            'alternatif'  => 'required',
            'analisis_sumberdaya'  => 'required',
            'analisis_program_kegiatan'  => 'required',
            'tahun'  => 'required',
            'status_laporan' => 'required'
            
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                // 'id_penatausahaan'  => $this->request->getPost('id_penatausahaan'),
                // 'id_pelaporan'  => $this->request->getPost('id_pelaporan'),
                'narasi_capaian'  => $this->request->getPost('narasi_capaian'),
                'penyebab'  => $this->request->getPost('penyebab'),
                'alternatif'  => $this->request->getPost('alternatif'),
                'analisis_sumberdaya'  => $this->request->getPost('analisis_sumberdaya'),
                'analisis_program_kegiatan'  => $this->request->getPost('analisis_program_kegiatan'),
                'tahun'  => $this->request->getPost('tahun'),
                'status_laporan' => $this->request->getPost('status_laporan')
                
            ];

            $this->bab3lakipModel->update($id, $data);

            return redirect()->to('/bab3lakip');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('bab3lakip/edit', [
                'bab3lakip' => $this->bab3lakipModel->find($id),
                'penatausahaans' => $this->PenatausahaanModel->findAll(),
                'pelaporans' => $this->PelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function destroy($id)
    {
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->bab3lakipModel->delete($id);

        return redirect()->to('/bab3lakip');
    }
}
