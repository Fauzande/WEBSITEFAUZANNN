<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Modern</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #000, #1a1a1a, #333, #000);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        p {
            font-size: 1;
            margin-bottom: 20px;
            max-width: 600px;
        }
        .btn {
            background-color:rgb(255, 255, 255);
            color: black;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #ffa500;
        }
    </style>
</head>
<body>
    <h1>Pengaduan Masyarakat</h1>
    <p>sistem apikasi ini untuk di sekolah
    yang di mana jika di kelas ada barang yang rusak nanti siswa bisa nge lapor
    dengan cara isi terlebih dahulu nama,kelas,jurusan apa dan lain lain
    dan bisa di cek oleh wali_kelas,kurikulum,wakil_kepsek,kakomli,admin 
    nanti bakalan di proses,selesai dan bisa di batalkan juga dengan alasan tertentu
    tujuan apikasi ini untuk mempermudah nge lapor lebih cepat dan juga akurat
    </p>
    <a href="<?= base_url('login') ?>" class="btn">Login</a>
</body>
</html>
