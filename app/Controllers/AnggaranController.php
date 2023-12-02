<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggaranModel;
use App\Models\PerencanaanModel;
use App\Models\UrusanModel;
use App\Models\SubkegiatanModel;
use App\Models\SatuanModel;
use App\Models\DetailAnggaranModel;

use Dompdf\Dompdf;
use Dompdf\Options;


class AnggaranController extends BaseController
{
    protected $anggaranModel;
    protected $perencanaanModel;
    protected $urusanModel;
    protected $subkegiatanModel;
    protected $satuanModel;
    protected $detailAnggaranModel;

    public function __construct()
    {
        $this->anggaranModel = new AnggaranModel();
        $this->perencanaanModel = new PerencanaanModel();
        $this->urusanModel = new UrusanModel();
        $this->subkegiatanModel = new SubkegiatanModel();
        $this->satuanModel = new SatuanModel();
        $this->detailAnggaranModel = new DetailAnggaranModel();
    }

    public function indexPerpustakaan()
    {
        $anggaran = $this->anggaranModel->getAnggaranPerpustakaan();
        // dd($anggaran);

        $data = [
            'title' => 'Anggaran',
            'anggaran' => $anggaran,
        ];

        return view('anggaran/indexPerpustakaan', $data);
    }

    public function indexKearsipan()
    {
        $anggaran = $this->anggaranModel->getAnggaranKearsipan();
        // dd($anggaran);

        $data = [
            'title' => 'Anggaran',
            'anggaran' => $anggaran,
        ];

        return view('anggaran/indexKearsipan', $data);
    }

    public function indexSekretariat()
    {
        $anggaran = $this->anggaranModel->getAnggaranSekretariat();
        // dd($anggaran);

        $data = [
            'title' => 'Anggaran',
            'anggaran' => $anggaran,
        ];

        return view('anggaran/indexSekretariat', $data);
    }


    public function previewCetakArsip()
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranKearsipan();
        // dd($data['anggaran']);
        return view('anggaran/previewCetakArsip', $data);
    }

    public function previewCetakPerpus()
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranPerpustakaan();
        return view('anggaran/previewCetakPerpus', $data);
    }

    public function previewCetakSekre()
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranSekretariat();
        return view('anggaran/previewCetakPerpus', $data);
    }

    public function cetakArsip()
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranKearsipan();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('anggaran/cetakArsip', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('DPA Kearsipan.pdf');
    }

    public function cetakPerpus()
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranPerpustakaan();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('anggaran/cetakPerpus', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('DPA Perpustakaan.pdf');
    }

    public function cetakSekre()
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranSekretariat();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('anggaran/cetakSekre', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('DPA Sekretariat.pdf');
    }
  
    
    public function editPerpustakaan($id)
    {
        // Mengambil data Anggaran berdasarkan ID
        $anggaran = $this->anggaranModel->find($id);
        $perencanaan = $this->perencanaanModel->find($id);
        $perpustakaan = $this->anggaranModel->getPerencanaanPerpustakaan();
        

        $data = [
            'title' => 'Edit Data Anggaran',
            'validation' => \Config\Services::validation(),
            'perpustakaan' => $perpustakaan,
            'perencanaan' => $perencanaan,
            'anggaran' => $anggaran,

        ];

        return view('anggaran/editPerpustakaan', $data);
    }

    public function editKearsipan($id)
    {
        // Mengambil data Anggaran berdasarkan ID
        $anggaran = $this->anggaranModel->find($id);
        $perencanaan = $this->perencanaanModel->find($id);
        $perpustakaan = $this->anggaranModel->getPerencanaanKearsipan();

        $data = [
            'title' => 'Edit Data Anggaran',
            'validation' => \Config\Services::validation(),
            'perpustakaan' => $perpustakaan,
            'perencanaan' => $perencanaan,
            'anggaran' => $anggaran,

        ];

        return view('anggaran/editKearsipan', $data);
    }
    public function editSekretariat($id)
    {
        // Mengambil data Anggaran berdasarkan ID
        $anggaran = $this->anggaranModel->find($id);
        $perencanaan = $this->perencanaanModel->find($id);
        $perpustakaan = $this->anggaranModel->getPerencanaanKearsipan();

        $data = [
            'title' => 'Edit Data Anggaran',
            'validation' => \Config\Services::validation(),
            'perpustakaan' => $perpustakaan,
            'perencanaan' => $perencanaan,
            'anggaran' => $anggaran,

        ];

        return view('anggaran/editSekretariat', $data);
    }

    public function updatePerpustakaan($id)
    {
        
        $simpan = $this->anggaranModel->update($id, [
            
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
        ]);
        
        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            
            session()->setFlashdata('pesan', 'Data Gagal diubah!');
            return redirect()->to('/anggaran/edit/perpustakaan/' . $id);
        }
        // jika berhasil
        else {
            
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil diubah!');
            return redirect()->to('/anggaran/index/perpustakaan');
        }
    }

    public function updateKearsipan($id)
    {
        
        $simpan = $this->anggaranModel->update($id, [
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
        ]);
        
        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            
            session()->setFlashdata('pesan', 'Data Gagal diubah!');
            return redirect()->to('/anggaran/edit/kearsipan/' . $id);
        }
        // jika berhasil
        else {
            
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil diubah!');
            return redirect()->to('/anggaran/index/kearsipan');
        }
    }
    public function updateSekretariat($id)
    {
        
        $simpan = $this->anggaranModel->update($id, [
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
        ]);
        
        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            
            session()->setFlashdata('pesan', 'Data Gagal diubah!');
            return redirect()->to('/anggaran/edit/sekretariat/' . $id);
        }
        // jika berhasil
        else {
            
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil diubah!');
            return redirect()->to('/anggaran/index/sekretariat');
        }
    }

    public function destroyPerpustakaan($id)
    {
        // Menghapus data anggaran berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $simpan = $this->anggaranModel->delete($id);

        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal dihapus!');
            return redirect()->to('/anggaran/index/perpustakaan');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil dihapus!');
            return redirect()->to('/anggaran/index/perpustakaan');
        }
    }

    public function destroyKearsipan($id)
    {
        // Menghapus data anggaran berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $simpan = $this->anggaranModel->delete($id);

        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal dihapus!');
            return redirect()->to('/anggaran/index/kearsipan');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil dihapus!');
            return redirect()->to('/anggaran/index/kearsipan');
        }
    }

    public function destroySekretariat($id)
    {
        // Menghapus data anggaran berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $simpan = $this->anggaranModel->delete($id);

        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal dihapus!');
            return redirect()->to('/anggaran/index/sekretariat');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil dihapus!');
            return redirect()->to('/anggaran/index/sekretariat');
        }
    }

}
