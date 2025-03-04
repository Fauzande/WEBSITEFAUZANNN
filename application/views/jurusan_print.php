
<html>
<head>
    <title>Cetak Jurusan</title>
</head>
<body>
<script type="text/javascript">
    window.print();
</script>
    <h2>Daftar Jurusan</h2>

    <table border="1" width="100%" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Nama Jurusan</th>
                <th>Kode Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jurusan as $jjs): ?>
            <tr>
                <td><?= $jjs->nama_jurusan ?></td>
                <td><?= $jjs->code_jurusan ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
