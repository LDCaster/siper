<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DDPelaporanModel;
use CodeIgniter\HTTP\Files\UploadedFile;


class DDPelaporanController extends BaseController
{
    protected $DDPelaporanModel;

    public function __construct()
    {
        $this->DDPelaporanModel = new DDPelaporanModel();
    }

    public function index()
    {
        $data['dd_pelaporan'] = $this->DDPelaporanModel->getDDlakip();
        return view('datadukungpelaporan/index', $data);
    }
    public function indexlppd()
    {
        $data['dd_pelaporan'] = $this->DDPelaporanModel->getDDlppd();
        return view('datadukungpelaporan/indexlppd', $data);
    }

    public function create()
    {
        return view('datadukungpelaporan/create');
    }
    public function createlppd()
    {
        return view('datadukungpelaporan/createlppd');
    }

    public function store()
{
    $validationRules = [
        'nama_file' => 'required',
        'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,20240]', // Maksimal 20MB
        'tahun' => 'required',
        'status_tujuan' => 'required'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/ddpelaporan/create')->withInput()->with('validation', $this->validator);
    }

    $file = $this->request->getFile('file');

    // Pindahkan file yang diunggah ke folder yang diinginkan
    $newFileName = $file->getRandomName();
    $file->move(ROOTPATH . 'public/uploads/ddPelaporan/', $newFileName);

    // Simpan data ke database
    $savedData = [
        'nama_file' => $this->request->getPost('nama_file'),
        'file' => $newFileName,
        'tahun' => $this->request->getPost('tahun'),
        'status_tujuan' => $this->request->getPost('status_tujuan')
    ];

    $this->DDPelaporanModel->save($savedData);

    // Redirect berdasarkan status_tujuan
    $redirectPage = '/ddpelaporan';

    if ($savedData['status_tujuan'] === 'LPPD') {
        $redirectPage = '/ddpelaporanlppd';
    }

    return redirect()->to($redirectPage)->with('success', 'Data Dukung berhasil ditambahkan.');
}


    // Tambahkan metode untuk menampilkan pratinjau file PDF dan terapkan mpdf
    public function preview($id)
    {
        $data['dd_detail'] = $this->DDPelaporanModel->find($id);
        return view('datadukungpelaporan/preview', $data);
    }    
    public function previewlppd($id)
    {
        $data['dd_detail'] = $this->DDPelaporanModel->find($id);
        return view('datadukungpelaporan/previewlppd', $data);
    }    


    public function download($id)
    {
        $data = $this->DDPelaporanModel->find($id);
        return $this->response->download(ROOTPATH . 'public/uploads/ddPelaporan/' . $data['file'], null);
    }

    public function destroy($id)
    {
        $data = $this->DDPelaporanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPelaporan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPelaporanModel->delete($id);

        return redirect()->to('/ddpelaporan')->with('success', 'Data Dukung berhasil dihapus.');
    }
    
    public function destroylppd($id)
    {
        $data = $this->DDPelaporanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPelaporan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPelaporanModel->delete($id);

        return redirect()->to('/ddpelaporanlppd')->with('success', 'Data Dukung berhasil dihapus.');
    }
}
