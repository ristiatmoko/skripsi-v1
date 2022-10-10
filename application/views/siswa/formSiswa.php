<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= $action; ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <?php
                                if ($aksi == 'edit') {
                                    $tipe = "hidden";
                                    $label = '';
                                } else {
                                    $tipe = "text";
                                    $label = 'No Punggung';
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate"><?= $label ?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="<?= $tipe ?>" id="nisn" name="nisn" value="<?= $nisn; ?>" class="form-control" placeholder="Ketikkan No Punggung">
                                        <span class="text-danger"><?= form_error('nisn') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Nama Pemain</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap; ?>" class="form-control" placeholder="Ketikkan nama lengkap">
                                        <span class="text-danger"><?= form_error('nama_lengkap') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Posisi</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="" selected disabled>--Pilih--</option>
                                            <option value="Goalkeeper" <?= ($jenis_kelamin == "G") ? "selected" : ""; ?>>Goalkeeper</option>
                                            <option value="Defenders" <?= ($jenis_kelamin == "D") ? "selected" : ""; ?>>Defender</option>
                                            <option value="Midfielders" <?= ($jenis_kelamin == "M") ? "selected" : ""; ?>>Midfielder</option>
                                            <option value="Attackers" <?= ($jenis_kelamin == "A") ? "selected" : ""; ?>>Attackers</option>
                                        </select>
                                        <span class="text-danger"><?= form_error('jenis_kelamin') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('controllerSiswa'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>