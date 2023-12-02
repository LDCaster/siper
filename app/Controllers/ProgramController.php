<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramModel;

class ProgramController extends BaseController
{
    protected $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }

    public function index()
    {
        $data = [
            'programs' => $this->programModel->getProgramWithUrusanAndIndikatorKinerja(),
        ];

        return view('program/index', $data);
    }

    public function create()
    {
        $data = [
            'indikator_kinerja_urusan' => $this->programModel->getIndikatorKinerjaUrusan(),
            'urusans' => $this->programModel->getUrusans(),
        ];

        return view('program/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $validationRules = [
            'id_urusan' => 'required',
            'id_indikator_kinerja_urusan' => 'required',
            'nama_program' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/program/create')->withInput()->with('validation', $validation);
        }

        $this->programModel->save([
            'id_urusan' => $this->request->getVar('id_urusan'),
            'id_indikator_kinerja_urusan' => $this->request->getVar('id_indikator_kinerja_urusan'),
            'nama_program' => $this->request->getVar('nama_program'),
        ]);

        return redirect()->to('/program')->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'program' => $this->programModel->find($id),
            'indikator_kinerja_urusan' => $this->programModel->getIndikatorKinerjaUrusan(),
            'urusans' => $this->programModel->getUrusans(),
        ];

        return view('program/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $validationRules = [
            'id_urusan' => 'required',
            'id_indikator_kinerja_urusan' => 'required',
            'nama_program' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/program/edit/' . $id)->withInput()->with('validation', $validation);
        }

        $this->programModel->update($id, [
            'id_urusan' => $this->request->getVar('id_urusan'),
            'id_indikator_kinerja_urusan' => $this->request->getVar('id_indikator_kinerja_urusan'),
            'nama_program' => $this->request->getVar('nama_program'),
        ]);

        return redirect()->to('/program')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->programModel->delete($id);

        return redirect()->to('/program')->with('success', 'Program berhasil dihapus.');
    }

    public function getIndikatorKinerja($urusanID)
    {
        $indikatorKinerja = $this->programModel->getIndikatorKinerjaByUrusanForDropdown($urusanID);
        return $this->response->setJSON($indikatorKinerja);
    }
}
