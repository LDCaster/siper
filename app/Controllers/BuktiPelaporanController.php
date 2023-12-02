<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BuktiPelaporanModel;
use App\Models\AnggaranModel;
use App\Models\PerencanaanModel;
use CodeIgniter\HTTP\Files\UploadedFile;


class BuktiPelaporanController extends BaseController
{
    protected $BuktiPelaporanModel;
    protected $AnggaranModel;
    protected $PerencanaanModel;

    public function __construct()
    {
        $this->BuktiPelaporanModel = new BuktiPelaporanModel();
        $this->AnggaranModel = new AnggaranModel();
        $this->PerencanaanModel = new PerencanaanModel();
    }

    public function index()
    {
        $data['buktipelaporan'] = $this->BuktiPelaporanModel->getBukti();
        return view('buktipelaporan/index', $data);
    }
    public function indexsekre()
    {
        $data['buktipelaporan'] = $this->BuktiPelaporanModel->getBuktiPersetujuan();
        return view('buktipelaporan/indexsekre', $data);
    }
    public function indexperpus()
    {
        $data['bp_perpus'] = $this->BuktiPelaporanModel->getBuktiPerpus();
        return view('buktipelaporan/indexperpus', $data);
    }
    public function indexarsip()
    {
        $data['bp_arsip'] = $this->BuktiPelaporanModel->getBuktiArsip();
        return view('buktipelaporan/indexarsip', $data);
    }

    // public function create()
    // {
    //     $anggarans = $this->AnggaranModel->findAll();

    //     return view('buktipelaporan/create');
    // }

    public function update_status($id, $status)
    {
        // Lakukan logika untuk mengubah data status_verifikasi sesuai dengan $status dan $id
        $model = new BuktiPelaporanModel(); // Gantilah YourModel dengan nama model yang sesuai
        $model->updateStatus($id, $status);

        $response['status'] = $status;
        return $this->response->setJSON($response);
    }

    public function create()
    {
        
        $anggarans = $this->AnggaranModel->findAll();

        return view('buktipelaporan/create', ['anggarans' => $anggarans]);
    }
    public function createarsip()
    {
        
        $anggarans = $this->AnggaranModel->getAnggaranKearsipan();

        return view('buktipelaporan/createarsip', ['anggarans' => $anggarans]);
    }
    public function createperpus()
    {
        
        $anggarans = $this->AnggaranModel->getAnggaranPerpustakaan();

        return view('buktipelaporan/createperpus', ['anggarans' => $anggarans]);
    }

    public function store()
    {
        $validationRules = [
            'id_anggaran' => 'required',
            'nama_file' => 'required',
            'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]', // Maksimal 2MB
            'tahun' => 'required',
            'status_verifikasi' => 'required',
            'status_data' => 'required',
            'status_persetujuan' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/buktipelaporan/create')->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('file');

        // Pindahkan file yang diunggah ke folder yang diinginkan
        $newFileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/buktiPelaporan/', $newFileName);

        // Simpan data ke database
        
        $this->BuktiPelaporanModel->save([
            'id_anggaran' => $this->request->getPost('id_anggaran'),
            'nama_file' => $this->request->getPost('nama_file'),
            'file' => $newFileName,
            'tahun' => $this->request->getPost('tahun'),
            'status_data' => $this->request->getPost('status_data'),
            'status_verifikasi' => $this->request->getPost('status_verifikasi'),
            'status_persetujuan' => $this->request->getPost('status_persetujuan')
        ]);

        return redirect()->to('/buktipelaporan')->with('success', 'Data Dukung berhasil ditambahkan.');
    }

    //punya perpus
    public function storeperpus()
    {
        $validationRules = [
            'id_anggaran' => 'required',
            'nama_file' => 'required',
            'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]', // Maksimal 2MB
            'tahun' => 'required',
            'status_verifikasi' => 'required',
            'status_data' => 'required',
            'status_persetujuan' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/buktipelaporan/createperpus')->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('file');

        // Pindahkan file yang diunggah ke folder yang diinginkan
        $newFileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/buktiPelaporan/', $newFileName);

        // Simpan data ke database
        
        $this->BuktiPelaporanModel->save([
            'id_anggaran' => $this->request->getPost('id_anggaran'),
            'nama_file' => $this->request->getPost('nama_file'),
            'file' => $newFileName,
            'tahun' => $this->request->getPost('tahun'),
            'status_data' => $this->request->getPost('status_data'),
            'status_verifikasi' => $this->request->getPost('status_verifikasi'),
            'status_persetujuan' => $this->request->getPost('status_persetujuan')
        ]);

        return redirect()->to('/buktipelaporanperpus')->with('success', 'Data Dukung berhasil ditambahkan.');
    }
    ///Punya Arsip
    public function storearsip()
    {
        $validationRules = [
            'id_anggaran' => 'required',
            'nama_file' => 'required',
            'file' => 'uploaded[file]|ext_in[file,pdf]|max_size[file,2048]', // Maksimal 2MB
            'tahun' => 'required',
            'status_verifikasi' => 'required',
            'status_data' => 'required',
            'status_persetujuan' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/buktipelaporan/createarsip')->withInput()->with('validation', $this->validator);
        }

        $file = $this->request->getFile('file');

        // Pindahkan file yang diunggah ke folder yang diinginkan
        $newFileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/buktiPelaporan/', $newFileName);

        // Simpan data ke database
        
        $this->BuktiPelaporanModel->save([
            'id_anggaran' => $this->request->getPost('id_anggaran'),
            'nama_file' => $this->request->getPost('nama_file'),
            'file' => $newFileName,
            'tahun' => $this->request->getPost('tahun'),
            'status_data' => $this->request->getPost('status_data'),
            'status_verifikasi' => $this->request->getPost('status_verifikasi'),
            'status_persetujuan' => $this->request->getPost('status_persetujuan')
        ]);

        return redirect()->to('/buktipelaporanarsip')->with('success', 'Data Dukung berhasil ditambahkan.');
    }

    // Tambahkan metode untuk menampilkan pratinjau file PDF dan terapkan mpdf
    public function preview($id)
    {
        $data['dd_detail'] = $this->BuktiPelaporanModel->find($id);
        return view('buktipelaporan/preview', $data);
    }    
    public function previewarsip($id)
    {
        $data['dd_detail'] = $this->BuktiPelaporanModel->find($id);
        return view('buktipelaporan/previewarsip', $data);
    }    
    public function previewperpus($id)
    {
        $data['dd_detail'] = $this->BuktiPelaporanModel->find($id);
        return view('buktipelaporan/previewperpus', $data);
    }    
    public function previewsekre($id)
    {
        $data['dd_detail'] = $this->BuktiPelaporanModel->find($id);
        return view('buktipelaporan/previewsekre', $data);
    }    

    public function download($id)
    {
        $data = $this->BuktiPelaporanModel->find($id);
        return $this->response->download(ROOTPATH . 'public/uploads/buktiPelaporan/' . $data['file'], null);
    }

    public function destroy($id)
    {
        $data = $this->BuktiPelaporanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/buktiPelaporan/' . $data['file']); // Hapus file dari folder uploads
        $this->BuktiPelaporanModel->delete($id);

        return redirect()->to('/buktipelaporan')->with('success', 'Data Dukung berhasil dihapus.');
    }
    public function destroyperpus($id)
    {
        $data = $this->BuktiPelaporanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/buktiPelaporan/' . $data['file']); // Hapus file dari folder uploads
        $this->BuktiPelaporanModel->delete($id);

        return redirect()->to('/buktipelaporanperpus')->with('success', 'Data Dukung berhasil dihapus.');
    }
    public function destroyarsip($id)
    {
        $data = $this->BuktiPelaporanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/buktiPelaporan/' . $data['file']); // Hapus file dari folder uploads
        $this->BuktiPelaporanModel->delete($id);

        return redirect()->to('/buktipelaporanarsip')->with('success', 'Data Dukung berhasil dihapus.');
    }

    public function destroysekre($id)
    {
        $data = $this->BuktiPelaporanModel->find($id);
        unlink(ROOTPATH . 'public/uploads/buktiPelaporan/' . $data['file']); // Hapus file dari folder uploads
        $this->BuktiPelaporanModel->delete($id);

        return redirect()->to('/buktipelaporansekre')->with('success', 'Data Dukung berhasil dihapus.');
    }

    public function update($id)
    {
        $BuktiPelaporanModel = new BuktiPelaporanModel();
        $data = [
            'status_verifikasi' => $this->request->getPost('status_verifikasi'),
            
        ];
        $BuktiPelaporanModel->update($id, $data);

        return redirect()->to('/buktipelaporan');
    }

    public function terima($id)
    {
        // Lakukan logika untuk mengubah status_verifikasi menjadi 'DITERIMA' berdasarkan $id
        // Misalnya, Anda dapat menggunakan model untuk mengupdate data
        $model = new BuktiPelaporanModel(); // Gantilah dengan nama model yang sesuai
        $model->updateStatusVerifikasi($id, 'DITERIMA');

        // Response JSON jika perlu
        // return $this->response->setJSON(['status' => 'success']);
        return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('/buktipelaporan')]);

    }
    public function tolak($id)
    {
        // Lakukan logika untuk mengubah status_verifikasi menjadi 'DITERIMA' berdasarkan $id
        // Misalnya, Anda dapat menggunakan model untuk mengupdate data
        $model = new BuktiPelaporanModel(); // Gantilah dengan nama model yang sesuai
        $model->updateStatusVerifikasi($id, 'DITOLAK');

        // Response JSON jika perlu
        return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('/buktipelaporan')]);
    }

    public function setuju($id)
    {
        // Lakukan logika untuk mengubah status_verifikasi menjadi 'DITERIMA' berdasarkan $id
        // Misalnya, Anda dapat menggunakan model untuk mengupdate data
        $model = new BuktiPelaporanModel(); // Gantilah dengan nama model yang sesuai
        $model->updateStatusPersetujuan($id, 'DISETUJUI');

        // Response JSON jika perlu
        // return $this->response->setJSON(['status' => 'success']);
        return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('/buktipelaporansekre')]);

    }
    public function batal($id)
    {
        // Lakukan logika untuk mengubah status_Persetujuan menjadi 'DITERIMA' berdasarkan $id
        // Misalnya, Anda dapat menggunakan model untuk mengupdate data
        $model = new BuktiPelaporanModel(); // Gantilah dengan nama model yang sesuai
        $model->updateStatusPersetujuan($id, 'DITOLAK');

        // Response JSON jika perlu
        return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('/buktipelaporansekre')]);
    }
}
