<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LampiranModel;
use CodeIgniter\HTTP\Files\UploadedFile;


class LampiranController extends BaseController
{
    protected $LampiranModel;

    public function __construct()
    {
        $this->LampiranModel = new LampiranModel();
    }

    public function index()
    {
        $data['lampiran'] = $this->LampiranModel->getAllData();
        return view('lampiran/index', $data);
    }

    public function create()
    {
        return view('lampiran/create');
    }

    public function store()
    {
        $validationRules = [
            'nama_file' => 'required',
            'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,20240]', // Maksimal 20MB
            'tahun' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/lampiran/create')->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('file');

        // Pindahkan file yang diunggah ke folder yang diinginkan
        $newFileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/lampiran/', $newFileName);

        // Simpan data ke database
        $this->LampiranModel->save([
            'nama_file' => $this->request->getPost('nama_file'),
            'file' => $newFileName,
            'tahun' => $this->request->getPost('tahun')
        ]);

        return redirect()->to('/lampiran')->with('success', 'Data Dukung berhasil ditambahkan.');
    }

    public function preview($id)
    {
        $data['lampiran_detail'] = $this->LampiranModel->find($id);
        return view('lampiran/preview', $data);
    }    
  


    public function download($id)
    {
        $data = $this->LampiranModel->find($id);
        return $this->response->download(ROOTPATH . 'public/uploads/lampiran/' . $data['file'], null);
    }

    public function destroy($id)
    {
        $data = $this->LampiranModel->find($id);
        unlink(ROOTPATH . 'public/uploads/lampiran/' . $data['file']); // Hapus file dari folder uploads
        $this->LampiranModel->delete($id);

        return redirect()->to('/lampiran')->with('success', 'Data Dukung berhasil dihapus.');
    }
}
