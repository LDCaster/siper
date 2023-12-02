<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubKegiatanModel;


class SubKegiatanController extends BaseController
{
    protected $subkegiatanModel;


    public function __construct()
    {
        $this->subkegiatanModel = new SubKegiatanModel();

    }

    public function index()
    {
        $subkegiatan = $this->subkegiatanModel->getSubkegiatan();

        $data = [
            'title' => 'Sub Kegiatan',
            'subkegiatan' => $subkegiatan,
        ];

        return view('subkegiatan/index', $data);
    }

    public function create()
    {
  

        $data = [
            'title' => 'Tambah Data Sub Kegiatan',
            'validation' => \Config\Services::validation(),

        ];

        return view('subkegiatan/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'nama_subkegiatan' => 'required',
            'urusan' => 'required',
            'program' => 'required',
            'kegiatan' => 'required',
            'indikator_subkegiatan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_subkegiatan' => $this->request->getPost('nama_subkegiatan'),
            'urusan' => $this->request->getPost('urusan'),
            'program' => $this->request->getPost('program'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'indikator_subkegiatan' => $this->request->getPost('indikator_subkegiatan'),
        ];

        $simpan = $this->subkegiatanModel->insert($data);

        if (!$simpan) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->to('sub-kegiatan/create');
        } else {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/sub-kegiatan');
        }
    }

    public function edit($id)
    {
        $subkegiatan = $this->subkegiatanModel->find($id);
        

        $data = [
            'title' => 'Edit Data Sub Kegiatan',
            'validation' => \Config\Services::validation(),
            'subkegiatan' => $subkegiatan,
           
        ];

        return view('subkegiatan/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'nama_subkegiatan' => 'required',
            'urusan' => 'required',
            'program' => 'required',
            'kegiatan' => 'required',
            'indikator_subkegiatan' => 'required',

        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_subkegiatan' => $this->request->getPost('nama_subkegiatan'),
            'urusan' => $this->request->getPost('urusan'),
            'program' => $this->request->getPost('program'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'indikator_subkegiatan' => $this->request->getPost('indikator_subkegiatan'),

        ];

        $simpan = $this->subkegiatanModel->update($id, $data);

        if (!$simpan) {
            session()->setFlashdata('pesan', 'Data Gagal diubah!');
            return redirect()->to('/sub-kegiatan/edit/' . $id);
        } else {
            session()->setFlashdata('pesan', 'Data Berhasil diubah!');
            return redirect()->to('/sub-kegiatan');
        }
    }

    public function destroy($id)
    {
        $simpan = $this->subkegiatanModel->delete($id);

        if (!$simpan) {
            session()->setFlashdata('pesan', 'Data Gagal dihapus!');
            return redirect()->to('/sub-kegiatan');
        } else {
            session()->setFlashdata('pesan', 'Data Berhasil dihapus!');
            return redirect()->to('/sub-kegiatan');
        }
    }

}
