<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DDPerencanaanModel;
use CodeIgniter\HTTP\Files\UploadedFile;


class DDPerencanaanController extends BaseController
{
    protected $DDPerencanaanModel;

    public function __construct()
    {
        $this->DDPerencanaanModel = new DDPerencanaanModel();
    }

    public function index()
    {
        $data['dd_perencanaan'] = $this->DDPerencanaanModel->getDDUmum();
        return view('perencanaan/datadukung/index', $data);
    }
    public function indexrakor()
    {
        $data['dd_rakor'] = $this->DDPerencanaanModel->getDDRakor();
        return view('perencanaan/datadukungrakor/index', $data);
    }

    public function indexrakorarsip()
    {
        $data['dd_rakor'] = $this->DDPerencanaanModel->getDDRakorarsip();
        return view('perencanaan/datadukungrakor/indexarsip', $data);
    }

    public function indexrenja()
    {
        $data['dd_renja'] = $this->DDPerencanaanModel->getDDRenja();
        return view('perencanaan/datadukungrenja/index', $data);
    }

    public function create()
    {
        return view('perencanaan/datadukung/create');
    }

    public function createRakor()
    {
        return view('perencanaan/datadukungrakor/create');
    }

    public function createRakorarsip()
    {
        return view('perencanaan/datadukungrakor/createarsip');
    }

    public function createRenja()
    {
        return view('perencanaan/datadukungrenja/create');
    }

    public function store()
    {
        $validationRules = [
            'nama_file' => 'required',
            'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]', // Maksimal 2MB
            'tahun' => 'required',
            'status_file' => 'required',
            'status_tujuan' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/ddperencanaan/create')->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('file');

        // Pindahkan file yang diunggah ke folder yang diinginkan
        $newFileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/ddPerencanaan/', $newFileName);

        // Simpan data ke database
        $this->DDPerencanaanModel->save([
            'nama_file' => $this->request->getPost('nama_file'),
            'file' => $newFileName,
            'tahun' => $this->request->getPost('tahun'),
            'status_file' => $this->request->getPost('status_file'),
            'status_tujuan' => $this->request->getPost('status_tujuan')
        ]);

        return redirect()->to('/ddperencanaanrakor')->with('success', 'Data Dukung berhasil ditambahkan.');
    }
    public function storeRakor()
{
    $validationRules = [
        'nama_file' => 'required',
        'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]', // Maksimal 2MB
        'tahun' => 'required',
        'status_file' => 'required',
        'status_tujuan' => 'required'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/ddperencanaanrakor/create')->withInput()->with('validation', $this->validator);
    }

    $file = $this->request->getFile('file');

    // Pindahkan file yang diunggah ke folder yang diinginkan
    $newFileName = $file->getRandomName();
    $file->move(ROOTPATH . 'public/uploads/ddPerencanaan/', $newFileName);

    // Simpan data ke database
    $this->DDPerencanaanModel->save([
        'nama_file' => $this->request->getPost('nama_file'),
        'file' => $newFileName,
        'tahun' => $this->request->getPost('tahun'),
        'status_file' => $this->request->getPost('status_file'),
        'status_tujuan' => $this->request->getPost('status_tujuan')
    ]);

    // Arahkan ke halaman yang sesuai berdasarkan status_tujuan
    $redirectPath = '/ddperencanaanrakor';

    if ($this->request->getPost('status_tujuan') == 'PERPUSTAKAAN') {
        $redirectPath = '/ddperencanaanrakor'; // Ganti dengan path sesuai halaman perpustakaan
    } elseif ($this->request->getPost('status_tujuan') == 'KEARSIPAN') {
        $redirectPath = '/ddperencanaanrakorarsip'; // Ganti dengan path sesuai halaman kearsipan
    }

    return redirect()->to($redirectPath)->with('success', 'Data Dukung berhasil ditambahkan.');
}

    
    public function storeRenja()
    {
        $validationRules = [
            'nama_file' => 'required',
            'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]', // Maksimal 2MB
            'tahun' => 'required',
            'status_file' => 'required',

        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/ddperencanaanrenja/create')->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('file');

        // Pindahkan file yang diunggah ke folder yang diinginkan
        $newFileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/ddPerencanaan/', $newFileName);

        // Simpan data ke database
        $this->DDPerencanaanModel->save([
            'nama_file' => $this->request->getPost('nama_file'),
            'file' => $newFileName,
            'tahun' => $this->request->getPost('tahun'),
            'status_file' => $this->request->getPost('status_file'),

        ]);

        return redirect()->to('/ddperencanaanrenja')->with('success', 'Data Dukung berhasil ditambahkan.');
    }

    // Tambahkan metode untuk menampilkan pratinjau file PDF dan terapkan mpdf
    public function preview($id)
    {
        $data['dd_detail'] = $this->DDPerencanaanModel->find($id);
        return view('perencanaan/datadukung/preview', $data);
    } 

    public function previewrakor($id)
    {
        $data['dd_detailrakor'] = $this->DDPerencanaanModel->find($id);
        return view('perencanaan/datadukungrakor/preview', $data);
    } 

    public function previewrakorarsip($id)
    {
        $data['dd_detailrakorarsip'] = $this->DDPerencanaanModel->find($id);
        return view('perencanaan/datadukungrakor/previewarsip', $data);
    }    

    public function previewrenja($id)
    {
        $data['dd_detailrenja'] = $this->DDPerencanaanModel->find($id);
        return view('perencanaan/datadukungrenja/preview', $data);
    }   
    
    // public function cetakRenjaView()
    // {
    //     $data['perencanaan'] = $this->DDPerencanaanModel->getPerencanaanRenja();
    //     // dd($data);  

    //     return view('perencanaan/renja/preview', $data);
    // }


    public function download($id)
    {
        $data = $this->DDPerencanaanModel->find($id);
        return $this->response->download(ROOTPATH . 'public/uploads/ddPerencanaan/' . $data['file'], null);
    }

    public function delete($id)
    {
        $data = $this->DDPerencanaanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPerencanaan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPerencanaanModel->delete($id);

        return redirect()->to('/ddperencanaan')->with('success', 'Data Dukung berhasil dihapus.');
    }
    public function deleteRakor($id)
    {
        $data = $this->DDPerencanaanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPerencanaan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPerencanaanModel->delete($id);

        return redirect()->to('/ddperencanaanrakor')->with('success', 'Data Dukung berhasil dihapus.');
    }
    public function deleteRakorarsip($id)
    {
        $data = $this->DDPerencanaanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPerencanaan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPerencanaanModel->delete($id);

        return redirect()->to('/ddperencanaanrakorarsip')->with('success', 'Data Dukung berhasil dihapus.');
    }
    public function deleteRenja($id)
    {
        $data = $this->DDPerencanaanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/ddPerencanaan/' . $data['file']); // Hapus file dari folder uploads
        $this->DDPerencanaanModel->delete($id);

        return redirect()->to('/ddperencanaanrenja')->with('success', 'Data Dukung berhasil dihapus.');
    }

}
