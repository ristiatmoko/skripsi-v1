<html>

<head>
    <title>Print Laporan</title>
</head>
<style>
    body {
        margin-top: 0cm;
        margin-left: 0cm;
        margin-right: 0cm;
        margin-bottom: 0cm;
        font-family: "Times New Roman";
    }

    table tr td {
        font-size: 15px;
        padding: 5px;
    }
</style>

<body>

    <center>
        <table width="100%" cellspacing="0">
            <tr>
                <td width="20%"><img src="<?= base_url('assets/logo_smk.jpeg') ?>" style="width: 50%;"></td>
                <td><h2>LAPORAN HASIL SPK PEMILIHAN JURUSAN SMK</h2></td>
            </tr>
        </table>
        
    </center>

    <table width="100%" cellspacing="0" border="1" style="margin-top: 30px;">
        <tr>
            <td style="text-align: center; background-color: #A9A9A9;">Siswa</td>
            <td style="text-align: center; background-color: #A9A9A9;">Rekomendasi Jurusan</td>
        </tr>
        <?php foreach ($siswa as $value) : ?>
            <tr>
                <td><?= $value->nama_lengkap ?></td>
                <td><?= $value->rekomendasi_jurusan ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <script>
        window.print();
    </script>

</body>

</html>