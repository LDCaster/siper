<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BabvlakipModel;

class BabvlakipController extends BaseController
{
    public function index()
    {
        $BabvlakipModel = new BabvlakipModel();
        $data['babvlakips'] = $BabvlakipModel->findAll();
        return view('babvlakip/index', $data);
    }

    public function create()
    {
        return view('babvlakip/create');
    }

    public function store()
    {
        $BabvlakipModel = new BabvlakipModel();
        $data = [
            'kesimpulan' => $this->request->getPost('kesimpulan'),
            'perbaikan' => $this->request->getPost('perbaikan'),
            'tahun'=> $this->request->getPost('tahun'),
            'status_laporan' => $this->request->getPost('status_laporan'),
        ];
        $BabvlakipModel->insert($data);

        return redirect()->to('/babvlakip');
    }

    public function edit($id)
    {
        $BabvlakipModel = new BabvlakipModel();
        $data['babvlakip'] = $BabvlakipModel->find($id);
        return view('babvlakip/edit', $data);
    }

    public function update($id)
    {
        $BabvlakipModel = new BabvlakipModel();
        $data = [
            'kesimpulan' => $this->request->getPost('kesimpulan'),
            'perbaikan' => $this->request->getPost('perbaikan'),
            'tahun'=> $this->request->getPost('tahun'),
            'status_laporan' => $this->request->getPost('status_laporan'),
        ];
        $BabvlakipModel->update($id, $data);

        return redirect()->to('/babvlakip');
    }

    public function destroy($id)
    {
        $BabvlakipModel = new BabvlakipModel();
        $BabvlakipModel->delete($id);

        return redirect()->to('/babvlakip');
    }
}
