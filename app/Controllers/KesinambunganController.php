<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PelaporanModel;
use App\Models\AnggaranModel;

class KesinambunganController extends BaseController
{
    protected $pelaporanModel;
    protected $anggaranModel;

    public function __construct()
    {
        $this->pelaporanModel = new PelaporanModel();
        $this->anggaranModel = new AnggaranModel();
    }

    public function index()
    {
        $data = [
            'pelaporans' => $this->pelaporanModel->getPelaporan(),
        
        ];
        // dd($data);

        return view('kesinambunganKerja/index', $data);
    }
   
}
