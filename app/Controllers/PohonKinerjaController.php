<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PohonKinerjaModel;
use App\Models\KinerjaBidangModel;


class PohonKinerjaController extends BaseController
{
    public function index()
    {
        $pohonkinerjaModel = new PohonkinerjaModel();
        $data['pohonkinerjas'] = $pohonkinerjaModel->findAll();
        return view('pohonkinerja/index', $data);
    }

    public function create()
    {
        return view('pohonkinerja/create');
    }

    public function store()
    {
        $pohonkinerjaModel = new PohonkinerjaModel();
        $data = [
            'nama_bidang' => $this->request->getPost('nama_bidang'),
            'sasaran' => $this->request->getPost('sasaran'),
        ];
        $pohonkinerjaModel->insert($data);

        return redirect()->to('/pohonkinerja');
    }

    public function edit($id)
    {
        $pohonkinerjaModel = new PohonkinerjaModel();
        $data['pohonkinerja'] = $pohonkinerjaModel->find($id);
        return view('pohonkinerja/edit', $data);
    }

    public function update($id)
    {
        $pohonkinerjaModel = new PohonkinerjaModel();
        $data = [
            'nama_bidang' => $this->request->getPost('nama_bidang'),
            'sasaran' => $this->request->getPost('sasaran'),
        ];
        $pohonkinerjaModel->update($id, $data);

        return redirect()->to('/pohonkinerja');
    }

    public function destroy($id)
    {
        $pohonkinerjaModel = new PohonkinerjaModel();
        $pohonkinerjaModel->delete($id);

        return redirect()->to('/pohonkinerja');
    }

    /////////////////////////////detail//////////
    public function detail($id_pohon)
    {
        $detailModel = new KinerjaBidangModel();
        $detail = $detailModel->where('id_pohon', $id_pohon)->findAll();
    
        $data = [
            'title' => 'Detail Pohon',
            'detail' => $detail,
        ];
    
        return view('pohonkinerja/detail', $data);
    }

    // app/Controllers/PohonController.php

        public function createDetail($id)
        {
            $pohonModel = new PohonkinerjaModel();
            $pohon = $pohonModel->find($id);

            if (empty($pohon)) {
                // Handle jika data tidak ditemukan
                return redirect()->to('/error');
            }

            // Kirim data ke view
            return view('pohon/createdetail', ['pohon' => $pohon]);
        }


}
