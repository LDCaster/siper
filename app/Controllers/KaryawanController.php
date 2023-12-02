<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;

class KaryawanController extends BaseController
{
    protected $karyawanModel;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data['karyawan'] = $this->karyawanModel->findAll();
        return view('karyawan/index', $data);
    }

    public function create()
    {
        return view('karyawan/create');
    }

    public function store()
    {
        $data = [
            'jabatan' => $this->request->getPost('jabatan'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
        ];

        $this->karyawanModel->insert($data);

        return redirect()->to('/karyawan');
    }

    public function show($id)
    {
        $data['karyawan'] = $this->karyawanModel->find($id);
        return view('karyawan/show', $data);
    }

    public function edit($id)
    {
        $data['karyawan'] = $this->karyawanModel->find($id);
        return view('karyawan/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'jabatan' => $this->request->getPost('jabatan'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
        ];

        $this->karyawanModel->update($id, $data);

        return redirect()->to('/karyawan');
    }

    public function destroy($id)
    {
        $this->karyawanModel->delete($id);

        return redirect()->to('/karyawan');
    }
}
