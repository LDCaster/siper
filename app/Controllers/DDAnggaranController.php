<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DDAnggaranModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class DDAnggaranController extends BaseController
{
    protected $DDAnggaranModel;

    public function __construct()
    {
        $this->DDAnggaranModel = new DDAnggaranModel();
    }

    public function index()
    {
        $data['dd_anggaran'] = $this->DDAnggaranModel->getDDperpus();
        return view('anggaran/datadukung/index', $data);
    }

    public function indexarsip()
    {
        $data['dd_anggaran'] = $this->DDAnggaranModel->getDDarsip();
        return view('anggaran/datadukung/indexarsip', $data);
    }

    public function indexsekre()
    {
        $data['dd_anggaran'] = $this->DDAnggaranModel->getDDsekre();
        return view('anggaran/datadukung/indexsekre', $data);
    }

    public function create()
    {
        return view('anggaran/datadukung/create');
    }

    public function createarsip()
    {
        return view('anggaran/datadukung/createarsip');
    }

    public function createsekre()
    {
        return view('anggaran/datadukung/createsekre');
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
        return redirect()->to('/ddanggaran/create')->withInput()->with('validation', $this->validator);
    }

    $file = $this->request->getFile('file');
    $newFileName = $file->getRandomName();
    $file->move(ROOTPATH . 'public/uploads/ddAnggaran/', $newFileName);

    $status_tujuan = $this->request->getPost('status_tujuan');

    $this->DDAnggaranModel->save([
        'nama_file' => $this->request->getPost('nama_file'),
        'file' => $newFileName,
        'tahun' => $this->request->getPost('tahun'),
        'status_tujuan' => $status_tujuan
    ]);

    // Redirect sesuai dengan nilai status_tujuan
    switch ($status_tujuan) {
        case 'PERPUSTAKAAN':
            return redirect()->to('/ddanggaran')->with('success', 'Data Dukung berhasil ditambahkan.');
        case 'KEARSIPAN':
            return redirect()->to('/ddanggaranarsip')->with('success', 'Data Dukung berhasil ditambahkan.');
        case 'SEKRETARIAT':
            return redirect()->to('/ddanggaransekre')->with('success', 'Data Dukung berhasil ditambahkan.');
        default:
            // Default redirect jika status_tujuan tidak sesuai dengan yang diharapkan
            return redirect()->to('/ddanggaran')->with('success', 'Data Dukung berhasil ditambahkan.');
    }
}




    // Tambahkan metode untuk menampilkan pratinjau file PDF dan terapkan mpdf
    public function preview($id)
    {
        $data['dd_detail'] = $this->DDAnggaranModel->find($id);
        return view('anggaran/datadukung/preview', $data);
    }
    public function previewarsip($id)
    {
        $data['dd_detail'] = $this->DDAnggaranModel->find($id);
        return view('anggaran/datadukung/previewarsip', $data);
    }
    public function previewsekre($id)
    {
        $data['dd_detail'] = $this->DDAnggaranModel->find($id);
        return view('anggaran/datadukung/previewsekre', $data);
    }

    public function download($id)
    {
        $data = $this->DDAnggaranModel->find($id);
        return $this->response->download(ROOTPATH . 'public/uploads/ddAnggaran/' . $data['file'], null);
    }
    
    public function destroy($id)
    {
        $data = $this->DDAnggaranModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddAnggaran/' . $data['file']); // Hapus file dari folder uploads
        $this->DDAnggaranModel->delete($id);

        return redirect()->to('/ddanggaran')->with('success', 'Data Dukung berhasil dihapus.');
    }

    public function destroyarsip($id)
    {
        $data = $this->DDAnggaranModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddAnggaran/' . $data['file']); // Hapus file dari folder uploads
        $this->DDAnggaranModel->delete($id);

        return redirect()->to('/ddanggaranarsip')->with('success', 'Data Dukung berhasil dihapus.');
    }

    public function destroysekre($id)
    {
        $data = $this->DDAnggaranModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddAnggaran/' . $data['file']); // Hapus file dari folder uploads
        $this->DDAnggaranModel->delete($id);

        return redirect()->to('/ddanggaransekre')->with('success', 'Data Dukung berhasil dihapus.');
    }
}
