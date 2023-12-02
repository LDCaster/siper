<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IndikatorModel;

class IndikatorController extends BaseController
{
    protected $indikatorModel;

    public function __construct()
    {
        $this->indikatorModel = new IndikatorModel();
    }

    public function index()
    {
        $data = [
            'indikators' => $this->indikatorModel->getKegiatanWithUrusanAndIndikatorKinerjaAndProgramAndKegiatanAndSubkegiatan(),
        ];

        // dd($data);

        return view('indikator/index', $data);
    }

    public function create()
    {
        $data = [
            'indikator_kinerja_urusan' => $this->indikatorModel->getIndikatorKinerjaUrusan(),
            'urusans' => $this->indikatorModel->getUrusans(),
            'programs' => $this->indikatorModel->getPrograms(),
            'kegiatans' => $this->indikatorModel->getKegiatans(),
            'subkegiatans' => $this->indikatorModel->getSubkegiatans(),
        ];

        // dd($data);

        return view('indikator/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $validationRules = [
            'id_urusan' => 'required',
            'id_indikator_kinerja_urusan' => 'required',
            'id_program' => 'required',
            'id_kegiatan' => 'required',
            'id_subkegiatan' => 'required',
            'nama_indikator' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/indikator/create')->withInput()->with('validation', $validation);
        }

        $this->indikatorModel->save([
            'id_urusan' => $this->request->getVar('id_urusan'),
            'id_indikator_kinerja_urusan' => $this->request->getVar('id_indikator_kinerja_urusan'),
            'id_program' => $this->request->getVar('id_program'),
            'id_kegiatan' => $this->request->getVar('id_kegiatan'),
            'id_subkegiatan' => $this->request->getVar('id_subkegiatan'),
            'nama_indikator' => $this->request->getVar('nama_indikator'),
        ]);

        return redirect()->to('/indikator')->with('success', 'Indikator berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'indikator' => $this->indikatorModel->find($id),
            'subkegiatans' => $this->indikatorModel->getSubkegiatans(),
            'kegiatans' => $this->indikatorModel->getKegiatans(),
            'programs' => $this->indikatorModel->getPrograms(),
            'indikator_kinerja_urusan' => $this->indikatorModel->getIndikatorKinerjaUrusan(),
            'urusans' => $this->indikatorModel->getUrusans(),
        ];

        // dd($data);

        return view('indikator/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $validationRules = [
            'id_urusan' => 'required',
            'id_indikator_kinerja_urusan' => 'required',
            'id_program' => 'required',
            'id_kegiatan' => 'required',
            'id_subkegiatan' => 'required',
            'nama_indikator' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/indikator/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->indikatorModel->update($id, [
            'id_urusan' => $this->request->getVar('id_urusan'),
            'id_indikator_kinerja_urusan' => $this->request->getVar('id_indikator_kinerja_urusan'),
            'id_program' => $this->request->getVar('id_program'),
            'id_kegiatan' => $this->request->getVar('id_kegiatan'),
            'id_subkegiatan' => $this->request->getVar('id_subkegiatan'),
            'nama_indikator' => $this->request->getVar('nama_indikator'),
        ]);

        return redirect()->to('/indikator')->with('success', 'Indikator berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->indikatorModel->delete($id);

        return redirect()->to('/indikator')->with('success', 'Indikator berhasil dihapus.');
    }

    // Fungsi untuk mengambil data Indikator Kinerja Urusan berdasarkan Urusan yang dipilih (digunakan untuk dropdown berantai)
    public function getIndikatorKinerjaByUrusan($id_urusan)
    {
        $indikatorKinerja = $this->indikatorModel->getIndikatorKinerjaByUrusan($id_urusan);
        return $this->response->setJSON($indikatorKinerja);
    }

    // Fungsi untuk mengambil data Program berdasarkan Indikator Kinerja Urusan yang dipilih (digunakan untuk dropdown berantai)
    public function getProgramByIndikator($id_indikator_kinerja_urusan)
    {
        $programByIndikator = $this->indikatorModel->getProgramByIndikator($id_indikator_kinerja_urusan);
        return $this->response->setJSON($programByIndikator);
    }

    // Fungsi untuk mengambil data Kegiatan berdasarkan Program yang dipilih (digunakan untuk dropdown berantai)
    public function getKegiatanByProgram($id_program)
    {
        $kegiatanByProgram = $this->indikatorModel->getKegiatanByProgram($id_program);
        return $this->response->setJSON($kegiatanByProgram);
    }

    // Fungsi untuk mengambil data Kegiatan berdasarkan Program yang dipilih (digunakan untuk dropdown berantai)
    public function getSubkegiatanByKegiatan($id_kegiatan)
    {
        $subkegiatanByKegiatan = $this->indikatorModel->getSubkegiatanByKegiatan($id_kegiatan);
        return $this->response->setJSON($subkegiatanByKegiatan);
    }
}
