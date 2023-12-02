<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UrusanModel;

class UrusanController extends BaseController
{
    public function index()
    {
        $urusanModel = new UrusanModel();
        $data['urusans'] = $urusanModel->findAll();
        return view('urusan/index', $data);
    }

    public function create()
    {
        return view('urusan/create');
    }

    public function store()
    {
        $urusanModel = new UrusanModel();
        $data = [
            'nama_urusan' => $this->request->getPost('nama_urusan'),
        ];
        $urusanModel->insert($data);

        return redirect()->to('/urusan');
    }

    public function edit($id)
    {
        $urusanModel = new UrusanModel();
        $data['urusan'] = $urusanModel->find($id);
        return view('urusan/edit', $data);
    }

    public function update($id)
    {
        $urusanModel = new UrusanModel();
        $data = [
            'nama_urusan' => $this->request->getPost('nama_urusan'),
        ];
        $urusanModel->update($id, $data);

        return redirect()->to('/urusan');
    }

    public function destroy($id)
    {
        $urusanModel = new UrusanModel();
        $urusanModel->delete($id);

        return redirect()->to('/urusan');
    }
}
