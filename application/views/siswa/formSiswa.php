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
                                    $label = 'NISN';
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate"><?= $label ?></span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="<?= $tipe ?>" id="nisn" name="nisn" value="<?= $nisn; ?>" class="form-control" placeholder="Ketikkan nisn">
                                        <span class="text-danger"><?= form_error('nisn') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Nama Lengkap</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap; ?>" class="form-control" placeholder="Ketikkan nama lengkap">
                                        <span class="text-danger"><?= form_error('nama_lengkap') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Tanggal Lahir</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir; ?>" class="form-control" placeholder="Ketuk tanggal lahir">
                                        <span class="text-danger"><?= form_error('tanggal_lahir') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-12">Alamat</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Ketikkan alamat"><?= $alamat ?></textarea>
                                        <span class="text-danger"><?= form_error('alamat') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="" selected disabled>--Pilih--</option>
                                            <option value="L" <?= ($jenis_kelamin == "L") ? "selected" : ""; ?>>Laki-laki</option>
                                            <option value="P" <?= ($jenis_kelamin == "P") ? "selected" : ""; ?>>Perempuan</option>
                                        </select>
                                        <span class="text-danger"><?= form_error('jenis_kelamin') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Asal Sekolah</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="<?= $asal_sekolah; ?>" class="form-control" placeholder="Ketikkan asal sekolah">
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