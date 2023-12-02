<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk menampilkan halaman login
$routes->get('/', 'AuthController::login', ['as' => 'login']);
$routes->get('login', 'AuthController::login', ['as' => 'login']);

 // Rute untuk proses login
 $routes->post('auth/processLogin', 'AuthController::processLogin', ['as' => 'auth/processLogin']);

 // Rute untuk logout
 $routes->get('logout', 'AuthController::logout', ['as' => 'logout']);

    $routes->get('/dashboard', 'Home::index');

    // karyawan
    $routes->get('/karyawan', 'KaryawanController::index', ['as' => 'karyawan/index']);
    $routes->get('/karyawan/create', 'KaryawanController::create', ['as' => 'karyawan/create']);
    $routes->post('/karyawan/store', 'KaryawanController::store', ['as' => 'karyawan/store']);
    $routes->get('/karyawan/show/(:num)', 'KaryawanController::show/$1', ['as' => 'karyawan/show']);
    $routes->get('/karyawan/edit/(:num)', 'KaryawanController::edit/$1', ['as' => 'karyawan/edit']);    
    $routes->post('/karyawan/update/(:num)', 'KaryawanController::update/$1', ['as' => 'karyawan/update']);
    $routes->get('/karyawan/delete/(:num)', 'KaryawanController::destroy/$1', ['as' => 'karyawan/delete']);

    

    // indikator kinerja urusan
    $routes->get('/indikator-kinerja-urusan', 'IndikatorKinerjaUrusanController::index', ['as' => 'indikator-kinerja-urusan/index']);
    $routes->get('/indikator-kinerja-urusan/create', 'IndikatorKinerjaUrusanController::create', ['as' => 'indikator-kinerja-urusan/create']);
    $routes->post('/indikator-kinerja-urusan/store', 'IndikatorKinerjaUrusanController::store', ['as' => 'indikator-kinerja-urusan/store']);
    $routes->get('/indikator-kinerja-urusan/edit/(:num)', 'IndikatorKinerjaUrusanController::edit/$1', ['as' => 'indikator-kinerja-urusan/edit']);
    $routes->post('/indikator-kinerja-urusan/update/(:num)', 'IndikatorKinerjaUrusanController::update/$1', ['as' => 'indikator-kinerja-urusan/update']);
    $routes->get('/indikator-kinerja-urusan/delete/(:num)', 'IndikatorKinerjaUrusanController::destroy/$1', ['as' => 'indikator-kinerja-urusan/delete']);

    // sub kegiatan
    $routes->get('/sub-kegiatan', 'SubKegiatanController::index', ['as' => 'sub-kegiatan/index']);
    $routes->get('/sub-kegiatan/create', 'SubKegiatanController::create', ['as' => 'sub-kegiatan/create']);
    $routes->post('/sub-kegiatan/store', 'SubKegiatanController::store', ['as' => 'sub-kegiatan/store']);
    $routes->get('/sub-kegiatan/edit/(:num)', 'SubKegiatanController::edit/$1', ['as' => 'sub-kegiatan/edit']);
    $routes->post('/sub-kegiatan/update/(:num)', 'SubKegiatanController::update/$1', ['as' => 'sub-kegiatan/update']);
    $routes->get('/sub-kegiatan/delete/(:num)', 'SubKegiatanController::destroy/$1', ['as' => 'sub-kegiatan/delete']);
    $routes->get('/sub-kegiatan/getIndikatorKinerjaByUrusan/(:num)', 'SubKegiatanController::getIndikatorKinerjaByUrusan/$1');
    $routes->get('/sub-kegiatan/getProgramByIndikator/(:num)', 'SubKegiatanController::getProgramByIndikator/$1');
    $routes->get('/sub-kegiatan/getKegiatanByProgram/(:num)', 'SubKegiatanController::getKegiatanByProgram/$1');

    // satuan
    $routes->get('/satuan', 'SatuanController::index', ['as' => 'satuan/index']);
    $routes->get('/satuan/create', 'SatuanController::create', ['as' => 'satuan/create']);
    $routes->post('/satuan/store', 'SatuanController::store', ['as' => 'satuan/store']);
    $routes->get('/satuan/edit/(:num)', 'SatuanController::edit/$1', ['as' => 'satuan/edit']);
    $routes->post('/satuan/update/(:num)', 'SatuanController::update/$1', ['as' => 'satuan/update']);
    $routes->get('/satuan/delete/(:num)', 'SatuanController::destroy/$1', ['as' => 'satuan/delete']);   
    $routes->get('/satuan/getIndikatorKinerjaByUrusan/(:num)', 'SatuanController::getIndikatorKinerjaByUrusan/$1');
    $routes->get('/satuan/getProgramByIndikator/(:num)', 'SatuanController::getProgramByIndikator/$1');
    $routes->get('/satuan/getKegiatanByProgram/(:num)', 'SatuanController::getKegiatanByProgram/$1');
    $routes->get('/satuan/getSubKegiatanByKegiatan/(:num)', 'SatuanController::getSubkegiatanByKegiatan/$1');
    $routes->get('/satuan/getIndikatorBySubKegiatan/(:num)', 'SatuanController::getIndikatorBySubkegiatan/$1');

    // data dukung penatausahaan
    $routes->get('ddpenatausahaan', 'DDPenatausahaanController::index', ['as' => 'ddpenatausahaan/index']);
    $routes->get('/ddpenatausahaan/create', 'DDPenatausahaanController::create', ['as' => 'ddpenatausahaan/create']);
    $routes->post('/ddpenatausahaan/store', 'DDPenatausahaanController::store', ['as' => 'ddpenatausahaan/store']);
   $routes->get('ddpenatausahaan/preview/(:num)', 'DDPenatausahaanController::preview/$1', ['as' => 'ddpenatausahaan/preview']);
   $routes->get('ddpenatausahaan/download/(:num)', 'DDPenatausahaanController::download/$1', ['as' => 'ddpenatausahaan/download']);
    $routes->get('/ddpenatausahaan/delete/(:num)', 'DDPenatausahaanController::destroy/$1', ['as' => 'ddpenatausahaan/delete']);

    $routes->get('ddpenatausahaanarsip', 'DDPenatausahaanController::indexarsip', ['as' => 'ddpenatausahaan/indexarsip']);
    $routes->get('/ddpenatausahaan/createarsip', 'DDPenatausahaanController::createarsip', ['as' => 'ddpenatausahaan/createarsip']);
   $routes->get('ddpenatausahaan/previewarsip/(:num)', 'DDPenatausahaanController::previewarsip/$1', ['as' => 'ddpenatausahaan/previewarsip']);
    $routes->get('/ddpenatausahaan/deletearsip/(:num)', 'DDPenatausahaanController::destroyarsip/$1', ['as' => 'ddpenatausahaan/deletearsip']);

    $routes->get('ddpenatausahaansekre', 'DDPenatausahaanController::indexsekre', ['as' => 'ddpenatausahaan/indexsekre']);
    $routes->get('/ddpenatausahaan/createsekre', 'DDPenatausahaanController::createsekre', ['as' => 'ddpenatausahaan/createsekre']);
   $routes->get('ddpenatausahaan/previewsekre/(:num)', 'DDPenatausahaanController::previewsekre/$1', ['as' => 'ddpenatausahaan/previewsekre']);
    $routes->get('/ddpenatausahaan/deletesekre/(:num)', 'DDPenatausahaanController::destroysekre/$1', ['as' => 'ddpenatausahaan/deletesekre']);

    // user
    $routes->get('/user', 'UserController::index', ['as' => 'user/index']);
    $routes->get('/user/create', 'UserController::create', ['as' => 'user/create']);
    $routes->post('/user/store', 'UserController::store', ['as' => 'user/store']);
    $routes->get('/user/show/(:num)', 'UserController::show/$1', ['as' => 'user/show']);
    $routes->get('/user/edit/(:num)', 'UserController::edit/$1', ['as' => 'user/edit']);    
    $routes->post('/user/update/(:num)', 'UserController::update/$1', ['as' => 'user/update']);
    $routes->get('/user/delete/(:num)', 'UserController::delete/$1', ['as' => 'user/delete']);

    // perencanaan
    $routes->get('/perencanaan/index/rakor', 'PerencanaanController::indexRakortekbang', ['as' => 'perencanaan/index/rakor']);
    $routes->get('/perencanaan/indexarsip/rakor', 'PerencanaanController::indexRakorArsip', ['as' => 'perencanaan/indexarsip/rakor']);
    $routes->get('/perencanaan/index/renja', 'PerencanaanController::indexRenja', ['as' => 'perencanaan/index/renja']);
    // $routes->get('/perencanaan/index/renja', 'PerencanaanController::indexRenja', ['as' => 'perencanaan/index/renja']);
    $routes->get('/perencanaan/create/rakor', 'PerencanaanController::createRakortekbang', ['as' => 'perencanaan/create/rakor']);  
    $routes->get('/perencanaan/createarsip/rakor', 'PerencanaanController::createRakortekbangarsip', ['as' => 'perencanaan/createarsip/rakor']);  
    $routes->get('/perencanaan/create/renja', 'PerencanaanController::createRenja', ['as' => 'perencanaan/create/renja']);  
    $routes->get('/perencanaan/createarsip/renja', 'PerencanaanController::createRenjaarsip', ['as' => 'perencanaan/createarsip/renja']);  
    $routes->post('/perencanaan/store', 'PerencanaanController::store', ['as' => 'perencanaan/store']);
    $routes->post('/perencanaan/storerenja', 'PerencanaanController::storerenja', ['as' => 'perencanaan/storerenja']);
    $routes->get('/perencanaan/edit/(:num)', 'PerencanaanController::edit/$1', ['as' => 'perencanaan/edit']);
    $routes->post('/perencanaan/update/(:num)', 'PerencanaanController::update/$1', ['as' => 'perencanaan/update']);
    $routes->delete('/perencanaan/deleteRakor/(:num)', 'PerencanaanController::destroyRakor/$1', ['as' => 'perencanaan/deleteRakor']);
    $routes->delete('/perencanaan/deleteRakorarsip/(:num)', 'PerencanaanController::destroyRakorarsip/$1', ['as' => 'perencanaan/deleteRakorarsip']);
    $routes->delete('/perencanaan/deleteRenja/(:num)', 'PerencanaanController::destroyRenja/$1', ['as' => 'perencanaan/deleteRenja']);
    $routes->get('/perencanaan/getIndikatorKinerjaBySubkegiatan/(:num)', 'PerencanaanController::getIndikatorKinerjaBySubkegiatan/$1');
    $routes->get('/perencanaan/getIndikatorKinerjaBySubkegiatanrenja/(:num)', 'PerencanaanController::getIndikatorKinerjaBySubkegiatanrenja/$1');
    $routes->post('perencanaan/getIndikator', 'PerencanaanController::getIndikator');   //  $routes->get('/perencanaan/getProgramByIndikatorKinerja/(:num)', 'PerencanaanController::getProgramByIndikatorKinerja/$1');
    $routes->post('perencanaan/getIndikatorrakor', 'PerencanaanController::getIndikatorrakor');   //  $routes->get('/perencanaan/getProgramByIndikatorKinerja/(:num)', 'PerencanaanController::getProgramByIndikatorKinerja/$1');
   //  $routes->get('/perencanaan/getKegiatanByProgram/(:num)', 'PerencanaanController::getKegiatanByProgram/$1');
   //  $routes->get('/perencanaan/getSubKegiatanByKegiatan/(:num)', 'PerencanaanController::getSubkegiatanByKegiatan/$1');
   //  $routes->get('/perencanaan/getIndikatorBySubKegiatan/(:num)', 'PerencanaanController::getIndikatorBySubkegiatan/$1');
   //  $routes->get('/perencanaan/getSatuanByIndikator/(:num)', 'PerencanaanController::getSatuanByIndikator/$1');

    $routes->get('cetakRakor', 'PerencanaanController::cetakRakortekbang');
    $routes->get('tampilanCetakRakor', 'PerencanaanController::cetakRakortekbangView');
    
    $routes->get('cetakRakorarsip', 'PerencanaanController::cetakRakortekbangarsip');
    $routes->get('tampilanCetakRakorarsip', 'PerencanaanController::cetakRakortekbangarsipView');

    $routes->get('cetakRenja', 'PerencanaanController::cetakRenja');
    $routes->get('tampilanCetakRenja', 'PerencanaanController::cetakRenjaView');
   //  $routes->get('ddrakor', 'PerencanaanController::ddRakortekbang');
   //  $routes->get('ddrenja', 'PerencanaanController::ddRenja');
    

    $routes->get('/kesinambungan', 'KesinambunganController::index', ['as' => 'kesinambungan']);

   //  penatausahaan
    $routes->get('/penatausahaan', 'PenatausahaanController::index', ['as' => 'penatausahaan/index']);
    $routes->get('/penatausahaan/create', 'PenatausahaanController::create', ['as' => 'penatausahaan/create']);
    $routes->post('/penatausahaan/store', 'PenatausahaanController::store', ['as' => 'penatausahaan/store']);
    $routes->get('/penatausahaan/show/(:num)', 'PenatausahaanController::show/$1', ['as' => 'penatausahaan/show']);
    $routes->get('/penatausahaan/edit/(:num)', 'PenatausahaanController::edit/$1', ['as' => 'penatausahaan/edit']);    
    $routes->post('/penatausahaan/update/(:num)', 'PenatausahaanController::update/$1', ['as' => 'penatausahaan/update']);
    $routes->get('/penatausahaan/delete/(:num)', 'PenatausahaanController::destroy/$1', ['as' => 'penatausahaan/delete']);
    
    //punya tambah anggota penatausahaan
    $routes->add('/penatausahaan/createDetail/(:num)', 'PenatausahaanController::createDetail/$1');
    $routes->post('/penatausahaan/storeDetail', 'PenatausahaanController::storeDetail');
    $routes->add('/penatausahaan/showDetail/(:num)', 'PenatausahaanController::showDetail/$1');
    $routes->get('/penatausahaan/destroyDetail/(:num)', 'PenatausahaanController::destroyDetail/$1', ['as' => 'penatausahaan/destroyDetail']);

    //punya tambah Data anggaran penatausahaan
    $routes->add('/penatausahaan/createAnggaran/(:num)', 'PenatausahaanController::createAnggaran/$1');
    $routes->post('/penatausahaan/storeAnggaran', 'PenatausahaanController::storeAnggaran');
    $routes->add('/penatausahaan/showAnggaran/(:num)', 'PenatausahaanController::showAnggaran/$1');
    $routes->get('/penatausahaan/destroyAnggaran/(:num)', 'PenatausahaanController::destroyAnggaran/$1', ['as' => 'penatausahaan/destroyAnggaran']);

    //punya tambah Data Kinerja utama penatausahaan
    $routes->add('/penatausahaan/createKinerjabidang/(:num)', 'PenatausahaanController::createKinerjabidang/$1');
    $routes->post('/penatausahaan/storeKinerjabidang', 'PenatausahaanController::storeKinerjabidang');
    $routes->add('/penatausahaan/showKinerjabidang/(:num)', 'PenatausahaanController::showKinerjabidang/$1');
    $routes->get('/penatausahaan/destroyKinerjabidang/(:num)', 'PenatausahaanController::destroyKinerjabidang/$1', ['as' => 'penatausahaan/destroyKinerjabidang']);

     //punya tambah tugas utama penatausahaan
    $routes->add('/penatausahaan/createDetailTugas/(:num)', 'PenatausahaanController::createDetailTugas/$1');
    $routes->post('/penatausahaan/storeDetailTugas', 'PenatausahaanController::storeDetailTugas');
    $routes->add('/penatausahaan/showDetailTugas/(:num)', 'PenatausahaanController::showDetailTugas/$1');
    $routes->get('/penatausahaan/destroyDetailTugas/(:num)', 'PenatausahaanController::destroyDetailTugas/$1', ['as' => 'penatausahaan/destroyDetailTugas']);

     //punya tambah tugas tambahan penatausahaan
    $routes->get('/penatausahaan/createDetailTugas2/(:num)', 'PenatausahaanController::createDetailTugas2/$1');
    $routes->post('/penatausahaan/storeDetailTugas2', 'PenatausahaanController::storeDetailTugas2');
    $routes->get('/penatausahaan/showDetailTugas2/(:num)', 'PenatausahaanController::showDetailTugas2/$1');
    $routes->get('/penatausahaan/destroydetailtugas2/(:num)', 'PenatausahaanController::destroydetailtugas2/$1', ['as' => 'penatausahaan/destroydetailtugas2']);

   // $routes->get('/penatausahaan/showDetailTugas2/(:num)', 'PenatausahaanController::showDetailTugas2/$1', ['as' => 'showDetailTugas2']);



    $routes->get('/penatausahaan/previewCetak/(:num)', 'PenatausahaanController::previewCetak/$1');
    $routes->get('/penatausahaan/cetak/(:num)', 'PenatausahaanController::cetak/$1');

    // penatausahaan
    $routes->get('/penatausahaan_arsip', 'PenatausahaanArsipController::index', ['as' => 'penatausahaan_arsip/index']);
    $routes->get('/penatausahaan_arsip/create', 'PenatausahaanArsipController::create', ['as' => 'penatausahaan_arsip/create']);
    $routes->post('/penatausahaan_arsip/store', 'PenatausahaanArsipController::store', ['as' => 'penatausahaan_arsip/store']);
    $routes->get('/penatausahaan_arsip/show/(:num)', 'PenatausahaanArsipController::show/$1', ['as' => 'penatausahaan_arsip/show']);
    $routes->get('/penatausahaan_arsip/edit/(:num)', 'PenatausahaanArsipController::edit/$1', ['as' => 'penatausahaan_arsip/edit']);    
    $routes->post('/penatausahaan_arsip/update/(:num)', 'PenatausahaanArsipController::update/$1', ['as' => 'penatausahaan_arsip/update']);
    $routes->get('/penatausahaan_arsip/delete/(:num)', 'PenatausahaanArsipController::destroy/$1', ['as' => 'penatausahaan_arsip/delete']);

    $routes->add('/penatausahaan_arsip/createDetail/(:num)', 'PenatausahaanArsipController::createDetail/$1');
    $routes->post('/penatausahaan_arsip/storeDetail', 'PenatausahaanArsipController::storeDetail');
    $routes->add('/penatausahaan_arsip/showDetail/(:num)', 'PenatausahaanArsipController::showDetail/$1');
    $routes->get('/penatausahaan_arsip/destroyDetail/(:num)', 'PenatausahaanArsipController::destroyDetail/$1', ['as' => 'penatausahaan_arsip/destroyDetail']);

    $routes->add('/penatausahaan_arsip/createDetailTugas/(:num)', 'PenatausahaanArsipController::createDetailTugas/$1');
    $routes->post('/penatausahaan_arsip/storeDetailTugas', 'PenatausahaanArsipController::storeDetailTugas');
    $routes->add('/penatausahaan_arsip/showDetailTugas/(:num)', 'PenatausahaanArsipController::showDetailTugas/$1');
    $routes->get('/penatausahaan_arsip/destroyDetailTugas/(:num)', 'PenatausahaanArsipController::destroyDetailTugas/$1', ['as' => 'penatausahaan_arsip/destroyDetailTugas']);

    $routes->add('/penatausahaan_arsip/createDetailTugas2/(:num)', 'PenatausahaanArsipController::createDetailTugas2/$1');
    $routes->post('/penatausahaan_arsip/storeDetailTugas2', 'PenatausahaanArsipController::storeDetailTugas2');
    $routes->add('/penatausahaan_arsip/showDetailTugas2/(:num)', 'PenatausahaanArsipController::showDetailTugas2/$1');
    $routes->get('/penatausahaan_arsip/destroydetailtugas2/(:num)', 'PenatausahaanArsipController::destroydetailtugas2/$1', ['as' => 'penatausahaan_arsip/destroydetailtugas2']);

    $routes->get('/penatausahaan_arsip/previewCetak/(:num)', 'PenatausahaanArsipController::previewCetak/$1');
    $routes->get('/penatausahaan_arsip/cetak/(:num)', 'PenatausahaanArsipController::cetak/$1');

    // pelaporan
   $routes->get('/pelaporan', 'PelaporanController::index', ['as' => 'pelaporan/index']);
   $routes->get('/pelaporanlppd', 'PelaporanController::indexlppd', ['as' => 'pelaporan/indexlppd']);
   $routes->get('/pelaporanlaporan', 'PelaporanController::indexlaporan', ['as' => 'pelaporan/indexlaporan']);
   $routes->get('/pelaporanlaporanlppd', 'PelaporanController::indexlaporanlppd', ['as' => 'pelaporan/indexlaporanlppd']);
   $routes->get('/pelaporantw', 'PelaporanController::indextw', ['as' => 'pelaporan/indextw']);
   $routes->get('/backup', 'PelaporanController::indexbackup', ['as' => 'pelaporan/indexbackup']);
   $routes->get('/pelaporan/create', 'PelaporanController::create', ['as' => 'pelaporan/create']);
   $routes->post('/pelaporan/store', 'PelaporanController::store', ['as' => 'pelaporan/store']);
   $routes->get('/pelaporan/show/(:num)', 'PelaporanController::show/$1', ['as' => 'pelaporan/show']);
   $routes->get('/pelaporan/edit/(:num)', 'PelaporanController::edit/$1', ['as' => 'pelaporan/edit']);    
   $routes->post('/pelaporan/update/(:num)', 'PelaporanController::update/$1', ['as' => 'pelaporan/update']);
   $routes->get('/pelaporan/destroy/(:num)', 'PelaporanController::destroy/$1', ['as' => 'pelaporan/destroy']);
   // $routes->get('/pelaporan/cetaklakip/(:num)', 'PelaporanController::cetaklakip/$1');

   $routes->get('cetaklakip', 'PelaporanController::cetaklakip');
   $routes->get('preview', 'PelaporanController::cetaklakipView');


   $routes->get('pelaporan/changeStatusBackup/(:num)', 'PelaporanController::changeStatusBackup/$1');


   

   //TW
   $routes->get('/tw1', 'PelaporanController::indextw1', ['as' => 'tw1/indextw1']);
   $routes->get('/tw1/createtw1', 'PelaporanController::createtw1', ['as' => 'tw1/createtw1']);
   $routes->post('/tw1/storetw1', 'PelaporanController::storetw1', ['as' => 'tw1/storetw1']);
   $routes->get('/tw1/edittw1/(:num)', 'PelaporanController::edittw1/$1', ['as' => 'tw1/edittw1']);    
   $routes->post('/tw1/updatetw1/(:num)', 'PelaporanController::updatetw1/$1', ['as' => 'tw1/updatetw1']);
   $routes->get('/tw1/destroytw1/(:num)', 'PelaporanController::destroytw1/$1', ['as' => 'tw1/destroytw1']);



   $routes->get('/tw2', 'PelaporanController::indextw2', ['as' => 'tw2/indextw2']);
   $routes->get('/tw2/createtw2', 'PelaporanController::createtw2', ['as' => 'tw2/createtw2']);
   $routes->post('/tw2/storetw2', 'PelaporanController::storetw2', ['as' => 'tw2/storetw2']);
   $routes->get('/tw2/edittw2/(:num)', 'PelaporanController::edittw2/$1', ['as' => 'tw2/edittw2']);    
   $routes->post('/tw2/updatetw2/(:num)', 'PelaporanController::updatetw2/$1', ['as' => 'tw2/updatetw2']);
   $routes->get('/tw2/destroytw2/(:num)', 'PelaporanController::destroytw2/$1', ['as' => 'tw2/destroytw2']);



   $routes->get('/tw3', 'PelaporanController::indextw3', ['as' => 'tw3/indextw3']);
   $routes->get('/tw3/createtw3', 'PelaporanController::createtw3', ['as' => 'tw3/createtw3']);
   $routes->post('/tw3/storetw3', 'PelaporanController::storetw3', ['as' => 'tw3/storetw3']);
   $routes->get('/tw3/edittw3/(:num)', 'PelaporanController::edittw3/$1', ['as' => 'tw3/edittw3']);    
   $routes->post('/tw3/updatetw3/(:num)', 'PelaporanController::updatetw3/$1', ['as' => 'tw3/updatetw3']);
   $routes->get('/tw3/destroytw3/(:num)', 'PelaporanController::destroytw3/$1', ['as' => 'tw3/destroytw3']);



   $routes->get('/tw4', 'PelaporanController::indextw4', ['as' => 'tw4/indextw4']);
   $routes->get('/tw4/createtw4', 'PelaporanController::createtw4', ['as' => 'tw4/createtw4']);
   $routes->post('/tw4/storetw4', 'PelaporanController::storetw4', ['as' => 'tw4/storetw4']);
   $routes->get('/tw4/edittw4/(:num)', 'PelaporanController::edittw4/$1', ['as' => 'tw4/edittw4']);    
   $routes->post('/tw4/updatetw4/(:num)', 'PelaporanController::updatetw4/$1', ['as' => 'tw4/updatetw4']);
   $routes->get('/tw4/destroytw4/(:num)', 'PelaporanController::destroytw4/$1', ['as' => 'tw4/destroytw4']);



   //  data dukung perencanaan
   $routes->get('ddperencanaan', 'DDPerencanaanController::index', ['as' => 'ddperencanaan/index']);
   $routes->get('ddperencanaan/create', 'DDPerencanaanController::create', ['as' => 'ddperencanaan/create']);
   $routes->post('ddperencanaan/store', 'DDPerencanaanController::store', ['as' => 'ddperencanaan/store']);
   $routes->get('ddperencanaan/preview/(:num)', 'DDPerencanaanController::preview/$1', ['as' => 'ddperencanaan/preview']);
   $routes->get('ddperencanaan/download/(:num)', 'DDPerencanaanController::download/$1', ['as' => 'ddperencanaan/download']);
   $routes->get('ddperencanaan/delete/(:num)', 'DDPerencanaanController::delete/$1');

   
   $routes->get('ddperencanaanrenja', 'DDPerencanaanController::indexrenja', ['as' => 'ddperencanaanrenja/indexrenja']);
   $routes->get('ddperencanaanrenja/createRenja', 'DDPerencanaanController::createRenja', ['as' => 'ddperencanaanrenja/createRenja']);
   $routes->post('ddperencanaanrenja/storeRenja', 'DDPerencanaanController::storeRenja', ['as' => 'ddperencanaanrenja/storeRenja']);
   $routes->get('ddperencanaanrenja/previewrenja/(:num)', 'DDPerencanaanController::previewrenja/$1', ['as' => 'ddperencanaanrenja/previewrenja']);
   $routes->get('ddperencanaanrenja/deleteRenja/(:num)', 'DDPerencanaanController::deleteRenja/$1');
   
   $routes->get('ddperencanaanrakor', 'DDPerencanaanController::indexrakor', ['as' => 'ddperencanaanrakor/indexrakor']);
   $routes->get('ddperencanaanrakor/createRakor', 'DDPerencanaanController::createRakor', ['as' => 'createRakor']);
   $routes->post('ddperencanaanrakor/storeRakor', 'DDPerencanaanController::storeRakor', ['as' => 'storeRakor']);
   $routes->get('ddperencanaanrakor/previewrakor/(:num)', 'DDPerencanaanController::previewrakor/$1', ['as' => 'ddperencanaanrakor/previewrakor']);
   $routes->get('ddperencanaanrakor/deleteRakor/(:num)', 'DDPerencanaanController::deleteRakor/$1');

   $routes->get('ddperencanaanrakorarsip', 'DDPerencanaanController::indexrakorarsip', ['as' => 'ddperencanaanrakor/indexrakorarsip']);
   $routes->get('ddperencanaanrakor/createRakorarsip', 'DDPerencanaanController::createRakorarsip', ['as' => 'createRakorarsip']);
   $routes->get('ddperencanaanrakor/previewrakorarsip/(:num)', 'DDPerencanaanController::previewrakorarsip/$1', ['as' => 'ddperencanaanrakor/previewrakorarsip']);
   $routes->get('ddperencanaanrakor/deleteRakorarsip/(:num)', 'DDPerencanaanController::deleteRakorarsip/$1');

   //  data dukung perencanaan Rakor
   // $routes->get('ddperencanaan', 'DDPerencanaanController::indexrakor', ['as' => 'ddperencanaan/index']);
   // $routes->get('ddperencanaan/create', 'DDPerencanaanController::create', ['as' => 'ddperencanaan/create']);
   // $routes->post('ddperencanaan/store', 'DDPerencanaanController::store', ['as' => 'ddperencanaan/store']);
   // $routes->get('ddperencanaan/preview/(:num)', 'DDPerencanaanController::preview/$1', ['as' => 'ddperencanaan/preview']);
   // $routes->get('ddperencanaan/download/(:num)', 'DDPerencanaanController::download/$1', ['as' => 'ddperencanaan/download']);
   // $routes->get('ddperencanaan/delete/(:num)', 'DDPerencanaanController::delete/$1');

   // data dukung pelaporan
   $routes->get('ddpelaporan', 'DDPelaporanController::index', ['as' => 'ddpelaporan/index']);
   $routes->get('/ddpelaporan/create', 'DDPelaporanController::create', ['as' => 'ddpelaporan/create']);
   $routes->post('/ddpelaporan/store', 'DDPelaporanController::store', ['as' => 'ddpelaporan/store']);
   $routes->get('ddpelaporan/preview/(:num)', 'DDPelaporanController::preview/$1', ['as' => 'ddpelaporan/preview']);
   $routes->get('ddpelaporan/download/(:num)', 'DDPelaporanController::download/$1', ['as' => 'ddpelaporan/download']);
   $routes->get('/ddpelaporan/delete/(:num)', 'DDPelaporanController::destroy/$1', ['as' => 'ddpelaporan/delete']);

   $routes->get('ddpelaporanlppd', 'DDPelaporanController::indexlppd', ['as' => 'ddpelaporan/indexlppd']);
   $routes->get('/ddpelaporan/createlppd', 'DDPelaporanController::createlppd', ['as' => 'ddpelaporan/createlppd']);
   $routes->get('ddpelaporan/previewlppd/(:num)', 'DDPelaporanController::previewlppd/$1', ['as' => 'ddpelaporan/previewlppd']);
   $routes->get('/ddpelaporan/deletelppd/(:num)', 'DDPelaporanController::destroylppd/$1', ['as' => 'ddpelaporan/deletelppd']);

   
    // anggaran
    $routes->get('/anggaran/index/perpustakaan', 'AnggaranController::indexPerpustakaan');
    $routes->get('/anggaran/create/perpustakaan', 'AnggaranController::createPerpustakaan');
    $routes->post('/anggaran/store/perpustakaan', 'AnggaranController::storePerpustakaan');
    $routes->add('/anggaran/edit/perpustakaan/(:num)', 'AnggaranController::editPerpustakaan/$1');
    $routes->add('/anggaran/update/perpustakaan/(:num)', 'AnggaranController::updatePerpustakaan/$1');
    $routes->get('/anggaran/delete/perpustakaan/(:num)', 'AnggaranController::destroyPerpustakaan/$1');
    $routes->get('/anggaran/previewCetakPerpus', 'AnggaranController::previewCetakPerpus');;

    $routes->get('/anggaran/index/kearsipan', 'AnggaranController::indexKearsipan');
    $routes->get('/anggaran/create/kearsipan', 'AnggaranController::createKearsipan');
    $routes->post('/anggaran/store/kearsipan', 'AnggaranController::storeKearsipan');
    $routes->get('/anggaran/edit/kearsipan/(:num)', 'AnggaranController::editKearsipan/$1');
    $routes->post('/anggaran/update/kearsipan/(:num)', 'AnggaranController::updateKearsipan/$1');
    $routes->get('/anggaran/delete/kearsipan/(:num)', 'AnggaranController::destroyKearsipan/$1');
    $routes->get('/anggaran/previewCetakArsip', 'AnggaranController::previewCetakArsip');

    $routes->get('/anggaran/index/sekretariat', 'AnggaranController::indexSekretariat');
    $routes->get('/anggaran/create/sekretariat', 'AnggaranController::createSekretariat');
    $routes->post('/anggaran/store/sekretariat', 'AnggaranController::storeSekretariat');
    $routes->get('/anggaran/edit/sekretariat/(:num)', 'AnggaranController::editSekretariat/$1');
    $routes->post('/anggaran/update/sekretariat/(:num)', 'AnggaranController::updateSekretariat/$1');
    $routes->get('/anggaran/delete/sekretariat/(:num)', 'AnggaranController::destroySekretariat/$1');
    $routes->get('/anggaran/previewCetakSekre', 'AnggaranController::previewCetakSekre');
    // $routes->get('/anggaran/getSatuan/(:num)', 'AnggaranController::getSatuan/$1');

//cetak anggaran
    $routes->get('/anggaran/cetakArsip', 'AnggaranController::cetakArsip');
    $routes->get('/anggaran/cetakPerpus', 'AnggaranController::cetakPerpus');
    $routes->get('/anggaran/cetakSekre', 'AnggaranController::cetakSekre');

    // $routes->get('cetakRenja', 'PerencanaanController::cetakRenja');

//detail anggaran
    $routes->add('/anggaran/createDetail/(:num)', 'AnggaranController::createDetail/$1');
    $routes->post('/anggaran/storeDetail', 'AnggaranController::storeDetail');
    $routes->add('/anggaran/showDetail/(:num)', 'AnggaranController::showDetail/$1');

    $routes->add('/anggaran/createDetailperpus/(:num)', 'AnggaranController::createDetailperpus/$1');
    $routes->post('/anggaran/storeDetailperpus', 'AnggaranController::storeDetailperpus');

    $routes->add('/anggaran/createDetailsekre/(:num)', 'AnggaranController::createDetailsekre/$1');
    $routes->post('/anggaran/storeDetailsekre', 'AnggaranController::storeDetailsekre');
   //  $routes->add('/anggaran/showDetailsekre/(:num)', 'AnggaranController::showDetailsekre/$1');


    //  data dukung pengaggaran
   $routes->get('ddanggaran', 'DDAnggaranController::index', ['as' => 'ddAnggaran/index']);
   $routes->get('ddanggaran/create', 'DDAnggaranController::create', ['as' => 'ddAnggaran/create']);
   $routes->post('ddanggaran/store', 'DDAnggaranController::store', ['as' => 'ddAnggaran/store']);
   $routes->get('ddanggaran/preview/(:num)', 'DDAnggaranController::preview/$1', ['as' => 'ddAnggaran/preview']);
   $routes->get('ddanggaran/download/(:num)', 'DDAnggaranController::download/$1', ['as' => 'ddAnggaran/download']);
   $routes->get('ddanggaran/delete/(:num)', 'DDAnggaranController::destroy/$1', ['as' => 'ddAnggaran/destroy']);

   $routes->get('ddanggaranarsip', 'DDAnggaranController::indexarsip', ['as' => 'ddAnggaran/indexarsip']);
   $routes->get('ddanggaran/createarsip', 'DDAnggaranController::createarsip', ['as' => 'ddAnggaran/createarsip']);
   $routes->get('ddanggaran/previewarsip/(:num)', 'DDAnggaranController::previewarsip/$1', ['as' => 'ddAnggaran/previewarsip']);
   $routes->get('ddanggaran/deletearsip/(:num)', 'DDAnggaranController::destroyarsip/$1', ['as' => 'ddAnggaran/destroyarsip']);

   $routes->get('ddanggaransekre', 'DDAnggaranController::indexsekre', ['as' => 'ddAnggaran/indexsekre']);
   $routes->get('ddanggaran/createsekre', 'DDAnggaranController::createsekre', ['as' => 'ddAnggaran/createsekre']);
   $routes->get('ddanggaran/previewsekre/(:num)', 'DDAnggaranController::previewsekre/$1', ['as' => 'ddAnggaran/previewsekre']);
   $routes->get('ddanggaran/deletesekre/(:num)', 'DDAnggaranController::destroysekre/$1', ['as' => 'ddAnggaran/destroysekre']);

   // bab1lakip
   $routes->get('/bab1lakip', 'Bab1lakipController::index', ['as' => 'bab1lakip/index']);
   $routes->get('/bab1lakip/create', 'Bab1lakipController::create', ['as' => 'bab1lakip/create']);
   $routes->post('/bab1lakip/store', 'Bab1lakipController::store', ['as' => 'bab1lakip/store']);
   $routes->get('/bab1lakip/show/(:num)', 'Bab1lakipController::show/$1', ['as' => 'bab1lakip/show']);
   $routes->get('/bab1lakip/edit/(:num)', 'Bab1lakipController::edit/$1', ['as' => 'bab1lakip/edit']);    
   $routes->post('/bab1lakip/update/(:num)', 'Bab1lakipController::update/$1', ['as' => 'bab1lakip/update']);
   $routes->get('/bab1lakip/delete/(:num)', 'Bab1lakipController::destroy/$1', ['as' => 'bab1lakip/delete']);


   // lampiran
   $routes->get('/lampiran', 'lampiranController::index', ['as' => 'lampiran/index']);
   $routes->get('/lampiran/create', 'lampiranController::create', ['as' => 'lampiran/create']);
   $routes->post('/lampiran/store', 'lampiranController::store', ['as' => 'lampiran/store']);
   $routes->get('/lampiran/show/(:num)', 'lampiranController::show/$1', ['as' => 'lampiran/show']);
   $routes->get('/lampiran/edit/(:num)', 'lampiranController::edit/$1', ['as' => 'lampiran/edit']);    
   $routes->post('/lampiran/update/(:num)', 'lampiranController::update/$1', ['as' => 'lampiran/update']);
   $routes->get('/lampiran/delete/(:num)', 'lampiranController::destroy/$1', ['as' => 'lampiran/delete']);
   $routes->get('lampiran/preview/(:num)', 'LampiranController::preview/$1', ['as' => 'lampiran/preview']);
   $routes->get('lampiran/download/(:num)', 'LampiranController::download/$1', ['as' => 'lampiran/download']);

   // babvlakip
   $routes->get('/babvlakip', 'BabvlakipController::index', ['as' => 'babvlakip/index']);
   $routes->get('/babvlakip/create', 'BabvlakipController::create', ['as' => 'babvlakip/create']);
   $routes->post('/babvlakip/store', 'BabvlakipController::store', ['as' => 'babvlakip/store']);
   $routes->get('/babvlakip/show/(:num)', 'BabvlakipController::show/$1', ['as' => 'babvlakip/show']);
   $routes->get('/babvlakip/edit/(:num)', 'BabvlakipController::edit/$1', ['as' => 'babvlakip/edit']);    
   $routes->post('/babvlakip/update/(:num)', 'BabvlakipController::update/$1', ['as' => 'babvlakip/update']);
   $routes->get('/babvlakip/delete/(:num)', 'BabvlakipController::destroy/$1', ['as' => 'babvlakip/delete']);

   // bab3lakip
   $routes->get('/bab3lakip', 'Bab3lakipController::index', ['as' => 'bab3lakip/index']);
   $routes->get('/bab3lakip/create', 'Bab3lakipController::create', ['as' => 'bab3lakip/create']);
   $routes->post('/bab3lakip/store', 'Bab3lakipController::store', ['as' => 'bab3lakip/store']);
   $routes->get('/bab3lakip/show/(:num)', 'Bab3lakipController::show/$1', ['as' => 'bab3lakip/show']);
   $routes->get('/bab3lakip/edit/(:num)', 'Bab3lakipController::edit/$1', ['as' => 'bab3lakip/edit']);    
   $routes->post('/bab3lakip/update/(:num)', 'Bab3lakipController::update/$1', ['as' => 'bab3lakip/update']);
   $routes->get('/bab3lakip/delete/(:num)', 'Bab3lakipController::destroy/$1', ['as' => 'bab3lakip/delete']);

   // pohon kinerja
   $routes->get('/pohonkinerja', 'PohonKinerjaController::index', ['as' => 'pohonkinerja/index']);
   $routes->get('/pohonkinerja/create', 'PohonKinerjaController::create', ['as' => 'pohonkinerja/create']);
   $routes->post('/pohonkinerja/store', 'PohonKinerjaController::store', ['as' => 'pohonkinerja/store']);
   $routes->get('/pohonkinerja/edit/(:num)', 'PohonKinerjaController::edit/$1', ['as' => 'pohonkinerja/edit']);
   $routes->post('/pohonkinerja/update/(:num)', 'PohonKinerjaController::update/$1', ['as' => 'pohonkinerja/update']);
   $routes->get('/pohonkinerja/delete/(:num)', 'PohonKinerjaController::destroy/$1', ['as' => 'pohonkinerja/delete']);
   $routes->get('/pohonkinerja/detail/(:num)', 'PohonKinerjaController::detail/$1', ['as' => 'pohonkinerja/detail']);

   // kinerja bidang
   $routes->get('/kinerjabidang', 'KinerjaBidangController::index', ['as' => 'kinerjabidang/index']);
   $routes->get('/kinerjabidang/create', 'KinerjaBidangController::create', ['as' => 'kinerjabidang/create']);
   $routes->post('/kinerjabidang/store', 'KinerjaBidangController::store', ['as' => 'kinerjabidang/store']);
   $routes->get('/kinerjabidang/edit/(:num)', 'KinerjaBidangController::edit/$1', ['as' => 'kinerjabidang/edit']);
   $routes->post('/kinerjabidang/update/(:num)', 'KinerjaBidangController::update/$1', ['as' => 'kinerjabidang/update']);
   $routes->get('/kinerjabidang/destroy/(:num)', 'KinerjaBidangController::destroy/$1', ['as' => 'kinerjabidang/delete']);

   // bukti pelaporan
   $routes->get('buktipelaporan', 'BuktiPelaporanController::index', ['as' => 'buktipelaporan/index']);
   $routes->get('buktipelaporansekre', 'BuktiPelaporanController::indexsekre', ['as' => 'buktipelaporan/indexsekre']);
   $routes->get('buktipelaporanperpus', 'BuktiPelaporanController::indexperpus', ['as' => 'buktipelaporan/indexperpus']);
   $routes->get('buktipelaporanarsip', 'BuktiPelaporanController::indexarsip', ['as' => 'buktipelaporan/indexarsip']);
   $routes->get('/buktipelaporan/create', 'BuktiPelaporanController::create', ['as' => 'buktipelaporan/create']);
   $routes->get('/buktipelaporan/createarsip', 'BuktiPelaporanController::createarsip', ['as' => 'buktipelaporan/createarsip']);
   $routes->get('/buktipelaporan/createperpus', 'BuktiPelaporanController::createperpus', ['as' => 'buktipelaporan/createperpus']);
   $routes->post('/buktipelaporan/store', 'BuktiPelaporanController::store', ['as' => 'buktipelaporan/store']);
   $routes->post('/buktipelaporan/storeperpus', 'BuktiPelaporanController::storeperpus', ['as' => 'buktipelaporan/storeperpus']);
   $routes->post('/buktipelaporan/storearsip', 'BuktiPelaporanController::storearsip', ['as' => 'buktipelaporan/storearsip']);
   $routes->get('buktipelaporan/preview/(:num)', 'BuktiPelaporanController::preview/$1', ['as' => 'buktipelaporan/preview']);
   $routes->get('buktipelaporan/previewarsip/(:num)', 'BuktiPelaporanController::previewarsip/$1', ['as' => 'buktipelaporan/previewarsip']);
   $routes->get('buktipelaporan/previewperpus/(:num)', 'BuktiPelaporanController::previewperpus/$1', ['as' => 'buktipelaporan/previewperpus']);
   $routes->get('buktipelaporan/previewsekre/(:num)', 'BuktiPelaporanController::previewsekre/$1', ['as' => 'buktipelaporan/previewsekre']);
   $routes->get('buktipelaporan/download/(:num)', 'BuktiPelaporanController::download/$1', ['as' => 'buktipelaporan/download']);
   $routes->get('/buktipelaporan/destroy/(:num)', 'BuktiPelaporanController::destroy/$1', ['as' => 'buktipelaporan/destroy']);
   $routes->get('/buktipelaporan/destroyperpus/(:num)', 'BuktiPelaporanController::destroyperpus/$1', ['as' => 'buktipelaporan/destroyperpus']);
   $routes->get('/buktipelaporan/destroyarsip/(:num)', 'BuktiPelaporanController::destroyarsip/$1', ['as' => 'buktipelaporan/destroyarsip']);
   $routes->get('/buktipelaporan/destroysekre/(:num)', 'BuktiPelaporanController::destroysekre/$1', ['as' => 'buktipelaporan/destroysekre']);
   // $routes->post('/bukti/(:num)', 'BuktiPelaporanController::update/$1', ['as' => 'buktipelaporan/update']);
   $routes->group('buktipelaporan', function ($routes) {
      $routes->add('terima/(:num)', 'BuktiPelaporanController::terima/$1');
      $routes->add('tolak/(:num)', 'BuktiPelaporanController::tolak/$1');
      $routes->add('setuju/(:num)', 'BuktiPelaporanController::setuju/$1');
      $routes->add('batal/(:num)', 'BuktiPelaporanController::batal/$1');
       });

       $routes->group('pelaporann', function ($routes) {
     
         $routes->add('backup/(:num)', 'PelaporanController::backup/$1');
          });
   

   // $routes->post('/verifikasi/update_status/(:num)', 'Verifikasi::update_status/$1');

      // bab2lakip
      $routes->get('/bab2lakip', 'Bab2lakipController::index', ['as' => 'bab2lakip/index']);
      $routes->get('/bab2lakip/create', 'Bab2lakipController::create', ['as' => 'bab2lakip/create']);
      $routes->post('/bab2lakip/store', 'Bab2lakipController::store', ['as' => 'bab2lakip/store']);
      $routes->get('/bab2lakip/show/(:num)', 'Bab2lakipController::show/$1', ['as' => 'bab2lakip/show']);
      $routes->get('/bab2lakip/edit/(:num)', 'Bab2lakipController::edit/$1', ['as' => 'bab2lakip/edit']);    
      $routes->post('/bab2lakip/update/(:num)', 'Bab2lakipController::update/$1', ['as' => 'bab2lakip/update']);
      $routes->get('/bab2lakip/delete/(:num)', 'Bab2lakipController::destroy/$1', ['as' => 'bab2lakip/delete']);

      //  penatausahaanseretariat
    $routes->get('/penatausahaan_sekre', 'PenatausahaanSekreController::index', ['as' => 'penatausahaan_sekre/index']);
    $routes->get('/penatausahaan_sekre/create', 'PenatausahaanSekreController::create', ['as' => 'penatausahaan_sekre/create']);
    $routes->post('/penatausahaan_sekre/store', 'PenatausahaanSekreController::store', ['as' => 'penatausahaan_sekre/store']);
    $routes->get('/penatausahaan_sekre/show/(:num)', 'PenatausahaanSekreController::show/$1', ['as' => 'penatausahaan_sekre/show']);
    $routes->get('/penatausahaan_sekre/edit/(:num)', 'PenatausahaanSekreController::edit/$1', ['as' => 'penatausahaan_sekre/edit']);    
    $routes->post('/penatausahaan_sekre/update/(:num)', 'PenatausahaanSekreController::update/$1', ['as' => 'penatausahaan_sekre/update']);
    $routes->get('/penatausahaan_sekre/delete/(:num)', 'PenatausahaanSekreController::destroy/$1', ['as' => 'penatausahaan_sekre/delete']);
    
    $routes->add('/penatausahaan_sekre/createDetail/(:num)', 'PenatausahaanSekreController::createDetail/$1');
    $routes->post('/penatausahaan_sekre/storeDetail', 'PenatausahaanSekreController::storeDetail');
    $routes->add('/penatausahaan_sekre/showDetail/(:num)', 'PenatausahaanSekreController::showDetail/$1');
    $routes->get('/penatausahaan_sekre/destroyDetail/(:num)', 'PenatausahaanSekreController::destroyDetail/$1', ['as' => 'penatausahaan_sekre/destroyDetail']);

    $routes->add('/penatausahaan_sekre/createDetailTugas/(:num)', 'PenatausahaanSekreController::createDetailTugas/$1');
    $routes->post('/penatausahaan_sekre/storeDetailTugas', 'PenatausahaanSekreController::storeDetailTugas');
    $routes->add('/penatausahaan_sekre/showDetailTugas/(:num)', 'PenatausahaanSekreController::showDetailTugas/$1');
    $routes->get('/penatausahaan_sekre/destroyDetailTugas/(:num)', 'PenatausahaanSekreController::destroyDetailTugas/$1', ['as' => 'penatausahaan_sekre/destroyDetailTugas']);

    $routes->get('/penatausahaan_sekre/createDetailTugas2/(:num)', 'PenatausahaanSekreController::createDetailTugas2/$1');
    $routes->post('/penatausahaan_sekre/storeDetailTugas2', 'PenatausahaanSekreController::storeDetailTugas2');
    $routes->get('/penatausahaan_sekre/showDetailTugas2/(:num)', 'PenatausahaanSekreController::showDetailTugas2/$1');
    $routes->get('/penatausahaan_sekre/destroydetailtugas2/(:num)', 'PenatausahaanSekreController::destroydetailtugas2/$1', ['as' => 'penatausahaan_sekre/destroydetailtugas2']);

   // $routes->get('/penatausahaan_sekre/showDetailTugas2/(:num)', 'PenatausahaanSekreController::showDetailTugas2/$1', ['as' => 'showDetailTugas2']);



    $routes->get('/penatausahaan_sekre/previewCetak/(:num)', 'PenatausahaanSekreController::previewCetak/$1');
    $routes->get('/penatausahaan_sekre/cetak/(:num)', 'PenatausahaanSekreController::cetak/$1');

    // ikk
    $routes->get('/ikk', 'IKKController::index', ['as' => 'ikk/index']);
    $routes->get('/ikk/create', 'IKKController::create', ['as' => 'ikk/create']);
    $routes->post('/ikk/store', 'IKKController::store', ['as' => 'ikk/store']);
    $routes->get('/ikk/show/(:num)', 'IKKController::show/$1', ['as' => 'ikk/show']);
    $routes->get('/ikk/edit/(:num)', 'IKKController::edit/$1', ['as' => 'ikk/edit']);    
    $routes->post('/ikk/update/(:num)', 'IKKController::update/$1', ['as' => 'ikk/update']);
    $routes->get('/ikk/delete/(:num)', 'IKKController::destroy/$1', ['as' => 'ikk/delete']);
    
    $routes->get('/ikk/preview', 'IKKController::preview');
    $routes->get('/ikk/cetak', 'IKKController::cetak');
   
?>
