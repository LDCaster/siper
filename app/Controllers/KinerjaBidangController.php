<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KinerjaBidangModel;
use App\Models\PohonKinerjaModel;
use App\Models\SatuanModel;

class KinerjaBidangController extends BaseController
{
    protected $kinerjabidangModel;
    protected $pohonkinerjaModel;
    protected $satuanModel;

    public function __construct()
    {
        $this->kinerjabidangModel = new KinerjaBidangModel();
        $this->pohonkinerjaModel = new PohonKinerjaModel();
        $this->satuanModel = new SatuanModel();
    }

    public function index()
    {
        // Mengambil data Indikator Kinerja Urusan beserta data Urusan yang terkait
        $kinerjabidangModel = $this->kinerjabidangModel->getKinerjaBidang();
        // dd($indikatorKinerjaUrusan);

        return view('kinerjabidang/index', ['kinerjabidang' => $kinerjabidangModel]);
    }
    

    public function create()
    {
        // Mengambil data Urusan untuk digunakan dalam form create
        $pohonkinerjas = $this->pohonkinerjaModel->findAll();
        // $satuans = $this->satuanModel->findAll();

        return view('kinerjabidang/create', ['pohonkinerjas' => $pohonkinerjas]);
    }

    public function store()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_pohon' => 'required',
            'indikator' => 'required',
            
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_pohon' => $this->request->getPost('id_pohon'),
                'indikator' => $this->request->getPost('indikator'),
               
            ];

            $this->kinerjabidangModel->insert($data);

            return redirect()->to('/kinerjabidang');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('kinerjabidang/create', [
                'pohonkinerjas' => $this->pohonkinerjaModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $kinerjabidang = $this->kinerjabidangModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        $pohonkinerjas = $this->pohonkinerjaModel->findAll();

        return view('kinerjabidang/edit', ['kinerjabidang' => $kinerjabidang, 'pohonkinerjas' => $pohonkinerjas]);
    }

    public function update($id)
    {
       
        $validationRules = [
            'id_pohon' => 'required',
            'indikator' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                'id_pohon' => $this->request->getPost('id_pohon'),
                'indikator' => $this->request->getPost('indikator'),
            ];

            $this->kinerjabidangModel->update($id, $data);

            return redirect()->to('/kinerjabidang');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('kinerjabidang/edit', [
                'kinerjabidang' => $this->kinerjabidangModel->find($id),
                'pohonkinerjas' => $this->pohonkinerjaModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function destroy($id)
    {
        // Menghapus data Indikator Kinerja Urusan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->kinerjabidangModel->delete($id);

        return redirect()->to('/kinerjabidang');
    }
}
