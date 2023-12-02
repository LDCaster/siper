<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IKKModel;

use Dompdf\Dompdf;
use Dompdf\Options;

class IKKController extends BaseController
{

    protected $IKKModel;
    

    public function __construct()
    {
        $this->IKKModel = new IKKModel();
        
    }

    public function index()
    {
        $IKKModel = new IKKModel();
        $data['ikks'] = $IKKModel->findAll();
        return view('ikk/index', $data);
    }

    public function create()
    {
        return view('ikk/create');
    }

    public function store()
    {
        $IKKModel = new IKKModel();
        $data = [
            'urusan_pemerintahan' => $this->request->getPost('urusan_pemerintahan'),
            'ikk_keluaran' => $this->request->getPost('ikk_keluaran'),
            'ikk_outcome' => $this->request->getPost('ikk_outcome'),
        ];

        $IKKModel->insert($data);

        return redirect()->to('/ikk');
    }

    public function edit($id)
    {
        $IKKModel = new IKKModel();
        $data['ikk'] = $IKKModel->find($id);
        return view('ikk/edit', $data);
    }

    public function update($id)
    {
        $IKKModel = new IKKModel();
        $data = [
            'urusan_pemerintahan' => $this->request->getPost('urusan_pemerintahan'),
            'ikk_keluaran' => $this->request->getPost('ikk_keluaran'),
            'ikk_outcome' => $this->request->getPost('ikk_outcome'),
        ];
        $IKKModel->update($id, $data);

        return redirect()->to('/ikk');
    }

    public function destroy($id)
    {
        $IKKModel = new IKKModel();
        $IKKModel->delete($id);

        return redirect()->to('/ikk');
    }

    public function preview()
    {

        $data['ikk'] = $this->IKKModel->findAll();
        return view('ikk/preview', $data);
    }

    public function cetak()
    {
        $data['ikk'] = $this->IKKModel->findAll();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('ikk/cetak', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('DPA_arsip.pdf');
    }
}
