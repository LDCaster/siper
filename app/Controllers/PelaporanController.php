<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelaporanModel;
use App\Models\AnggaranModel;
use App\Models\BuktiPelaporanModel;

use Dompdf\Dompdf;


class PelaporanController extends BaseController
{
    protected $pelaporanModel;
    protected $anggaranModel;
    protected $BuktiPelaporanModel;

    public function __construct()
    {
        $this->pelaporanModel = new PelaporanModel();
        $this->anggaranModel = new AnggaranModel();
        $this->BuktiPelaporanModel = new BuktiPelaporanModel();
    }

    public function index()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getPelaporan(),
        
        ];
        // dd($data);

        return view('pelaporan/index', $data);
    }
    public function indexlppd()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getPelaporan(),
        
        ];
        // dd($data);

        return view('pelaporan/indexlppd', $data);
    }
    public function indexlaporan()
    {
        return view('pelaporan/indexlaporan');
    }
    public function indextw()
    {
        return view('pelaporan/indextw');
    }

    public function indexbackup()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getBackupPelaporan(),
        
        ];
        // dd($data);

        return view('pelaporan/indexbackup', $data);
    }

    // Halaman TW-1
    public function indextw1()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getTW1(),
        
        ];
        // dd($data);

        return view('pelaporan/indextw1', $data);
    }

    // Halaman TW-2
    public function indextw2()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getTW2(),
        
        ];
        // dd($data);

        return view('pelaporan/indextw2', $data);
    }

    // Halaman TW-3
    public function indextw3()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getTW3(),
        
        ];
        // dd($data);

        return view('pelaporan/indextw3', $data);
    }

    // Halaman TW-4
    public function indextw4()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getTW4(),
        
        ];
        // dd($data);

        return view('pelaporan/indextw4', $data);
    }
    
    public function cetaklakip()
    {
        $data['pelaporan'] = $this->pelaporanModel->getPelaporan();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('/pelaporan/cetaklakip', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('lakip.pdf');
    }

    // tampilan cetak pdf rakortekbang
    public function cetaklakipView()
    {
        $data['pelaporan'] = $this->pelaporanModel->getPelaporan();
        // dd($data);  

        return view('pelaporan/preview', $data);
    }

    public function create()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $anggarans = $this->anggaranModel->findAll();
        $bukti = $this->BuktiPelaporanModel->getBukti();

        return view('pelaporan/create', ['anggarans' => $anggarans, 'bukti' => $bukti]);
    }

    public function createtw1()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $anggarans = $this->anggaranModel->findAll();
        $bukti = $this->BuktiPelaporanModel->findAll();

        return view('pelaporan/createtw1', ['anggarans' => $anggarans, 'bukti' => $bukti]);
    }

    public function createtw2()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $anggarans = $this->anggaranModel->findAll();
        $bukti = $this->BuktiPelaporanModel->findAll();

        return view('pelaporan/createtw2', ['anggarans' => $anggarans, 'bukti' => $bukti]);
    }

    public function createtw3()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $anggarans = $this->anggaranModel->findAll();
        $bukti = $this->BuktiPelaporanModel->findAll();

        return view('pelaporan/createtw3', ['anggarans' => $anggarans, 'bukti' => $bukti]);
    }

    public function createtw4()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $anggarans = $this->anggaranModel->findAll();
        $bukti = $this->BuktiPelaporanModel->findAll();

        return view('pelaporan/createtw4', ['anggarans' => $anggarans, 'bukti' => $bukti]);
    }

    public function store()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'id_bukti' => 'required',
            'status' => 'required',
            'realisasi_nominal' => 'required',
            'realisasi_persen' => 'required',
            'tahun' => 'required',
            'tw' => 'required',
            'status_backup' => 'required',
            // 'status_persetujuan' => 'required',
        
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'id_bukti' => $this->request->getPost('id_bukti'),
                'status' => $this->request->getPost('status'),
                'realisasi_nominal' => $this->request->getPost('realisasi_nominal'),
                'realisasi_persen' => $this->request->getPost('realisasi_persen'),
                'tahun' => $this->request->getPost('tahun'),
                'tw' => $this->request->getPost('tw'),
                'status_backup' => $this->request->getPost('status_backup'),
                // 'status_persetujuan' => $this->request->getPost('status_persetujuan'),
            ];

            $this->pelaporanModel->insert($data);

            return redirect()->to('/pelaporan');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('pelaporan/create', [
                'anggarans' => $this->anggaranModel->findAll(),
                'bukti' => $this->BuktiPelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function storetw1()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'id_bukti' => 'required',
            'status' => 'required',
            'realisasi_nominal' => 'required',
            'realisasi_persen' => 'required',
            'tahun' => 'required',
            'tw' => 'required',
            'status_backup' => 'required',
            // 'status_persetujuan' => 'required',
        
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'id_bukti' => $this->request->getPost('id_bukti'),
                'status' => $this->request->getPost('status'),
                'realisasi_nominal' => $this->request->getPost('realisasi_nominal'),
                'realisasi_persen' => $this->request->getPost('realisasi_persen'),
                'tahun' => $this->request->getPost('tahun'),
                'tw' => $this->request->getPost('tw'),
                'status_backup' => $this->request->getPost('status_backup'),
                // 'status_persetujuan' => $this->request->getPost('status_persetujuan'),
            ];

            $this->pelaporanModel->insert($data);

            return redirect()->to('/tw1');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('tw1/createtw1', [
                'anggarans' => $this->anggaranModel->findAll(),
                'bukti' => $this->BuktiPelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function storetw2()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'id_bukti' => 'required',
            'status' => 'required',
            'realisasi_nominal' => 'required',
            'realisasi_persen' => 'required',
            'tahun' => 'required',
            'tw' => 'required',
            'status_backup' => 'required',
            // 'status_persetujuan' => 'required',
        
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'id_bukti' => $this->request->getPost('id_bukti'),
                'status' => $this->request->getPost('status'),
                'realisasi_nominal' => $this->request->getPost('realisasi_nominal'),
                'realisasi_persen' => $this->request->getPost('realisasi_persen'),
                'tahun' => $this->request->getPost('tahun'),
                'tw' => $this->request->getPost('tw'),
                'status_backup' => $this->request->getPost('status_backup'),
                // 'status_persetujuan' => $this->request->getPost('status_persetujuan'),
            ];

            $this->pelaporanModel->insert($data);

            return redirect()->to('/tw2');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('tw2/createtw2', [
                'anggarans' => $this->anggaranModel->findAll(),
                'bukti' => $this->BuktiPelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function storetw3()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'id_bukti' => 'required',
            'status' => 'required',
            'realisasi_nominal' => 'required',
            'realisasi_persen' => 'required',
            'tahun' => 'required',
            'tw' => 'required',
            'status_backup' => 'required',
            // 'status_persetujuan' => 'required',
        
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'id_bukti' => $this->request->getPost('id_bukti'),
                'status' => $this->request->getPost('status'),
                'realisasi_nominal' => $this->request->getPost('realisasi_nominal'),
                'realisasi_persen' => $this->request->getPost('realisasi_persen'),
                'tahun' => $this->request->getPost('tahun'),
                'tw' => $this->request->getPost('tw'),
                'status_backup' => $this->request->getPost('status_backup'),
                // 'status_persetujuan' => $this->request->getPost('status_persetujuan'),
            ];

            $this->pelaporanModel->insert($data);

            return redirect()->to('/tw3');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('tw3/createtw3', [
                'anggarans' => $this->anggaranModel->findAll(),
                'bukti' => $this->BuktiPelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function storetw4()
    {
        // Validasi dan penyimpanan data Indikator Kinerja Urusan
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk menyimpan data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'id_bukti' => 'required',
            'status' => 'required',
            'realisasi_nominal' => 'required',
            'realisasi_persen' => 'required',
            'tahun' => 'required',
            'tw' => 'required',
            'status_backup' => 'required',
            // 'status_persetujuan' => 'required',
        
        ];

        if ($this->validate($validationRules)) {
            // Data valid, simpan ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'id_bukti' => $this->request->getPost('id_bukti'),
                'status' => $this->request->getPost('status'),
                'realisasi_nominal' => $this->request->getPost('realisasi_nominal'),
                'realisasi_persen' => $this->request->getPost('realisasi_persen'),
                'tahun' => $this->request->getPost('tahun'),
                'tw' => $this->request->getPost('tw'),
                'status_backup' => $this->request->getPost('status_backup'),
                // 'status_persetujuan' => $this->request->getPost('status_persetujuan'),
            ];

            $this->pelaporanModel->insert($data);

            return redirect()->to('/tw4');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('tw4/createtw4', [
                'anggarans' => $this->anggaranModel->findAll(),
                'bukti' => $this->BuktiPelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }

    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $pelaporan = $this->pelaporanModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        $anggarans = $this->anggaranModel->findAll();
        $bukti = $this->BuktiPelaporanModel->findAll();

        return view('pelaporan/edit', ['pelaporan' => $pelaporan,'anggarans' => $anggarans, 'bukti' => $bukti]);
    }

    public function update($id)
    {
        // Validasi dan pembaruan data Indikator Kinerja Urusan berdasarkan ID
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk memperbarui data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            'id_anggaran' => 'required',
            'id_bukti' => 'required',
            'status' => 'required',
            'realisasi_nominal' => 'required',
            'realisasi_persen' => 'required',
            'tahun' => 'required',
            'tw' => 'required',
            'status_backup' => 'required',
            // 'status_persetujuan' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                'id_anggaran' => $this->request->getPost('id_anggaran'),
                'id_bukti' => $this->request->getPost('id_bukti'),
                'status' => $this->request->getPost('status'),
                'realisasi_nominal' => $this->request->getPost('realisasi_nominal'),
                'realisasi_persen' => $this->request->getPost('realisasi_persen'),
                'tahun' => $this->request->getPost('tahun'),
                'tw' => $this->request->getPost('tw'),
                'status_backup' => $this->request->getPost('status_backup'),
                // 'status_persetujuan' => $this->request->getPost('status_persetujuan'),
            ];

            $this->pelaporanModel->update($id, $data);

            return redirect()->to('/pelaporan');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('pelaporan/edit', [
                'pelaporan' => $this->pelaporanModel->find($id),
                'anggarans' => $this->anggaranModel->findAll(),
                'bukti' => $this->BuktiPelaporanModel->findAll(),
                'validation' => $this->validator,
            ]);
        }
    }
    public function backup($id)
    {
        // Lakukan logika untuk mengubah status_verifikasi menjadi 'DITERIMA' berdasarkan $id
        // Misalnya, Anda dapat menggunakan model untuk mengupdate data
        $model = new PelaporanModel(); // Gantilah dengan nama model yang sesuai
        $model->updateStatusBackup($id, 'BACKUP');

        // Response JSON jika perlu
        return $this->response->setJSON(['status' => 'success', 'redirect' => base_url('/pelaporan')]);
    }

    // Misalkan, fungsi berada di kontroler Bab1LakipController
public function changeStatusBackup($id)
{
    // Ambil data berdasarkan ID
    $data = $this->pelaporanModel->find($id);

    if (!$data) {
        // Tampilkan pesan atau lakukan penanganan kesalahan jika data tidak ditemukan
        return redirect()->to('/pelaporan')->with('error', 'Data tidak ditemukan.');
    }

    // Perubahan status_backup
    $this->pelaporanModel->update($id, ['status_backup' => 'BACKUP']);

    // Redirect atau tampilkan pesan sukses
    return redirect()->to('/pelaporan')->with('success', 'Status backup berhasil diubah.');
}


    public function destroy($id)
    {
       
        $this->pelaporanModel->delete($id);

        return redirect()->to('/pelaporan');
    }
    
    public function destroytw1($id)
    {
       
        $this->pelaporanModel->delete($id);

        return redirect()->to('/tw1');
    }
    public function destroytw2($id)
    {
       
        $this->pelaporanModel->delete($id);

        return redirect()->to('/tw2');
    }
    public function destroytw3($id)
    {
       
        $this->pelaporanModel->delete($id);

        return redirect()->to('/tw3');
    }
    public function destroytw4($id)
    {
       
        $this->pelaporanModel->delete($id);

        return redirect()->to('/tw4');
    }

    // cetak pdf lakip
    
}
