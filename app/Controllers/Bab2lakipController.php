<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bab2lakipModel;
// use App\Models\KaryawanModel;

class Bab2lakipController extends BaseController
{
    protected $bab2lakipModel;
    // protected $karyawanModel;

    public function __construct()
    {
        $this->bab2lakipModel = new Bab2lakipModel();
        // $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'bab2lakips' => $this->bab2lakipModel->findAll(),
        
        ];
        // dd($data);

        return view('bab2lakip/index', $data);
    }
    

    public function create()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        // $karyawans = $this->karyawanModel->findAll();

        return view('bab2lakip/create');
    }

    public function store()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

       
        // Contoh validasi
        $validationRules = [
            'visi' => 'required',
            'misi' => 'required',
            'tujuan_sasaran' => 'required',
            'indikator_kinerja_utama' => 'required',
            'perjanjian_kinerja' => 'required',
            'program_kegiatan' => 'required',
            'tahun' => 'required',
            'status_laporan' => 'required'
            
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'visi' => $this->request->getPost('visi'),
                'misi' => $this->request->getPost('misi'),
                'tujuan_sasaran' => $this->request->getPost('tujuan_sasaran'),
                'indikator_kinerja_utama' => $this->request->getPost('indikator_kinerja_utama'),
                'perjanjian_kinerja' => $this->request->getPost('perjanjian_kinerja'),
                'program_kegiatan' => $this->request->getPost('program_kegiatan'),
                'tahun' => $this->request->getPost('tahun'),
                'status_laporan' => $this->request->getPost('status_laporan'),
                
            ];

            $this->bab2lakipModel->insert($data);

            return redirect()->to('/bab2lakip');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('bab2lakip/create', [
                // 'karyawans' => $this->karyawanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $bab2lakip = $this->bab2lakipModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        // $karyawans = $this->karyawanModel->findAll();

        return view('bab2lakip/edit', ['bab2lakip' => $bab2lakip]);
    }

    public function update($id)
    {
        // Validasi dan pembaruan data Indikator Kinerja Urusan berdasarkan ID
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk memperbarui data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'visi' => 'required',
            'misi' => 'required',
            'tujuan_sasaran' => 'required',
            'indikator_kinerja_utama' => 'required',
            'perjanjian_kinerja' => 'required',
            'program_kegiatan' => 'required',
            'tahun' => 'required',
            'status_laporan' => 'required'
            
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                'visi' => $this->request->getPost('visi'),
                'misi' => $this->request->getPost('misi'),
                'tujuan_sasaran' => $this->request->getPost('tujuan_sasaran'),
                'indikator_kinerja_utama' => $this->request->getPost('indikator_kinerja_utama'),
                'perjanjian_kinerja' => $this->request->getPost('perjanjian_kinerja'),
                'program_kegiatan' => $this->request->getPost('program_kegiatan'),
                'tahun' => $this->request->getPost('tahun'),
                'status_laporan' => $this->request->getPost('status_laporan')
                
            ];

            $this->bab2lakipModel->update($id, $data);

            return redirect()->to('/bab2lakip');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('bab2lakip/edit', [
                'bab2lakip' => $this->bab2lakipModel->find($id),
                // 'karyawans' => $this->karyawanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function destroy($id)
    {
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->bab2lakipModel->delete($id);

        return redirect()->to('/bab2lakip');
    }
}
