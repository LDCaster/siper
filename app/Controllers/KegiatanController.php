<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;

class KegiatanController extends BaseController
{
    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'kegiatans' => $this->kegiatanModel->getKegiatanWithUrusanAndIndikatorKinerja(),
        ];

        return view('kegiatan/index', $data);
    }

    public function getIndikatorKinerja($urusanID)
    {
        $indikatorKinerja = $this->kegiatanModel->getIndikatorKinerjaByUrusan($urusanID);
        return $this->response->setJSON($indikatorKinerja);
    }

    public function getProgram($indikatorKinerjaID)
    {
        $programs = $this->kegiatanModel->getProgramByIndikatorKinerja($indikatorKinerjaID);
        return $this->response->setJSON($programs);
    }

    public function create()
    {
        $data = [
            'indikator_kinerja_urusan' => $this->kegiatanModel->getIndikatorKinerjaUrusan(),
            'urusans' => $this->kegiatanModel->getUrusans(),
            'programs' => $this->kegiatanModel->getPrograms(),
        ];

        return view('kegiatan/create', $data);
    }

    public function store()
    {
        $validationRules = [
            'id_urusan' => 'required',
            'id_indikator_kinerja_urusan' => 'required',
            'id_program' => 'required',
            'nama_kegiatan' => 'required',
        ];

        $validation = \Config\Services::validation();

        if (!$this->validate($validationRules)) {
            return redirect()->to('/kegiatan/create')->withInput()->with('validation', $validation);
        }

        $this->kegiatanModel->save([
            'id_urusan' => $this->request->getVar('id_urusan'),
            'id_indikator_kinerja_urusan' => $this->request->getVar('id_indikator_kinerja_urusan'),
            'id_program' => $this->request->getVar('id_program'),
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
        ]);

        return redirect()->to('/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'kegiatan' => $this->kegiatanModel->find($id),
            'indikator_kinerja_urusan' => $this->kegiatanModel->getIndikatorKinerjaUrusan(),
            'urusans' => $this->kegiatanModel->getUrusans(),
            'programs' => $this->kegiatanModel->getPrograms(),
        ];
        // dd($data);

        return view('kegiatan/edit', $data);
    }

    public function update($id)
    {
        $validationRules = [
            'id_urusan' => 'required',
            'id_indikator_kinerja_urusan' => 'required',
            'id_program' => 'required',
            'nama_kegiatan' => 'required',
        ];

        $validation = \Config\Services::validation();

        if (!$this->validate($validationRules)) {
            return redirect()->to('/kegiatan/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->kegiatanModel->update($id, [
            'id_urusan' => $this->request->getVar('id_urusan'),
            'id_indikator_kinerja_urusan' => $this->request->getVar('id_indikator_kinerja_urusan'),
            'id_program' => $this->request->getVar('id_program'),
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
        ]);

        return redirect()->to('/kegiatan')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->kegiatanModel->delete($id);

        return redirect()->to('/kegiatan')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
