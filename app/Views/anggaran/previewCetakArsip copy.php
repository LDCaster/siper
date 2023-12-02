<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Arsip</title>
   
    <style>
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            box-sizing: border-box;
        }       

        table {
        border-collapse: collapse;
        width: 100%;
        }

        table, th, td {
          border: 1px solid black;
        }

        th {
          padding: 10px;
        }

        td {
          padding: 10px;
          vertical-align: top;
        }

        td.label {
        width: 20%;
        }

        .heading-2 {
        text-align: center;
        padding-top: 10px;
        padding-bottom: 20px;
        }

        /* Gaya tambahan untuk sub-tabel */
        .sub-table {
        width: 100%;
        border-collapse: collapse;
        }

        .sub-table th, .sub-table td {
        border: 1px solid black;
        padding: 10px;
        vertical-align: top;
        }
    </style>
</head>
<body>
<div class="container">
<table>
  <tr>
    <th colspan="2">Dokumen Pelaksanaan Anggaran Daerah <br> 
    Satuan Kerja Perangkar Kerja</th>
    <th rowspan="2">Formulir <br> DPA PERJANJIAN BELANJA <br> SKPD</th>
  </tr>
  <tr>
    <td class="heading-2" colspan="2">Kab. Tanah Laut <br> Tahun Anggaran </td>
  </tr>
  <tr>
    <td class="label">Urusan Pemerintahan</td>
    <td colspan="3">: <?= $anggaran[0]['urusan'] ?></td>
  </tr>
  <tr>
    <td class="label">Bidang Urusan</td>
    <td colspan="3">: URUSAN PEMERINTAHAN BIDANG KEARSIPAN</td>
  </tr>
  <tr>
    <td class="label">Program</td>
    <td colspan="3">: <?= $anggaran[0]['program'] ?></td>
  </tr>
  <tr>
    <td class="label">Sasaran Program</td>
    <td colspan="2">: <?= $anggaran[0]['kelompok_sasaran'] ?></td>
  </tr>
  <tr>
    <td  class="label">Capaian Program</td>
    <td colspan="2">
      <table class="sub-table">
        <tr>
          <th>Indikator</th>
          <th>Target</th>
        </tr>
        <tr>
          <td><?= $anggaran[0]['indikator'] ?></td>
          <td><?= $anggaran[0]['target_kinerja'] ?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="label">Sasaran Program</td>
    <td colspan="2">: <?= $anggaran[0]['kelompok_sasaran'] ?></td>
  </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
   <tr>
    <th colspan="3">Indikator Dan Tolok Ukur Kinerja Kegiatan</th>
  </tr>
  <tr>
    <th>Indikator</th>
    <th>Tolok Ukur Kinerja</th>
    <th>Target Kinerja</th>
  </tr>
  <tr>
    <td><?= $anggaran[0]['indikator'] ?></td>
    <td><?= $anggaran[0]['tolok_ukur_kinerja'] ?></td>
    <td><?= $anggaran[0]['target_kinerja'] ?></td>
  </tr>
  <tr>
    <td class="label" colspan="3">Kelompok Sasaran Kegiatan : </td>
  </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td class="label">Sub Kegiatan</td>
    <td colspan="2">: <?= $anggaran[0]['sub_kegiatan'] ?></td>
  </tr>
  <tr>
    <td class="label">Sumber Pendanaan</td>
    <td colspan="2">: <?= $anggaran[0]['sumber_pendanaan'] ?></td>
  </tr>
  <tr>
    <td class="label">Lokasi</td>
    <td colspan="2">: <?= $anggaran[0]['lokasi'] ?></td>
  </tr>
  <tr>
    <td  class="label">Keluaran Sub Kegiatan</td>
    <td colspan="2">
      <table class="sub-table">
        <tr>
          <th>Indikator</th>
          <th>Target</th>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="label">Waktu Pelaksanaan</td>
    <td colspan="2">: <?= $anggaran[0]['waktu_pelaksanaan'] ?></td>
  </tr>
  <tr>
    <td class="label">Keterangan</td>
    <td colspan="2">:</td>
  </tr>
</table>
</div>

</body>
</html>
