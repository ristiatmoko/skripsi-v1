<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Proses WP Hitung Nilai S</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/prosesHitung') ?>" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-md-12" for="bdate">Pilih Siswa</span>
                                    </label>
                                    <div class="col">
                                        <select name="nisn" id="nisn" class="form-control" required>
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($allSiswa as $value) { ?>
                                                <option value="<?= $value->nisn ?>"><?= $value->nama_lengkap ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 5px;">
                                <label for="">Nilai :</label>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        Bahasa Indonesia
                                    </div>
                                    <div class="col-md-3">
                                        Bahasa Inggris
                                    </div>
                                    <div class="col-md-3">
                                        MTK
                                    </div>
                                    <div class="col-md-3">
                                        IPA
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="bhs_indo" value="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="bhs_ingris" value="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="mtk" value="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="ipa" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px;">
                                <button type="submit" class="btn btn-primary">Hitung Nilai S</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>

<?php if (!empty($this->session->nilaiS)) { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Hitung Nilai S</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="nilaiS" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama</th>
                                            <th>Kode Jurusan</th>
                                            <th>S</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($nilaiS as $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_lengkap ?></td>
                                                <td><?= $value->kode_jurusan ?></td>
                                                <td><?= $value->s ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="<?= site_url('ControllerHasil/sesi_hitung_v') ?>" class="btn btn-primary">Lanjut Proses Hitung Nilai V</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($this->session->nilaiV)) { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hitung Hasil ( Nilai V )</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/hitung_nilai_v') ?>" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-12" for="bdate">Pilih Siswa</span>
                                        </label>
                                        <div class="col">
                                            <select name="nisn" id="nisn" class="form-control" required>
                                                <option value="" disabled selected>--Pilih--</option>
                                                <?php foreach ($allSiswa as $value) { ?>
                                                    <option value="<?= $value->nisn ?>"><?= $value->nama_lengkap ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 15px;">
                                    <button type="submit" class="btn btn-primary">Lanjutkan Hitung V</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($this->session->data_siswa)) { ?>
    <?php
    $nisn = $this->session->data_siswa["nisn"];
    $get_nama = $this->db->query("SELECT nisn, nama_lengkap FROM siswa WHERE nisn='$nisn'")->row();
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil WP <?= $get_nama->nisn . " - " . $get_nama->nama_lengkap ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $nisn = $this->session->data_siswa["nisn"];
                            $data_hasil = $this->db->query("SELECT * FROM proses_hitung WHERE nisn='$nisn'")->result();
                            // print_r($data_hasil);die;
                            ?>
                            <?php foreach ($data_hasil as $value) { ?>
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; background-color:antiquewhite;">Vektor S <?= $value->kode_jurusan ?></td>
                                                <td style="text-align: center; background-color:antiquewhite;">Vektor V <?= $value->kode_jurusan ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><?= $value->s ?></td>
                                                <td style="text-align: center;"><?= $value->v ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                            <?php
                            $rekomendasi_jurusan = $this->db->query("SELECT MAX(v) nilai_tertinggi, kode_jurusan, (SELECT jurusan FROM jurusan WHERE proses_hitung.kode_jurusan=jurusan.kode_jurusan) as jurusan FROM proses_hitung WHERE nisn='$nisn' GROUP BY kode_jurusan
                        ORDER BY MAX(v) DESC")->row();
                            // print_r($rekomendasi_jurusan);die;
                            // , (SELECT jurusan FROM alternatif as b WHERE b.kode_jurusan=a.kode_jurusan) as hasil_jurusan 
                            ?>
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Rekomendasi Jurusan</h4>
                                    <?= $rekomendasi_jurusan->jurusan ?>
                                </div>
                            </div>
                            <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/simpanHitung') ?>" enctype="multipart/form-data" id="form1">
                                <input type="hidden" name="nisn_hasil" value="<?= $nisn ?>">
                                <input type="hidden" name="jurusan" value="<?= $rekomendasi_jurusan->jurusan ?>">
                                <div class="col-md-12">
                                    <div class="border border-light p-3 mb-4">
                                        <div class="text-center">
                                            <a href="#" onclick="document.getElementById('form1').submit();" class="btn btn-app">
                                                <i class="fas fa-save"></i> Simpan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<script src="<?= base_url('vendor') ?>/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nilaiS').dataTable();
    });
</script>