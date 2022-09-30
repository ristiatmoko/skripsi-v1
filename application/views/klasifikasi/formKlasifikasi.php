<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Klasifikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= $action; ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="hidden" id="id_klasifikasi" name="id_klasifikasi" value="" class="form-control" placeholder="Ketikkan nis">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Siswa</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select name="nis" id="nis" class="form-control">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($listSiswa as $value) { ?>
                                                <option value="<?= $value->nis ?>" <?= ($nis == $value->nis) ? "selected" : ""; ?>><?= $value->nama_lengkap ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('nis') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Absensi</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select name="absensi" id="absensi" class="form-control">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($listKriteria as $absensi) { ?>
                                                <option value="<?= $absensi->nilai_bobot  ?>"><?= $absensi->nama_kriteria ." - ". $absensi->range_nilai ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('absensi') ?></span>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Penghasilan Ortu</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select name="penghasilan_ortu" id="penghasilan_ortu" class="form-control">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($listKriteria as $penghasilan_ortu) { ?>
                                                <option value="<?= $penghasilan_ortu->nilai_bobot  ?>"><?= $penghasilan_ortu->nama_kriteria ." - ". $penghasilan_ortu->range_nilai ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('penghasilan_ortu') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Nilai Rapot</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select name="nilai_rapot" id="nilai_rapot" class="form-control">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($listKriteria as $nilai_rapot) { ?>
                                                <option value="<?= $nilai_rapot->nilai_bobot  ?>"><?= $nilai_rapot->nama_kriteria ." - ". $nilai_rapot->range_nilai ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('nilai_rapot') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Prestasi</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select name="prestasi" id="prestasi" class="form-control">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($listKriteria as $prestasi) { ?>
                                                <option value="<?= $prestasi->nilai_bobot  ?>"><?= $prestasi->nama_kriteria ." - ". $prestasi->range_nilai ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('prestasi') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Hasil Tes</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select name="hasil_tes" id="hasil_tes" class="form-control">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($listKriteria as $hasil_tes) { ?>
                                                <option value="<?= $hasil_tes->nilai_bobot  ?>"><?= $hasil_tes->nama_kriteria ." - ". $hasil_tes->range_nilai ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('hasil_tes') ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('ControllerKlasifikasi'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>