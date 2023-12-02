<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak IKK</title>
   
    <style>
        /* Gaya Container */
        .container {
            width: 100%;
            max-width: 800px; /* Lebar maksimum container */
            margin: 0 auto; /* Membuat container berada di tengah */
            padding: 20px;
            text-align: center; /* Untuk mengatur teks ke tengah */
        }
        /* Gaya Header */
        .header {
            margin-bottom: 20px;
        }
        .header img {
            width: 80px; /* Sesuaikan lebar logo dengan kebutuhan Anda */
            float: left; /* Menggunakan float untuk posisi kiri */
            margin-right: 20px; /* Memberi jarak antara logo dan teks */
        }
        .header .title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-top: 10px; /* Atur margin atas teks agar sedikit turun ke tengah gambar */
        margin-bottom: 20px; /* Atur margin bawah teks */
        padding-top: 10px; 
       margin-right: 100px;
    }
        .clearfix::after { /* Menggunakan clearfix untuk membersihkan float */
            content: "";
            clear: both;
            display: table;
        }
        .line {
            border-bottom: 3px solid #000;
            margin-bottom: 20px;
        }
       
        /* Gaya Tabel */
/* Gaya Tabel *//* Gaya Tabel */
/* Gaya Tabel */
/* Gaya Tabel */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px; /* Jarak antara tabel dan teks di atasnya */
    border: 2px solid #000; /* Garis luar tabel */
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #000; /* Garis bawah pada sel */
    border-top: 1px solid #000; /* Garis atas pada sel */
    border-left: 1px solid #000; /* Garis kiri pada sel */
    border-right: 1px solid #000; /* Garis kanan pada sel */
}

th {
    /* background-color: #000; */
    color: #000; /* Warna teks pada header */
    font-weight: bold;
}

tr {
    border-bottom: 1px solid #000; /* Garis pemisah antara baris */
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}


    </style>
</head>
<body>
<div class="container">
<div class="header clearfix"> <!-- Menggunakan clearfix di div header -->
            <div class="title">
                DATA IKK
            </div>
        </div>
        <!-- garis -->
        <div class="line"></div>

        <!-- Judul -->
        <table>
            <thead>
            <tr>
                    <th>No</th>
                    <th>Urusan Pemerintahan</th>
                    <th>IKK Keluaran</th>
                    <th>IKK Outcome</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($ikk as $item) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['urusan_pemerintahan']; ?></td>
                        <td><?= $item['ikk_keluaran']; ?></td>
                        <td><?= $item['ikk_outcome']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- Tambahkan baris data lainnya sesuai kebutuhan -->
            </tbody>
        </table>
</div>

</body>
</html>
