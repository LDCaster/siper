<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bab1lakipModel;
use App\Models\KaryawanModel;

class Bab1lakipController extends BaseController
{
    protected $bab1lakipModel;
    protected $karyawanModel;

    public function __construct()
    {
        $this->bab1lakipModel = new Bab1lakipModel();
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'bab1lakips' => $this->bab1lakipModel->getBab1lakip(),
        
        ];
        // dd($data);

        return view('bab1lakip/index', $data);
    }
    

    public function create()
    {
        // Mengambil data Karyawan untuk digunakan dalam form create
        $karyawans = $this->karyawanModel->findAll();

        return view('bab1lakip/create', ['karyawans' => $karyawans]);
    }

    public function store()
{
    // Validasi dan penyimpanan data Indikator Kinerja Urusan
    $validationRules = [
        'latar_belakang' => 'required',
        'narasi_struktur' => 'required',
        'foto_struktur' => [
            'uploaded[foto_struktur]',
            'mime_in[foto_struktur,image/jpg,image/jpeg]',
            'max_size[foto_struktur,1024]',
        ],
        'narasi_foto' => 'required',
        'permasalahan_utama' => 'required',
        'produk_layanan' => 'required',
        'sistematika' => 'required',
        'tahun' => 'required',
        'status_laporan' => 'required'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->to('/bab1lakip/create')->withInput()->with('validation', $this->validator);
    }

    // Pindahkan file yang diunggah ke folder yang diinginkan
    $file = $this->request->getFile('foto_struktur');
    $newFileName = $file->getRandomName();
    $file->move(ROOTPATH . 'public/uploads/bab1lakip/', $newFileName);

    // Simpan data ke database
    $this->bab1lakipModel->save([
        'latar_belakang' => $this->request->getPost('latar_belakang'),
        'narasi_struktur' => $this->request->getPost('narasi_struktur'),
        'foto_struktur' => $newFileName,
        'narasi_foto' => $this->request->getPost('narasi_foto'),
        'permasalahan_utama' => $this->request->getPost('permasalahan_utama'),
        'produk_layanan' => $this->request->getPost('produk_layanan'),
        'sistematika' => $this->request->getPost('sistematika'),
        'tahun' => $this->request->getPost('tahun'),
        'status_laporan' => $this->request->getPost('status_laporan')
    ]);

    return redirect()->to('/bab1lakip')->with('success', 'Data Dukung berhasil ditambahkan.');
}


     
    public function edit($id)
    {
        // Mengambil data Indikator Kinerja Urusan berdasarkan ID
        $bab1lakip = $this->bab1lakipModel->find($id);

        // Mengambil data Urusan untuk digunakan dalam form edit
        $karyawans = $this->karyawanModel->findAll();

        return view('bab1lakip/edit', ['bab1lakip' => $bab1lakip, 'karyawans' => $karyawans]);
    }

    public function update($id)
    {
        // Validasi dan pembaruan data Indikator Kinerja Urusan berdasarkan ID
        // Anda dapat menggunakan $this->request->getPost() untuk mengambil data dari form
        // Kemudian, gunakan model untuk memperbarui data sesuai kebutuhan

        // Contoh validasi
        $validationRules = [
            // 'id_karyawan' => 'required',
            'latar_belakang' => 'required',
            'narasi_struktur' => 'required',
            'narasi_foto' => 'required',
            'permasalahan_utama' => 'required',
            'produk_layanan' => 'required',
            'sistematika' => 'required',
            'tahun' => 'required',
            'status_laporan' => 'required'
            
        ];

        if ($this->validate($validationRules)) {
            // Data valid, update data ke database
            $data = [
                // 'id_karyawan' => $this->request->getPost('id_karyawan'),
                'latar_belakang' => $this->request->getPost('latar_belakang'),
                'narasi_struktur' => $this->request->getPost('narasi_struktur'),
                'narasi_foto' => $this->request->getPost('narasi_foto'),
                'permasalahan_utama' => $this->request->getPost('permasalahan_utama'),
                'produk_layanan' => $this->request->getPost('produk_layanan'),
                'sistematika' => $this->request->getPost('sistematika'),
                'tahun' => $this->request->getPost('tahun'),
                'status_laporan' => $this->request->getPost('status_laporan')
                
            ];

            $this->bab1lakipModel->update($id, $data);

            return redirect()->to('/bab1lakip');
        } else {
            // Validasi gagal, tampilkan kembali form dengan pesan error
            return view('bab1lakip/edit', [
                'bab1lakip' => $this->bab1lakipModel->find($id),
                'validation' => $this->validator,
            ]);
        }
    }

    public function destroy($id)
    {
        // Menghapus data Indikator Kinerja karyawan berdasarkan ID
        // Gunakan model untuk melakukan penghapusan
        $this->bab1lakipModel->delete($id);

        return redirect()->to('/bab1lakip');
    }
}
