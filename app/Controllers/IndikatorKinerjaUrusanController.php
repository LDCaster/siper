<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IndikatorKinerjaUrusanModel;
use App\Models\SubkegiatanModel;

class IndikatorKinerjaUrusanController extends BaseController
{
    protected $indikatorKinerjaUrusanModel;
    protected $subkegiatanModel;

    public function __construct()
    {
        $this->indikatorKinerjaUrusanModel = new IndikatorKinerjaUrusanModel();
        $this->subkegiatanModel = new SubkegiatanModel();
    }

    public function index()
    {
        // Mengambil data Indikator Kinerja Urusan beserta data Urusan yang terkait
        $indikatorKinerjaUrusan = $this->indikatorKinerjaUrusanModel->getIndikatorKinerjaUrusan();
        // dd($indikatorKinerjaUrusan);

        return view('indikator_kinerja_urusan/index', ['indikatorKinerjaUrusan' => $indikatorKinerjaUrusan]);
    }
    

    public function create()
    {
        // Mengambil data Urusan untuk digunakan dalam form create
        $subkegiatans = $this->subkegiatanModel->findAll();

        return view('indikator_kinerja_urusan/create', ['subkegiatans' => $subkegiatans]);
    }

    public function store()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_subkegiatan' => 'required',
            'nama_indikator_kinerja' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
                'nama_indikator_kinerja' => $this->request->getPost('nama_indikator_kinerja'),
            ];

            $this->indikatorKinerjaUrusanModel->insert($data);

            return redirect()->to('/indikator-kinerja-urusan');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('indikator_kinerja_urusan/create', [
                'subkegiatans' => $this->subkegiatanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $indikatorKinerjaUrusan = $this->indikatorKinerjaUrusanModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        $subkegiatans = $this->subkegiatanModel->findAll();

        return view('indikator_kinerja_urusan/edit', ['indikatorKinerjaUrusan' => $indikatorKinerjaUrusan, 'subkegiatans' => $subkegiatans]);
    }

    public function update($id)
    {
        // Validasi dan pembaruan data Indikator Kinerja Urusan berdasarkan ID
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk memperbarui data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_subkegiatan' => 'required',
            'nama_indikator_kinerja' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
                'nama_indikator_kinerja' => $this->request->getPost('nama_indikator_kinerja'),
            ];

            $this->indikatorKinerjaUrusanModel->update($id, $data);

            return redirect()->to('/indikator-kinerja-urusan');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('indikator_kinerja_urusan/edit', [
                'indikatorKinerjaUrusan' => $this->indikatorKinerjaUrusanModel->find($id),
                'subkegiatans' => $this->subkegiatanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function destroy($id)
    {
        // Menghapus data Indikator Kinerja Urusan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->indikatorKinerjaUrusanModel->delete($id);

        return redirect()->to('/indikator-kinerja-urusan');
    }
}
