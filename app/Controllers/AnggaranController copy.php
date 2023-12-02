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


    public function previewCetakArsip($id)
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranWithDetail($id);
        // dd($data['anggaran']);
        return view('anggaran/previewCetakArsip', $data);
    }

    public function previewCetakPerpus($id)
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranWithDetail($id);
        return view('anggaran/previewCetakPerpus', $data);
    }

    public function previewCetakSekre($id)
    {
        $data['anggaran'] = $this->anggaranModel->getAnggaranWithDetail($id);
        return view('anggaran/previewCetakPerpus', $data);
    }

    

    public function cetakArsip($id)
    {
        // Mengambil data anggaran dari model
        $data['anggaran'] = $this->anggaranModel->getAnggaranWithDetail($id);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Render view cetak ke dalam PDF
        $html = view('anggaran/cetakArsip', $data);
        $dompdf->loadHtml($html);

        // Mengatur ukuran kertas dan orientasi (opsional)
        $dompdf->setPaper('A4', 'portrait ');

        // Render PDF (menghasilkan file PDF)
        $dompdf->render();

        // Mengirimkan file PDF ke browser
        $dompdf->stream('cetak_arsip.pdf');
    }

    public function cetakPerpus($id)
    {
        // Mengambil data anggaran dari model
        $data['anggaran'] = $this->anggaranModel->getAnggaranWithDetail($id);
        // dd($data['anggaran']);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Render view cetak ke dalam PDF
        $html = view('anggaran/cetakPerpus', $data);
        $dompdf->loadHtml($html);

        // Mengatur ukuran kertas dan orientasi (opsional)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (menghasilkan file PDF)
        $dompdf->render();

        // Mengirimkan file PDF ke browser
        $dompdf->stream('cetak_perpus.pdf');
    }

    public function cetakSekre($id)
    {
        // Mengambil data anggaran dari model
        $data['anggaran'] = $this->anggaranModel->getAnggaranWithDetail($id);
        // dd($data['anggaran']);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Render view cetak ke dalam PDF
        $html = view('anggaran/cetakSekre', $data);
        $dompdf->loadHtml($html);

        // Mengatur ukuran kertas dan orientasi (opsional)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (menghasilkan file PDF)
        $dompdf->render();

        // Mengirimkan file PDF ke browser
        $dompdf->stream('cetak_sekretariat.pdf');
    }

    public function createDetailperpus($id_anggaran)
    {
        // Ambil data anggaran berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $anggaran = $this->anggaranModel->find($id_anggaran);
    
        $data = [
            'title' => 'Tambah Detail Anggaran',
            'anggaran' => $anggaran, // Kirim data anggaran ke view jika diperlukan
        ];
    
        return view('anggaran/createDetailperpus', $data);
    }

    public function createDetail($id_anggaran)
    {
        // Ambil data anggaran berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $anggaran = $this->anggaranModel->find($id_anggaran);
    
        $data = [
            'title' => 'Tambah Detail Anggaran',
            'anggaran' => $anggaran, // Kirim data anggaran ke view jika diperlukan
        ];
    
        return view('anggaran/createDetail', $data);
    }

    public function createDetailsekre($id_anggaran)
    {
        // Ambil data anggaran berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $anggaran = $this->anggaranModel->find($id_anggaran);
    
        $data = [
            'title' => 'Tambah Detail Anggaran',
            'anggaran' => $anggaran, // Kirim data anggaran ke view jika diperlukan
        ];
    
        return view('anggaran/createDetailsekre', $data);
    }
    

    public function storeDetail()
    {
        $detailAnggaranModel = new DetailAnggaranModel();

        $validationRules = [
            'indikator' => 'required',
            'tolok_ukur_kinerja' => 'required',
            'target_kinerja' => 'required',
            'id_anggaran' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }

        $data = [
            'indikator' => $this->request->getPost('indikator'),
            'tolok_ukur_kinerja' => $this->request->getPost('tolok_ukur_kinerja'),
            'target_kinerja' => $this->request->getPost('target_kinerja'),
            'id_anggaran' => $this->request->getPost('id_anggaran'),
        ];

        if ($detailAnggaranModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/anggaran/index/kearsipan');
        } else {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }
    }

    public function storeDetailperpus()
    {
        $detailAnggaranModel = new DetailAnggaranModel();

        $validationRules = [
            'indikator' => 'required',
            'tolok_ukur_kinerja' => 'required',
            'target_kinerja' => 'required',
            'id_anggaran' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }

        $data = [
            'indikator' => $this->request->getPost('indikator'),
            'tolok_ukur_kinerja' => $this->request->getPost('tolok_ukur_kinerja'),
            'target_kinerja' => $this->request->getPost('target_kinerja'),
            'id_anggaran' => $this->request->getPost('id_anggaran'),
        ];

        if ($detailAnggaranModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/anggaran/index/perpustakaan');
        } else {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }
    }

    public function storeDetailsekre()
    {
        $detailAnggaranModel = new DetailAnggaranModel();

        $validationRules = [
            'indikator' => 'required',
            'tolok_ukur_kinerja' => 'required',
            'target_kinerja' => 'required',
            'id_anggaran' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }

        $data = [
            'indikator' => $this->request->getPost('indikator'),
            'tolok_ukur_kinerja' => $this->request->getPost('tolok_ukur_kinerja'),
            'target_kinerja' => $this->request->getPost('target_kinerja'),
            'id_anggaran' => $this->request->getPost('id_anggaran'),
        ];

        if ($detailAnggaranModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/anggaran/index/sekretariat');
        } else {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }
    }

    public function showDetail($id_anggaran)
    {
        $detailModel = new DetailAnggaranModel();
        $detail = $detailModel->where('id_anggaran', $id_anggaran)->findAll();
    
        $data = [
            'title' => 'Detail Anggaran',
            'detail' => $detail,
        ];
    
        return view('anggaran/showDetail', $data);
    }

    public function createPerpustakaan()
    {
        // Mengambil data Urusan untuk digunakan dalam form create
        // $perencanaan = $this->perencanaanModel->findAll();
        $perpustakaan = $this->anggaranModel->getPerencanaanPerpustakaan();
        // $urusan = $this->urusanModel->findAll();

        // dd($perpustakaan);

        $data = [
            'title' => 'Tambah Data Anggaran',
            'validation' => \Config\Services::validation(),
            'perpustakaan' => $perpustakaan,
            // 'urusan' => $urusan,
            
        ];

        return view('anggaran/createPerpustakaan', $data);
    }

    public function createKearsipan()
    {
        // Mengambil data Urusan untuk digunakan dalam form create
        // $perencanaan = $this->perencanaanModel->findAll();
        $perpustakaan = $this->anggaranModel->getPerencanaanKearsipan();
        // $urusan = $this->urusanModel->findAll();
        // dd($perpustakaan);

        $data = [
            'title' => 'Tambah Data Anggaran',
            'validation' => \Config\Services::validation(),
            // 'perencanaan' => $perencanaan,
            'perpustakaan' => $perpustakaan,
            // 'urusan' => $urusan,
            
        ];

        return view('anggaran/createKearsipan', $data);
    }

    public function createSekretariat()
    {
        // Mengambil data Urusan untuk digunakan dalam form create
        $perencanaan = $this->perencanaanModel->findAll();
        $perpustakaan = $this->anggaranModel->getPerencanaanSekretariat();
        $subkegiatan = $this->subkegiatanModel->findAll();
        $satuan = $this->satuanModel->findAll();
        // dd($perpustakaan);

        $data = [
            'title' => 'Tambah Data Anggaran',
            'validation' => \Config\Services::validation(),
            // 'perencanaan' => $perencanaan,
            'perpustakaan' => $perpustakaan,
            'subkegiatan' => $subkegiatan,
            'satuan' => $satuan,
            
        ];

        return view('anggaran/createSekretariat', $data);
    }

    public function storePerpustakaan()
    {

        // membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
            'kelompok_sasaran' => $this->request->getPost('kelompok_sasaran'),
            'jumlah' => $this->request->getPost('jumlah'),
            'target' => $this->request->getPost('target'),
            'id_perencanaan' => $this->request->getPost('id_perencanaan'),

        ];


        // insert ke table
        $simpan = $this->anggaranModel->insert($data);


        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->to('anggaran/create');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/anggaran/index/perpustakaan');
        }
    }

    public function storeKearsipan()
    {

        // membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
            'kelompok_sasaran' => $this->request->getPost('kelompok_sasaran'),
            'jumlah' => $this->request->getPost('jumlah'),
            'target' => $this->request->getPost('target'),
            'id_perencanaan' => $this->request->getPost('id_perencanaan'),

        ];


        // insert ke table
        $simpan = $this->anggaranModel->insert($data);


        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->to('anggaran/createKearsipan');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/anggaran/index/kearsipan');
        }
    }

    public function storeSekretariat()
    {

        // membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
            'kelompok_sasaran' => $this->request->getPost('kelompok_sasaran'),
            'jumlah' => $this->request->getPost('jumlah'),
            'target' => $this->request->getPost('target'),
            'id_perencanaan' => $this->request->getPost('id_perencanaan'),

        ];


        // insert ke table
        $simpan = $this->anggaranModel->insert($data);


        // cek jika proses simpan gagal
        if (!$simpan) {
            // redirect ke halaman create
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->to('anggaran/createSekretariat');
        }
        // jika berhasil
        else {
            // redirect ke halaman index
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/anggaran/index/sekretariat');
        }
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
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
            'kelompok_sasaran' => $this->request->getPost('kelompok_sasaran'),
            'jumlah' => $this->request->getPost('jumlah'),
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
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
            'kelompok_sasaran' => $this->request->getPost('kelompok_sasaran'),
            'jumlah' => $this->request->getPost('jumlah'),
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
            'sumber_pendanaan' => $this->request->getPost('sumber_pendanaan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'waktu_pelaksanaan' => $this->request->getPost('waktu_pelaksanaan'),
            'kelompok_sasaran' => $this->request->getPost('kelompok_sasaran'),
            'jumlah' => $this->request->getPost('jumlah'),
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

    public function getSatuan($subkegiatanID)
    {
        $satuan = $this->anggaranModel->getSatuanbySubkegiatanForDropdown($subkegiatanID);
        return $this->response->setJSON($satuan);
    }
}
