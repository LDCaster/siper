<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenatausahaanModel;
use App\Models\AnggaranModel;
use App\Models\KaryawanModel;
use App\Models\DetailPenatausahaanModel;
use App\Models\DetailTugasPenatausahaanModel;
use App\Models\DetailTugas2PenatausahaanModel;
use App\Models\KinerjaBidangModel;
use App\Models\PohonKinerjaModelModel;
use App\Models\KinerjaBidangModelModel;
use App\Models\PohonKinerjaModel;
use App\Models\SatuanModel;
use App\Models\PenatausahaanAnggaranModel;
use App\Models\PenatausahaanKinerjabidangModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PenatausahaanController extends BaseController
{
    protected $penatausahaanModel;
    protected $detailpenatausahaanModel;
    protected $detailtugaspenatausahaanModel;
    protected $detailtugas2penatausahaanModel;
    protected $pohonModel;
    protected $kinerjaModel;
    protected $karyawanModel;
    protected $anggaranModel;
    protected $satuanModel;
    protected $PenatausahaanAnggaranModel;
    protected $PenatausahaanKinerjabidangModel;

    public function __construct()
    {
        
        $this->penatausahaanModel = new PenatausahaanModel();
        $this->detailpenatausahaanModel = new DetailPenatausahaanModel();
        $this->detailtugaspenatausahaanModel = new DetailTugasPenatausahaanModel();
        $this->detailtugas2penatausahaanModel = new DetailTugas2PenatausahaanModel();
        $this->pohonModel = new PohonKinerjaModel();
        $this->kinerjaModel = new KinerjaBidangModel();
        $this->karyawanModel = new KaryawanModel();
        $this->anggaranModel = new AnggaranModel();
        $this->satuanModel = new SatuanModel();
        $this->PenatausahaanAnggaranModel = new PenatausahaanAnggaranModel();
        $this->PenatausahaanKinerjabidangModel = new PenatausahaanKinerjabidangModel();
    }

    public function index()
    {
        $penatausahaans = $this->penatausahaanModel->getPenatausahaan2();
        // dd($penatausahaans);

        $data = [
            'title' => 'penatausahaans',
            'penatausahaans' => $penatausahaans,
        ];

        return view('penatausahaan/index', $data);
    }
    

    public function create()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $karyawans = $this->karyawanModel->findAll();
        // $pohons = $this->pohonModel->findAll();
        // $kinerjas = $this->kinerjaModel->getKinerjaBidang();
        // $anggarans = $this->anggaranModel->getAnggaranPerpustakaan();

        return view('penatausahaan/create', ['karyawans' => $karyawans]);
    }

    public function store()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'status' => 'required',
            'tanggal' => 'required',
            'karyawan_1' => 'required',
            'karyawan_2' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'status' => $this->request->getPost('status'),
                'tanggal' => $this->request->getPost('tanggal'),
                'karyawan_1' => $this->request->getPost('karyawan_1'),
                'karyawan_2' => $this->request->getPost('karyawan_2'),
            ];

            $this->penatausahaanModel->insert($data);

            return redirect()->to('/penatausahaan');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('penatausahaan/create', [
                'karyawans' => $this->karyawanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $penatausahaan = $this->penatausahaanModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        $karyawans = $this->karyawanModel->findAll();
        // $anggarans = $this->anggaranModel->findAll();
        // $pohons = $this->pohonModel->findAll();
        // $kinerjas = $this->kinerjaModel->findAll();

        return view('penatausahaan/edit', ['penatausahaan' => $penatausahaan, 'karyawans' => $karyawans]);
    }

    public function update($id)
    {
        // Validasi dan pembaruan data Indikator Kinerja Urusan berdasarkan ID
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk memperbarui data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'status' => 'required',
            'tanggal' => 'required',
            'karyawan_1' => 'required',
            'karyawan_2' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                'status' => $this->request->getPost('status'),
                'tanggal' => $this->request->getPost('tanggal'),
                'karyawan_1' => $this->request->getPost('karyawan_1'),
                'karyawan_2' => $this->request->getPost('karyawan_2'),
            ];

            $this->penatausahaanModel->update($id, $data);

            return redirect()->to('/penatausahaan');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('penatausahaan/edit', [
                'penatausahaan' => $this->penatausahaanModel->find($id),
                'karyawans' => $this->karyawanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function destroy($id)
    {
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->penatausahaanModel->delete($id);

        return redirect()->to('/penatausahaan');
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Hagan Detail Penatausahaan
    public function createDetail($id_penatausahaan)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $penatausahaan = $this->penatausahaanModel->find($id_penatausahaan);
        $karyawans = $this->karyawanModel->findAll();
    
        $data = [
            'title' => 'Tambah Detail penatausahaan',
            'penatausahaan' => $penatausahaan, // Kirim data penatausahaan ke view jika diperlukan
            'karyawans' => $karyawans, // Kirim data penatausahaan_arsip ke view jika diperlukan
        ];
    
        return view('penatausahaan/createDetail', $data);

       
    }
    
    public function storeDetail()
    {
        $detailpenatausahaanModel = new DetailPenatausahaanModel();
        $validationRules = [
            'karyawan' => 'required',
            'id_penatausahaan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }

        $data = [
            'karyawan' => $this->request->getPost('karyawan'),
            'id_penatausahaan' => $this->request->getPost('id_penatausahaan'),
        ];

        if ($detailpenatausahaanModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/penatausahaan/showDetail/'. $data['id_penatausahaan']);
        } else {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }
    }

    public function showDetail($id_penatausahaan)
    {
        $detailModel = new DetailPenatausahaanModel();
        $detail = $detailModel->where('id_penatausahaan', $id_penatausahaan)->findAll();
    
        $data = [
            'title' => 'Detail Penatausahaan',
            'detail' => $detail,
            'id_penatausahaan' => $id_penatausahaan
        ];
        
        return view('penatausahaan/showDetail', $data);
    }


// Hagan Detail Tugas Tambahan Penatausahaan
    public function createDetailTugas($id_anggota)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $detail_penatausahaan = $this->detailpenatausahaanModel->find($id_anggota);
        $penatausahaans = $this->penatausahaanModel->findAll();
        $pohon = $this->pohonModel->findAll();
        $kinerja = $this->kinerjaModel->findAll();
        $satuans = $this->satuanModel->getSatuan();

    
        $data = [
            'title' => 'Tambah Detail Tugas penatausahaan arsip',
            'detail_penatausahaan' => $detail_penatausahaan, // Kirim data penatausahaan ke view jika diperlukan
            'penatausahaans' => $penatausahaans, // Kirim data penatausahaan ke view jika diperlukan
            'pohon' => $pohon, // Kirim data pohon ke view jika diperlukan
            'kinerja' => $kinerja, // Kirim data penatausahaan ke view jika diperlukan
            'satuans' => $satuans, // Kirim data penatausahaan ke view jika diperlukan
        ];
    
        return view('penatausahaan/createDetailTugas', $data);

       
    }
    
    public function storeDetailTugas()
    {
        $detailtugaspenatausahaanModel = new DetailTugasPenatausahaanModel();
        $id = $this->request->getPost('id_anggota');

        $validationRules = [
            'id_penatausahaan' => 'required',
            'id_anggota' => 'required',
            'id_pohon' => 'required',
            'id_kinerja_bidang' => 'required',
            'id_satuan' => 'required',
            'target' => 'required',

        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_penatausahaan' => $this->request->getPost('id_penatausahaan'),
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_pohon' => $this->request->getPost('id_pohon'),
            'id_kinerja_bidang' => $this->request->getPost('id_kinerja_bidang'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'target' => $this->request->getPost('target'),
        ];

        if ($detailtugaspenatausahaanModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            // return redirect()->to('/penatausahaan_arsip/showDetailTugas');
            // return redirect()->to('/penatausahaan');
            return redirect()->to('/penatausahaan/showDetailTugas/'.$id);


        } else {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }
    }

    public function showDetailTugas($id_anggota)
    {
        $detailtugasModel = new DetailTugasPenatausahaanModel();
        $detailtugas = $detailtugasModel->where('id_anggota', $id_anggota)->getPenatausahaanWithDetailTugas($id_anggota);
        //DISINI TERJADI MASALAH JIKA MEMAKAI FIND ALL MAKA DATA AKAN MUNCUL SESUAI ID TAPI DATA YANG MERUPAKAN TARIKAN TIDAK DAPAT TERTARIK
    
        $data = [
            'title' => 'Detail Penatausahaan',
            'detailtugas' => $detailtugas,
        ];
    
        return view('penatausahaan/showDetailTugas', $data);
    }



// Hagan Detail Tugas Utama Penatausahaan
    public function createDetailTugas2($id_anggota)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $detail_penatausahaan = $this->detailpenatausahaanModel->find($id_anggota);
        $satuans = $this->satuanModel->getSatuan();
        $penatausahaans = $this->penatausahaanModel->findAll();
    
        $data = [
            'title' => 'Tambah Detail Tugas penatausahaan',
            'detail_penatausahaan' => $detail_penatausahaan, // Kirim data penatausahaan ke view jika diperlukan
            'penatausahaans' => $penatausahaans, // Kirim data penatausahaan_arsip ke view jika diperlukan
            'satuans' => $satuans, // Kirim data penatausahaan_arsip ke view jika diperlukan
           
        ];
    
        return view('penatausahaan/createDetailTugas2', $data);

       
    }
    
    public function storeDetailTugas2()
{
    $detailtugas2penatausahaanModel = new DetailTugas2PenatausahaanModel();
    $id = $this->request->getPost('id_anggota');
    // $id = $this->request->getVar('id_anggota');
    // dd($id);
    $validationRules = [
        'id_penatausahaan' => 'required',
        'id_anggota' => 'required',
        'id_satuan' => 'required',
        'kinerja_utama' => 'required',
        'indikator' => 'required',
        'target' => 'required',
    ];

    if (!$this->validate($validationRules)) {
        session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
        return redirect()->back()->withInput();
    }

    $data = [
        'id_penatausahaan' => $this->request->getPost('id_penatausahaan'),
        'id_anggota' => $this->request->getPost('id_anggota'),
        'id_satuan' => $this->request->getPost('id_satuan'),
        'kinerja_utama' => $this->request->getPost('kinerja_utama'),
        'indikator' => $this->request->getPost('indikator'),
        'target' => $this->request->getPost('target'),
    ];

    if ($detailtugas2penatausahaanModel->insert($data)) {
        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
        return redirect()->to('/penatausahaan/showDetailTugas2/'.$id);
        // return redirect()->to('/penatausahaan');
         

    } else {
        session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
        return redirect()->back()->withInput();
    }
}


    public function showDetailTugas2($id_anggota)
    {
        $detailtugas2Model = new DetailTugas2PenatausahaanModel();
        $detailtugas2 = $detailtugas2Model->where('id_anggota', $id_anggota)->findAll();
    
        $data = [
            'title' => 'Detail Penatausahaan',
            'detailtugas2' => $detailtugas2,
        ];
    
        return view('penatausahaan/showDetailTugas2', $data);
    }

    //////////////////////////////////////////////// ini untuk fitur penambahan data anggaran penatausahaan
    public function createAnggaran($id_penatausahaan)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $penatausahaan = $this->penatausahaanModel->find($id_penatausahaan);
        $anggarans = $this->anggaranModel->getAnggaran();
    
        $data = [
            'title' => 'Tambah Detail penatausahaan',
            'penatausahaan' => $penatausahaan, // Kirim data penatausahaan ke view jika diperlukan
            'anggarans' => $anggarans, // Kirim data penatausahaan_arsip ke view jika diperlukan
        ];
    
        return view('penatausahaan/createanggaran', $data);
    }
    
    public function storeAnggaran()
    {
        $PenatausahaanAnggaranModel = new PenatausahaanAnggaranModel();

        $validationRules = [
            'id_anggaran' => 'required',
            'id_penatausahaan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_anggaran' => $this->request->getPost('id_anggaran'),
            'id_penatausahaan' => $this->request->getPost('id_penatausahaan'),
        ];

        if ($PenatausahaanAnggaranModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/penatausahaan');
        } else {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }
    }

    public function showAnggaran($id_penatausahaan)
    {
        $detailModel = new PenatausahaanAnggaranModel();
        $detail = $detailModel->where('id_penatausahaan', $id_penatausahaan)->getPenatausahaanAnggaran($id_penatausahaan);
    
        $data = [
            'title' => 'Detail Penatausahaan',
            'detail' => $detail,
        ];
    
        return view('penatausahaan/showAnggaran', $data);
    }

    ///////////////////////////////////////////// ini untuk fitur penambahan data kinerja bidang penatausahaan
    public function createKinerjabidang($id_penatausahaan)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $penatausahaan = $this->penatausahaanModel->find($id_penatausahaan);
        $kinerjas = $this->kinerjaModel->getKinerjaBidang();
        $satuans = $this->satuanModel->getSatuan();
    
        $data = [
            'title' => 'Tambah Detail penatausahaan',
            'penatausahaan' => $penatausahaan, // Kirim data penatausahaan ke view jika diperlukan
            'kinerjas' => $kinerjas, // Kirim data penatausahaan_arsip ke view jika diperlukan
            'satuans' => $satuans, // Kirim data penatausahaan_arsip ke view jika diperlukan
        ];
    
        return view('penatausahaan/createKinerjabidang', $data);
    }
    
    public function storeKinerjabidang()
    {
        $PenatausahaanKinerjabidangModel = new PenatausahaanKinerjabidangModel();

        $validationRules = [
            'id_kinerja_bidang' => 'required',
            'id_penatausahaan' => 'required',
            'target' => 'required',
            'id_satuan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }

        $data = [
            'id_kinerja_bidang' => $this->request->getPost('id_kinerja_bidang'),
            'id_penatausahaan' => $this->request->getPost('id_penatausahaan'),
            'target' => $this->request->getPost('target'),
            'id_satuan' => $this->request->getPost('id_satuan'),
        ];

        if ($PenatausahaanKinerjabidangModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/penatausahaan');
        } else {
            session()->setFlashdata('pesan', 'Data Gagal ditambahkan!');
            return redirect()->back()->withInput();
        }
    }

    public function showKinerjabidang($id_penatausahaan)
    {
        $detailModel = new PenatausahaanKinerjabidangModel();
        $detail = $detailModel->where('id_penatausahaan', $id_penatausahaan)->getPenatausahaanKinerja($id_penatausahaan);
    
        $data = [
            'title' => 'Detail Penatausahaan',
            'detail' => $detail,
        ];
    
        return view('penatausahaan/showKinerjabidang', $data);
    }


    /////////////////////////////////////////CETAK////////////////////

    public function previewCetak($id)
    {
        $data['penatausahaan'] = $this->penatausahaanModel->getPenatausahaanDetail($id);
        // dd($data['penatausahaan']);
        return view('penatausahaan/previewCetak', $data);
    }

    public function cetak($id)
    {
        // Mengambil data anggaran dari model
        $data['penatausahaan'] = $this->penatausahaanModel->getPenatausahaanDetail($id);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Render view cetak ke dalam PDF
        $html = view('penatausahaan/cetak', $data);
        $dompdf->loadHtml($html);

        // Mengatur ukuran kertas dan orientasi (opsional)
        $dompdf->setPaper('A4', 'portrait ');

        // Render PDF (menghasilkan file PDF)
        $dompdf->render();

        // Mengirimkan file PDF ke browser
        $dompdf->stream('cetak.pdf');
    }

    public function destroydetail($id)
    {
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->detailpenatausahaanModel->delete($id);

        return redirect()->to('penatausahaan/showDetailTugas');
    }
    
    public function destroydetailtugas($id)
    {
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        // $detailtugasModel = new DetailTugasPenatausahaanModel();

        $this->detailtugaspenatausahaanModel->delete($id);


        return redirect()->to('/penatausahaan');
    }

    public function destroydetailtugas2($id)
    {
        // $id_p = $this->request->getVar('id_anggota');
        // dd($id_p);
        // Var_dump($id_p);die;
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->detailtugas2penatausahaanModel->delete($id);

        return redirect()->to('/penatausahaan');
        // return redirect()->to('/penatausahaan/showDetailTugas2/'.$id_p);
    }
}


