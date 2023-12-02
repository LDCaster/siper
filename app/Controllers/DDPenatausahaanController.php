<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DDPenatausahaanModel;
use CodeIgniter\HTTP\Files\UploadedFile;


class DDPenatausahaanController extends BaseController
{
    protected $DDPenatausahaanModel;

    public function __construct()
    {
        $this->DDPenatausahaanModel = new DDPenatausahaanModel();
    }

    public function index()
    {
        $data['dd_penatausahaan'] = $this->DDPenatausahaanModel->getDDperpus();
        return view('datadukungpenatausahaan/index', $data);
    }

    public function indexarsip()
    {
        $data['dd_penatausahaan'] = $this->DDPenatausahaanModel->getDDarsip();
        return view('datadukungpenatausahaan/indexarsip', $data);
    }

    public function indexsekre()
    {
        $data['dd_penatausahaan'] = $this->DDPenatausahaanModel->getDDsekre();
        return view('datadukungpenatausahaan/indexsekre', $data);
    }

    public function create()
    {
        return view('datadukungpenatausahaan/create');
    }
    public function createarsip()
    {
        return view('datadukungpenatausahaan/createarsip');
    }
    public function createsekre()
    {
        return view('datadukungpenatausahaan/createsekre');
    }

    public function store()
{
    $validationRules = [
        'nama_file' => 'required',
        'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,20240]', // Maksimal 20MB
        'tahun' => 'required',
        'status_tujuan' => 'required|in_list[PERPUSTAKAAN,KEARSIPAN,SEKRETARIAT]'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/ddpenatausahaan/create')->withInput()->with('validation', $this->validator);
    }

    $file = $this->request->getFile('file');

    // Pindahkan file yang diunggah ke folder yang diinginkan
    $newFileName = $file->getRandomName();
    $file->move(ROOTPATH . 'public/uploads/ddPenatausahaan/', $newFileName);

    // Ambil data dari form
    $data = [
        'nama_file' => $this->request->getPost('nama_file'),
        'file' => $newFileName,
        'tahun' => $this->request->getPost('tahun'),
        'status_tujuan' => $this->request->getPost('status_tujuan')
    ];

    // Simpan data ke database
    $this->DDPenatausahaanModel->save($data);

    // Redirect sesuai status_tujuan
    switch ($data['status_tujuan']) {
        case 'PERPUSTAKAAN':
            return redirect()->to('/ddpenatausahaan');
        case 'KEARSIPAN':
            return redirect()->to('/ddpenatausahaanarsip');
        case 'SEKRETARIAT':
            return redirect()->to('/ddpenatausahaansekre');
        default:
            // Redirect default jika status_tujuan tidak sesuai
            return redirect()->to('/ddpenatausahaan');
    }
}
    // Tambahkan metode untuk menampilkan pratinjau file PDF dan terapkan mpdf
    public function preview($id)
    {
        $data['dd_detail'] = $this->DDPenatausahaanModel->find($id);
        return view('datadukungpenatausahaan/preview', $data);
    }    
    public function previewarsip($id)
    {
        $data['dd_detail'] = $this->DDPenatausahaanModel->find($id);
        return view('datadukungpenatausahaan/previewarsip', $data);
    }    
    public function previewsekre($id)
    {
        $data['dd_detail'] = $this->DDPenatausahaanModel->find($id);
        return view('datadukungpenatausahaan/previewsekre', $data);
    }    


    public function download($id)
    {
        $data = $this->DDPenatausahaanModel->find($id);
        return $this->response->download(ROOTPATH . 'public/uploads/ddPenatausahaan/' . $data['file'], null);
    }

    public function destroy($id)
    {
        $data = $this->DDPenatausahaanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPenatausahaan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPenatausahaanModel->delete($id);

        return redirect()->to('/ddpenatausahaan')->with('success', 'Data Dukung berhasil dihapus.');
    }
    public function destroyarsip($id)
    {
        $data = $this->DDPenatausahaanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPenatausahaan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPenatausahaanModel->delete($id);

        return redirect()->to('/ddpenatausahaanarsip')->with('success', 'Data Dukung berhasil dihapus.');
    }
    public function destroysekre($id)
    {
        $data = $this->DDPenatausahaanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPenatausahaan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPenatausahaanModel->delete($id);

        return redirect()->to('/ddpenatausahaansekre')->with('success', 'Data Dukung berhasil dihapus.');
    }
}
