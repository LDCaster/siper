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
use Dompdf\Dompdf;
use Dompdf\Options;


class PenatausahaanArsipController extends BaseController
{
    protected $penatausahaanModel;
    protected $detailpenatausahaanModel;
    protected $detailtugaspenatausahaanModel;
    protected $detailtugas2penatausahaanModel;
    protected $pohonModel;
    protected $kinerjaModel;
    protected $karyawanModel;
    protected $anggaranModel;

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
    }

    public function index()
    {
        $penatausahaan_arsips = $this->penatausahaanModel->getPenatausahaan2();
        // dd($penatausahaan_arsips);

        $data = [
            'title' => 'penatausahaan_arsips',
            'penatausahaan_arsips' => $penatausahaan_arsips,
        ];

        return view('penatausahaan_arsip/index', $data);
    }
    

    public function create()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $karyawans = $this->karyawanModel->findAll();
        $anggarans = $this->anggaranModel->getAnggaranPerpustakaan();
        $pohons = $this->pohonModel->findAll();
        $kinerjas = $this->kinerjaModel->findAll();

        return view('penatausahaan_arsip/create', ['karyawans' => $karyawans, 'anggarans' => $anggarans,'pohons' => $pohons,'kinerjas' => $kinerjas]);
    }

    public function store()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'status' => 'required',
            'tanggal' => 'required',
            'karyawan_1' => 'required',
            'karyawan_2' => 'required',
            'id_kinerja_utama' => 'required',
            'target' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'status' => $this->request->getPost('status'),
                'tanggal' => $this->request->getPost('tanggal'),
                'karyawan_1' => $this->request->getPost('karyawan_1'),
                'karyawan_2' => $this->request->getPost('karyawan_2'),
                'id_kinerja_utama' => $this->request->getPost('id_kinerja_utama'),
                'target' => $this->request->getPost('target'),
            ];

            $this->penatausahaanModel->insert($data);

            return redirect()->to('/penatausahaan_arsip');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('penatausahaan_arsip/create', [
                'karyawans' => $this->karyawanModel->findAll(),
                'anggarans' => $this->anggaranModel->findAll(),
                'pohons' => $this->pohonModel->findAll(),
                'kinerjas' => $this->kinerjaModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $penatausahaan_arsip = $this->penatausahaanModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        $karyawans = $this->karyawanModel->findAll();
        $anggarans = $this->anggaranModel->findAll();
        $pohons = $this->pohonModel->findAll();
        $kinerjas = $this->kinerjaModel->findAll();

        return view('penatausahaan_arsip/edit', ['penatausahaan_arsip' => $penatausahaan_arsip, 'karyawans' => $karyawans, 'anggarans' => $anggarans, 'pohons' => $pohons, 'kinerja' => $anggarans]);
    }

    public function update($id)
    {
        // Validasi dan pembaruan data Indikator Kinerja Urusan berdasarkan ID
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk memperbarui data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'status' => 'required',
            'tanggal' => 'required',
            'karyawan_1' => 'required',
            'karyawan_2' => 'required',
            'id_kinerja_utama' => 'required',
            'target' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'status' => $this->request->getPost('status'),
                'tanggal' => $this->request->getPost('tanggal'),
                'karyawan_1' => $this->request->getPost('karyawan_1'),
                'karyawan_2' => $this->request->getPost('karyawan_2'),
                'id_kinerja_utama' => $this->request->getPost('id_kinerja_utama'),
                'target' => $this->request->getPost('target'),
            ];

            $this->penatausahaanModel->update($id, $data);

            return redirect()->to('/penatausahaan_arsip');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('penatausahaan_arsip/edit', [
                'penatausahaan_arsip' => $this->penatausahaanModel->find($id),
                'karyawans' => $this->karyawanModel->findAll(),
                'anggarans' => $this->anggaranModel->findAll(),
                'pohons' => $this->pohonModel->findAll(),
                'kinerjas' => $this->kinerjaModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function destroy($id)
    {
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->penatausahaanModel->delete($id);

        return redirect()->to('/penatausahaan_arsip');
    }

// Hagan Detail Penatausahaan
    public function createDetail($id_penatausahaan)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $penatausahaan_arsip = $this->penatausahaanModel->find($id_penatausahaan);
        $karyawans = $this->karyawanModel->findAll();
    
        $data = [
            'title' => 'Tambah Detail penatausahaan arsip',
            'penatausahaan_arsip' => $penatausahaan_arsip, // Kirim data penatausahaan_arsip ke view jika diperlukan
            'karyawans' => $karyawans, // Kirim data penatausahaan_arsip ke view jika diperlukan
        ];
    
        return view('penatausahaan_arsip/createDetail', $data);
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
            return redirect()->to('/penatausahaan_arsip');
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
        ];
    
        return view('penatausahaan_arsip/showDetail', $data);
    }


// Hagan Detail Tugas Tambahan Penatausahaan
    public function createDetailTugas($id_anggota)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $detail_penatausahaan_arsip = $this->detailpenatausahaanModel->find($id_anggota);
        $penatausahaans = $this->penatausahaanModel->findAll();
        $pohon = $this->pohonModel->findAll();
        $kinerja = $this->kinerjaModel->findAll();
    
        $data = [
            'title' => 'Tambah Detail Tugas penatausahaan arsip',
            'detail_penatausahaan_arsip' => $detail_penatausahaan_arsip, // Kirim data penatausahaan_arsip ke view jika diperlukan
            'penatausahaans' => $penatausahaans, // Kirim data penatausahaan_arsip ke view jika diperlukan
            'pohon' => $pohon, // Kirim data pohon_arsip ke view jika diperlukan
            'kinerja' => $kinerja, // Kirim data penatausahaan_arsip ke view jika diperlukan
        ];
    
        return view('penatausahaan_arsip/createDetailTugas', $data);

       
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
            'target' => $this->request->getPost('target'),

        ];

        if ($detailtugaspenatausahaanModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            // return redirect()->to('/penatausahaan_arsip/showDetailTugas');
            return redirect()->to('/penatausahaan_arsip/showDetailTugas/'.$id);
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
    
        return view('penatausahaan_arsip/showDetailTugas', $data);
    }



// Hagan Detail Tugas Utama Penatausahaan
    public function createDetailTugas2($id_anggota)
    {
        // Ambil data penatausahaan_arsip berdasarkan ID atau sesuaikan dengan kebutuhan Anda
        $detail_penatausahaan_arsip = $this->detailpenatausahaanModel->find($id_anggota);
        $penatausahaans = $this->penatausahaanModel->findAll();
    
        $data = [
            'title' => 'Tambah Detail Tugas penatausahaan arsip',
            'detail_penatausahaan_arsip' => $detail_penatausahaan_arsip, // Kirim data penatausahaan_arsip ke view jika diperlukan
            'penatausahaans' => $penatausahaans, // Kirim data penatausahaan_arsip ke view jika diperlukan
           
        ];
    
        return view('penatausahaan_arsip/createDetailTugas2', $data);

       
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
            'kinerja_utama' => $this->request->getPost('kinerja_utama'),
            'indikator' => $this->request->getPost('indikator'),
            'target' => $this->request->getPost('target'),

        ];

        if ($detailtugas2penatausahaanModel->insert($data)) {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/penatausahaan_arsip/showDetailTugas2/'.$id);
            // return redirect()->to('/penatausahaan');        } else {
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
    
        return view('penatausahaan_arsip/showDetailTugas2', $data);
    }


    /////////////////////////////////////////CETAK////////////////////

    public function previewCetak($id)
    {
        $data['penatausahaan_arsip'] = $this->penatausahaanModel->getPenatausahaanDetail2($id);
        // dd($data['penatausahaan_arsip']);
        return view('penatausahaan_arsip/previewCetak', $data);
    }

    public function cetak($id)
    {
        // Mengambil data anggaran dari model
        $data['penatausahaan_arsip'] = $this->penatausahaanModel->getPenatausahaanDetail($id);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Render view cetak ke dalam PDF
        $html = view('penatausahaan_arsip/cetak', $data);
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
