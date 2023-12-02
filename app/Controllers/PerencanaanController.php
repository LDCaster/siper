<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\PerencanaanModel;
use App\Models\PerencanaanRakorModel;
use App\Models\AnggaranModel;
use App\Models\IndikatorKinerjaUrusanModel;
use App\Models\SubKegiatanModel;
use App\Models\SatuanModel;
use App\Models\DDPerencanaanModel;

use Dompdf\Dompdf;


class PerencanaanController extends BaseController
{
    protected $perencanaanModel;
    protected $perencanaanrakorModel;
    protected $anggaranModel;
    protected $indikatorKinerjaUrusanModel;
    protected $subKegiatanModel;
    protected $satuanModel;
    protected $ddperencanaanModel;

    public function __construct()
    {
        $this->perencanaanModel = new PerencanaanModel();
        $this->perencanaanrakorModel = new PerencanaanRakorModel();
        $this->anggaranModel = new AnggaranModel();
        $this->indikatorKinerjaUrusanModel = new IndikatorKinerjaUrusanModel();
        $this->subKegiatanModel = new SubKegiatanModel();
        $this->satuanModel = new SatuanModel();
        $this->ddperencanaanModel = new DDPerencanaanModel();
    }

    public function indexRakortekbang()
    {
        $data['perencanaan'] = $this->perencanaanrakorModel->getRakor();
        // dd($data);

        return view('perencanaan/rakortekbang/index', $data);
    }
    public function indexRakorArsip()
    {
        $data['perencanaan'] = $this->perencanaanrakorModel->getRakorarsip();
        return view('perencanaan/rakortekbang/indexarsip', $data);
    }
    public function ddRakortekbang()
    {
        $data['dd_perencanaan'] = $this->ddperencanaanModel->getDDRakor();
        return view('perencanaan/datadukung/index', $data);
    }
    public function indexRenja()
    {
        $data['perencanaan'] = $this->perencanaanModel->getPerencanaanrenja();
        return view('perencanaan/renja/index', $data);
    }
    
    public function ddRenja()
    {
        $data['dd_perencanaan'] = $this->ddperencanaanModel->getAllData();
        return view('perencanaan/datadukung/index', $data);
    }

    public function createRakortekbang()
    {
        $indikatorKinerjaUrusan = $this->indikatorKinerjaUrusanModel->findAll();
        $subkegiatan = $this->subKegiatanModel->findAll();
        $satuan = $this->satuanModel->findAll();


        $data = [
            'indikatorKinerjaUrusan' => $indikatorKinerjaUrusan,
            'subkegiatan' => $subkegiatan,
            'satuan' => $satuan,
        ];

        return view('perencanaan/rakortekbang/create' , $data);
    }

    public function createRakortekbangarsip()
    {
        $indikatorKinerjaUrusan = $this->indikatorKinerjaUrusanModel->findAll();
        $subkegiatan = $this->subKegiatanModel->findAll();
        $satuan = $this->satuanModel->findAll();


        $data = [
            'indikatorKinerjaUrusan' => $indikatorKinerjaUrusan,
            'subkegiatan' => $subkegiatan,
            'satuan' => $satuan,
        ];

        return view('perencanaan/rakortekbang/createarsip' , $data);
    }

    public function createRenja()
    {
        $indikatorKinerjaUrusan = $this->indikatorKinerjaUrusanModel->findAll();
        $subkegiatan = $this->subKegiatanModel->findAll();
        $satuan = $this->satuanModel->findAll();

        $data = [
            'indikatorKinerjaUrusan' => $indikatorKinerjaUrusan,
            'subkegiatan' => $subkegiatan,
            'satuan' => $satuan,
        ];

        return view('perencanaan/renja/create' , $data);
    }

    public function store()
{
    $db = \Config\Database::connect(); // Menggunakan database connection
    $validation = \Config\Services::validation();

    // Validasi input
    $validation->setRules([
        'id_indikator_kinerja_urusan' => 'required',
        'id_subkegiatan' => 'required',
        'id_satuan' => 'required',
        'pagu_indikatif' => 'required|numeric',
        'target' => 'required|numeric',
        'status_perencanaan' => 'required',
        'status_tujuan' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Mulai transaksi
    $db->transBegin();

    try {
        // Proses penyimpanan data perencanaan ke tabel "perencanaan"
        $dataPerencanaan = [
            'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
            'status_perencanaan' => $this->request->getPost('status_perencanaan'),
            'status_tujuan' => $this->request->getPost('status_tujuan'),
        ];

        $idPerencanaan = $this->perencanaanModel->insert($dataPerencanaan);

        if (!$idPerencanaan) {
            throw new \Exception('Gagal menyimpan data perencanaan');
        }

        // Proses penyimpanan data ke tabel "rakortekbang" dengan data yang sama
        $dataRakor = [
            'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            'id_indikator_kinerja_urusan' => $this->request->getPost('id_indikator_kinerja_urusan'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
            'status_perencanaan' => $this->request->getPost('status_perencanaan'),
            'status_tujuan' => $this->request->getPost('status_tujuan'),
            'id_perencanaan' => $idPerencanaan,
        ];

        $idRakor = $this->perencanaanrakorModel->insert($dataRakor);

        if (!$idRakor) {
            throw new \Exception('Gagal menyimpan data rakor');
        }

        // Proses penyimpanan data ke tabel "anggaran" dengan data yang sama
        $dataAnggaran = [
            'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
            'status_perencanaan' => $this->request->getPost('status_perencanaan'),
            'status_tujuan' => $this->request->getPost('status_tujuan'),
            'id_perencanaan' => $idPerencanaan,
            'id_rakor' => $idRakor,
        ];

        $idAnggaran = $this->anggaranModel->insert($dataAnggaran);

        if (!$idAnggaran) {
            throw new \Exception('Gagal menyimpan data anggaran');
        }

        // Commit transaksi jika semua berhasil
        $db->transCommit();

        // Redirect sesuai dengan status perencanaan
        if ($this->request->getPost('status_tujuan') === 'PERPUSTAKAAN') {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/perencanaan/index/rakor')->with('success', 'Data perencanaan berhasil disimpan.');
        } else {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/perencanaan/indexarsip/rakor')->with('success', 'Data perencanaan berhasil disimpan.');
        }
    } catch (\Exception $e) {
        $db->transRollback(); // Rollback jika ada kesalahan
        session()->setFlashdata('pesan', 'Data gagal ditambahkan!');
        return redirect()->back()->withInput();
    }
}


public function storerenja()
{
    $db = \Config\Database::connect(); // Menggunakan database connection
    $validation = \Config\Services::validation();

    // Validasi input
    $validation->setRules([
        'id_subkegiatan' => 'required',
        'id_satuan' => 'required',
        'pagu_indikatif' => 'required|numeric',
        'target' => 'required|numeric',
        'status_perencanaan' => 'required',
        'status_tujuan' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    // Mulai transaksi
    $db->transBegin();

    try {
        // Proses penyimpanan data perencanaan ke tabel "perencanaan"
        $dataPerencanaan = [
            'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
            'status_perencanaan' => $this->request->getPost('status_perencanaan'),
            'status_tujuan' => $this->request->getPost('status_tujuan'),
        ];

        $idPerencanaan = $this->perencanaanModel->insert($dataPerencanaan);

        if (!$idPerencanaan) {
            throw new \Exception('Gagal menyimpan data perencanaan');
        }

        // Proses penyimpanan data ke tabel "anggaran" dengan data yang sama
        $dataAnggaran = [
            'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
            'status_perencanaan' => $this->request->getPost('status_perencanaan'),
            'status_tujuan' => $this->request->getPost('status_tujuan'),
            'id_perencanaan' => $idPerencanaan,
        ];

        $idAnggaran = $this->anggaranModel->insert($dataAnggaran);

        if (!$idAnggaran) {
            throw new \Exception('Gagal menyimpan data anggaran');
        }

        // Commit transaksi jika semua berhasil
        $db->transCommit();

        // Redirect sesuai dengan status perencanaan
        if ($this->request->getPost('status_perencanaan') === 'NON RAKORTEKBANG') {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/perencanaan/index/rakor')->with('success', 'Data perencanaan berhasil disimpan.');
        } else {
            session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!');
            return redirect()->to('/perencanaan/index/renja')->with('success', 'Data perencanaan berhasil disimpan.');
        }
    } catch (\Exception $e) {
        $db->transRollback(); // Rollback jika ada kesalahan
        session()->setFlashdata('pesan', 'Data gagal ditambahkan!');
        return redirect()->back()->withInput();
    }
}


    public function show($id)
    {
        $data['perencanaan'] = $this->perencanaanModel->find($id);

        return view('perencanaan/show', $data);
    }

    public function edit($id)
    {
        // $data['urusan'] = $this->urusanModel->findAll();
        // $data['indikatorKinerjaUrusan'] = $this->indikatorKinerjaUrusanModel->findAll();
        // $data['program'] = $this->programModel->findAll();
        // $data['kegiatan'] = $this->kegiatanModel->findAll();
        // $data['subKegiatan'] = $this->subKegiatanModel->findAll();
        // $data['indikator'] = $this->indikatorModel->findAll();
        // $data['satuan'] = $this->satuanModel->findAll();
        $data['perencanaan'] = $this->perencanaanModel->find($id);

        return view('perencanaan/renja/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            // 'id_urusan' => 'required',
            // 'id_indikator_kinerja_urusan' => 'required',
            // 'id_program' => 'required',
            // 'id_kegiatan' => 'required',
            // 'id_subkegiatan' => 'required',
            // 'id_indikator' => 'required',
            // 'id_satuan' => 'required',
            'pagu_indikatif' => 'required|numeric',
            'target' => 'required|numeric',
            // 'status_perencanaan' => 'required',
            'status_tujuan' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses pembaruan data perencanaan di database
        $data = [
            // 'id_urusan' => $this->request->getPost('id_urusan'),
            // 'id_indikator_kinerja_urusan' => $this->request->getPost('id_indikator_kinerja_urusan'),
            // 'id_program' => $this->request->getPost('id_program'),
            // 'id_kegiatan' => $this->request->getPost('id_kegiatan'),
            // 'id_subkegiatan' => $this->request->getPost('id_subkegiatan'),
            // 'id_indikator' => $this->request->getPost('id_indikator'),
            // 'id_satuan' => $this->request->getPost('id_satuan'),
            'pagu_indikatif' => $this->request->getPost('pagu_indikatif'),
            'target' => $this->request->getPost('target'),
            // 'status_perencanaan' => $this->request->getPost('status_perencanaan'),
            'status_tujuan' => $this->request->getPost('status_tujuan'),
        ];

        $this->perencanaanModel->update($id, $data);

        return redirect()->to('/perencanaan/index/renja')->with('success', 'Data perencanaan berhasil diperbarui.');
    }

    public function destroyRakor($id)
    {
        $this->perencanaanrakorModel->delete($id);

        return redirect()->to('/perencanaan/index/rakor')->with('success', 'Data perencanaan berhasil dihapus.');
    }

    public function destroyRakorarsip($id)
    {
        $this->perencanaanrakorModel->delete($id);

        return redirect()->to('/perencanaan/indexarsip/rakor')->with('success', 'Data perencanaan berhasil dihapus.');
    }


    public function destroyRenja($id)
    {
        $this->perencanaanModel->delete($id);

        return redirect()->to('/perencanaan/index/renja')->with('success', 'Data perencanaan berhasil dihapus.');
    }

    // cetak pdf rakortekbang
    
    public function cetakRakortekbang()
    {
        $data['rakor'] = $this->perencanaanrakorModel->getPerencanaanRakor();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('/perencanaan/rakortekbang/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('rakortekbang.pdf');
    }

    public function cetakRakortekbangarsip()
    {
        $data['rakor'] = $this->perencanaanrakorModel->getRakorarsip();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('/perencanaan/rakortekbang/cetakarsip', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('rakortekbang.pdf');
    }

    // tampilan cetak pdf rakortekbang
    public function cetakRakortekbangView()
    {
        $data['rakor'] = $this->perencanaanrakorModel->getPerencanaanRakor();
        // dd($data);  

        return view('perencanaan/rakortekbang/preview', $data);
    }

    // tampilan cetak pdf rakortekbang
    public function cetakRakortekbangarsipView()
    {
        $data['rakor'] = $this->perencanaanrakorModel->getRakorarsip();
        // dd($data);  

        return view('perencanaan/rakortekbang/previewarsip', $data);
    }

    // cetak pdf renja
    public function cetakRenja()
    {
        $data['perencanaan'] = $this->perencanaanModel->getPerencanaanRenja();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('/perencanaan/renja/cetak', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('renja.pdf');
    }

    // tampilan cetak pdf renja
    public function cetakRenjaView()
    {
        $data['perencanaan'] = $this->perencanaanModel->getPerencanaanRenja();
        // dd($data);  

        return view('perencanaan/renja/preview', $data);
    }



    // fungsi untuk mengambil daftar indikator kinerja urusan berdasarkan id_urusan
    public function getIndikatorKinerjaBySubkegiatan($subkegiatanID)
    {
        $indikatorKinerjaUrusan = $this->perencanaanrakorModel->getIndikatorKinerjaByUrusan($subkegiatanID);
        return $this->response->setJSON($indikatorKinerjaUrusan);
    }

    // fungsi untuk mengambil daftar indikator kinerja urusan berdasarkan id_urusan
    public function getIndikatorKinerjaBySubkegiatanrenja($subkegiatanrenjaID)
    {
        $indikatorKinerjaUrusan = $this->perencanaanModel->getIndikatorKinerjaByUrusan($subkegiatanrenjaID);
        return $this->response->setJSON($indikatorKinerjaUrusan);
    }

 

    public function getIndikator()
{
    try {
        $id_subkegiatan = $this->request->getPost('id_subkegiatan');

        $indikatorModel = new PerencanaanModel();
        $indikator = $indikatorModel->getIndikatorBySubkegiatan($id_subkegiatan);

        if ($indikator === false) {
            throw new \Exception('Error retrieving indikator data.');
        }

        return json_encode($indikator);
    } catch (\Exception $e) {
        return json_encode(['error' => $e->getMessage()]);
    }
}

    public function getIndikatorrakor()
{
    try {
        $id_subkegiatan = $this->request->getPost('id_subkegiatan');

        $indikatorModel = new PerencanaanRakorModel();
        $indikator = $indikatorModel->getIndikatorBySubkegiatanrakor($id_subkegiatan);

        if ($indikator === false) {
            throw new \Exception('Error retrieving indikator data.');
        }

        return json_encode($indikator);
    } catch (\Exception $e) {
        return json_encode(['error' => $e->getMessage()]);
    }
}



   
}
