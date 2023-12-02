<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IndikatorKinerjaUrusanModel;
use App\Models\SatuanModel;


class SatuanController extends BaseController
{

    protected $satuanModel;
   

    public function __construct()
    {
        $this->satuanModel = new SatuanModel();
       
    }

    public function index()
    {
        $satuan = $this->satuanModel->getSatuan();
        // dd($satuan);

        $data = [
            'title' => 'Satuan',
            'satuan' => $satuan,
        ];

        return view('satuan/index', $data);
    }

    public function create()
    {
        // Mengambil data Urusan untuk digunakan dalam form create
      

        $data = [
            'title' => 'Tambah Data Satuan',
            'validation' => \Config\Services::validation(),
            
        ];

        return view('satuan/create', $data);
    }

    public function store()
    {
        // validasi
        $validationRules = [
            'nama_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Satuan Harus Diisi',
                ]
            ],
           
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // ambil data dari form
        $nama_satuan = $this->request->getPost('nama_satuan');
       

        // membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
           
        ];


        // insert ke table
        $simpan = $this->satuanModel->insert($data);


        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->to('satuan/create');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/satuan');
        }
    }

    public function edit($id)
    {
        // Mengambil data satuan berdasarkan ID
        $satuan = $this->satuanModel->find($id);
       
        $data = [
            'title' => 'Edit Data Satuan',
            'validation' => \Config\Services::validation(),
            'satuan' => $satuan,
           

        ];

        return view('satuan/edit', $data);
    }

    public function update($id)
    {
        // validasi
        $validationRules = [
            'nama_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Satuan Harus Diisi',
                ]
            ],
           
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        $simpan = $this->satuanModel->update($id, [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
           
        ]);

        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal diubah!');
            return redirect()->to('/satuan/edit/' . $id);
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil diubah!');
            return redirect()->to('/satuan');
        }
    }

    public function destroy($id)
    {
        // Menghapus data satuan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $simpan = $this->satuanModel->delete($id);

        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal dihapus!');
            return redirect()->to('/satuan');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil dihapus!');
            return redirect()->to('/satuan');
        }
    }

}
