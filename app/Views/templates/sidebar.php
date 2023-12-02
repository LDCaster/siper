<?php
$uri = service('uri');
$roles = session('role_id');
?>
<!-- sidebar -->
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <img src="<?= base_url('templates/'); ?>assets/img/selin-bulat.png" alt="logo" width="70" >
            <a href="<?= base_url(); ?>">SI-SELIN </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <img src="<?= base_url('templates/'); ?>assets/img/selin-bulat.png" alt="logo" width="50" class="shadow-light rounded-circle">
        </div>
        <ul class="sidebar-menu" style="font-size: 12px;">
            <?php if (in_array($roles, ['admin', 'sekretaris', 'kasubbag', 'staff', 'perpustakaan', 'kearsipan'])) : ?>
                <?php if (in_array($roles, ['admin', 'sekretaris', 'kasubbag'])) : ?>
                    <li class="menu-header">Dashboard</li>
                    <?php 
                    $menus1 = [
                        [
                            'text' => 'Dashboard',
                            'icon' => 'fas fa-fire',
                            'segments' => ['dashboard'],
                            'submenus' => [
                                ['text' => 'Dashboard', 'url' => '/'],
                            ],
                        ],
                        [
                            'text' => 'Master',
                            'icon' => 'fas fa-brain',
                            'segments' => ['urusan', 'indikator-kinerja-urusan', 'program', 'kegiatan', 'sub-kegiatan', 'indikator', 'satuan', 'karyawan'],
                            'submenus' => [
                                // ['text' => 'Urusan', 'url' => 'urusan'],
                                // ['text' => 'Program', 'url' => 'program'],
                                // ['text' => 'Kegiatan', 'url' => 'kegiatan'],
                                ['text' => 'Sub Kegiatan', 'url' => 'sub-kegiatan'],
                                ['text' => 'Indikator Kinerja Urusan', 'url' => 'indikator-kinerja-urusan'],
                                // ['text' => 'Indikator Sub Kegiatan', 'url' => 'indikator'],
                                ['text' => 'Satuan', 'url' => 'satuan'],
                                ['text' => 'Pohon Kinerja', 'url' => 'pohonkinerja'],
                                ['text' => 'Kinerja Bidang', 'url' => 'kinerjabidang'],
                                ['text' => 'IKK', 'url' => 'ikk'],
                                ['text' => 'Karyawan', 'url' => 'karyawan'],
                                ['text' => 'User', 'url' => 'user'],
                            ],
                        ],
                    ];

                    foreach ($menus1 as $menu1) :
                        $isActive = in_array($uri->getSegment(1), $menu1['segments']) ? ' active' : '';
                        ?>
                        <li class="nav-item dropdown<?= $isActive; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="<?= $menu1['icon']; ?>"></i>
                                <span><?= $menu1['text']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menu1['submenus'] as $submenu) : ?>
                                    <li><a class="nav-link" style="font-size: 11px;" href="<?= base_url($submenu['url']); ?>"><span title="<?= $submenu['text']; ?>"><?= mb_strimwidth($submenu['text'], 0, 25, '...'); ?></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (in_array($roles, ['admin', 'sekretaris', 'kasubbag'])) : ?>
                    <li class="menu-header">Utama</li>
                    <?php
                    $menus = [
                        [
                            'text' => 'Perencanaan',
                            'icon' => 'fas fa-ruler-combined',
                            'segments' => ['perencanaan'],
                            'submenus' => [
                                // ['text' => 'Data Dukung', 'url' => 'ddperencanaan'],
                                ['text' => 'Rakortekbang Perpustakaan', 'url' => 'perencanaan/index/rakor'],
                                ['text' => 'Rakortekbang Kearsipan', 'url' => 'perencanaan/indexarsip/rakor'],
                                ['text' => 'RENJA', 'url' => 'perencanaan/index/renja'],
                            ],
                        ],
                        [
                            'text' => 'Penganggaran',
                            'icon' => 'fas fa-money-check',
                            'segments' => ['penganggaran'],
                            'submenus' => [
                                // ['text' => 'Data Dukung', 'url' => 'ddanggaran'],
                                ['text' => 'DPA Bidang Perpustakaan', 'url' => '/anggaran/index/perpustakaan'],
                                ['text' => 'DPA Bidang Penyelenggaraan Kearsipan', 'url' => '/anggaran/index/kearsipan'],
                                ['text' => 'DPA Bidang Sekretariat', 'url' => '/anggaran/index/sekretariat'],
                            ],
                        ],
                        [
                            'text' => 'Penatausahaan',
                            'icon' => 'fas fa-users',
                            'segments' => ['penatausahaan'],
                            'submenus' => [
                                ['text' => 'Data Dukung', 'url' => 'ddpenatausahaan'],
                                ['text' => 'Perjanjian Kinerja Bidang Perpustakaan', 'url' => 'penatausahaan'],
                                ['text' => 'Perjanjian Kinerja Bidang Penyelenggaraan Kearsipan', 'url' => 'penatausahaan_arsip'],
                                ['text' => 'Perjanjian Kinerja Bidang Sekretariat', 'url' => 'penatausahaan_sekre'],
                            ],
                        ],
                        [
                            'text' => 'Pelaporan',
                            'icon' => 'fas fa-chart-line',
                            'segments' => ['pelaporan'],
                            'submenus' => [
                                ['text' => 'Data Dukung', 'url' => 'ddpelaporan'],
                                ['text' => 'LPPD', 'url' => 'pelaporanlppd'],
                                ['text' => 'LAKIP', 'url' => 'pelaporan'],
                            ],
                        ],
                    ];
                    foreach ($menus as $menu) :
                        $isActive = in_array($uri->getSegment(1), $menu['segments']) ? ' active' : '';
                        ?>
                        <li class="nav-item dropdown<?= $isActive; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="<?= $menu['icon']; ?>"></i>
                                <span><?= $menu['text']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menu['submenus'] as $submenu) : ?>
                                    <li><a class="nav-link" style="font-size: 11px;" href="<?= base_url($submenu['url']); ?>"><span title="<?= $submenu['text']; ?>"><?= mb_strimwidth($submenu['text'], 0, 25, '...'); ?></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (in_array($roles, ['staff', 'admin', 'sekretaris', 'kasubbag'])) : ?>
                    <li class="menu-header">Ringkasan</li>
                    <?php
                    $menus2 = [
                        [
                            'text' => 'Kesinambungan Kinerja',
                            'icon' => 'fas fa-random',
                            'segments' => ['kesinambungan-kinerja'],
                            'submenus' => [
                                ['text' => 'Kesinambungan Kinerja', 'url' => 'kesinambungan'],
                            ],
                        ],
                    ];

                    foreach ($menus2 as $menu2) :
                        $isActive = in_array($uri->getSegment(1), $menu2['segments']) ? ' active' : '';
                        ?>
                        <li class="nav-item dropdown<?= $isActive; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="<?= $menu2['icon']; ?>"></i>
                                <span><?= $menu2['text']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menu2['submenus'] as $submenu) : ?>
                                    <li><a class="nav-link" style="font-size: 11px;" href="<?= base_url($submenu['url']); ?>"><span title="<?= $submenu['text']; ?>"><?= mb_strimwidth($submenu['text'], 0, 25, '...'); ?></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (in_array($roles, ['admin','perpustakaan'])) : ?>
                    <li class="menu-header">Bukti Pelaporan</li>
                    <?php
                    $menus3 = [
                        [
                            'text' => 'Bukti Pelaporan',
                            'icon' => 'fas fa-id-card-alt',
                            'segments' => ['bukti'],
                            'submenus' => [
                                ['text' => 'Bidang Perpustakaan', 'url' => 'buktipelaporanperpus'],
                                // ['text' => 'Bidang Kearsipan', 'url' => 'buktipelaporanarsip'],
                            ],
                        ],
                    ];

                    foreach ($menus3 as $menu3) :
                        $isActive = in_array($uri->getSegment(1), $menu3['segments']) ? ' active' : '';
                        ?>
                        <li class="nav-item dropdown<?= $isActive; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="<?= $menu3['icon']; ?>"></i>
                                <span><?= $menu3['text']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menu3['submenus'] as $submenu) : ?>
                                    <li><a class="nav-link" style="font-size: 11px;" href="<?= base_url($submenu['url']); ?>"><span title="<?= $submenu['text']; ?>"><?= mb_strimwidth($submenu['text'], 0, 25, '...'); ?></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (in_array($roles, ['admin', 'kearsipan'])) : ?>
                    <li class="menu-header">Bukti Pelaporan</li>
                    <?php
                    $menus4 = [
                        [
                            'text' => 'Bukti Pelaporan',
                            'icon' => 'fas fa-id-card-alt',
                            'segments' => ['bukti'],
                            'submenus' => [
                                // ['text' => 'Bidang Perpustakaan', 'url' => 'buktipelaporanperpus'],
                                ['text' => 'Bidang Kearsipan', 'url' => 'buktipelaporanarsip'],
                            ],
                        ],
                    ];

                    foreach ($menus4 as $menu4) :
                        $isActive = in_array($uri->getSegment(1), $menu4['segments']) ? ' active' : '';
                        ?>
                        <li class="nav-item dropdown<?= $isActive; ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="<?= $menu4['icon']; ?>"></i>
                                <span><?= $menu4['text']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($menu4['submenus'] as $submenu) : ?>
                                    <li><a class="nav-link" style="font-size: 11px;" href="<?= base_url($submenu['url']); ?>"><span title="<?= $submenu['text']; ?>"><?= mb_strimwidth($submenu['text'], 0, 25, '...'); ?></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </aside>
</div>
<!-- sidebar -->
