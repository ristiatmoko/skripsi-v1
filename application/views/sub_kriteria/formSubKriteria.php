<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data sub Kriteria</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= $action; ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Jurusan</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="hidden" id="id_sub_kriteria" name="id_sub_kriteria" value="<?= $id_sub_kriteria; ?>" class="form-control">
                                        <?php
                                        if ($aksi == 'edit') {
                                            $readOnly = 'readonly';
                                        } else {
                                            $readOnly = '';
                                        }
                                        ?>
                                        <select class="form-control" name="kode_jurusan" id="kode_jurusan" <?= $readOnly ?>>
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($allJurusan as $value) { ?>
                                                <option value="<?= $value->kode_jurusan ?>" <?= ($value->kode_jurusan == $kode_jurusan) ? "selected" : "" ?>><?= $value->kode_jurusan . " - " . $value->jurusan ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('kode_jurusan') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Bahasa Indonesia (C1)</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="c1" id="c1">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($allBobot as $value) { ?>
                                                <option value="<?= $value->nilai_bobot ?>" <?= ($value->nilai_bobot == $c1) ? "selected" : "" ?>><?= $value->tingkat_kepentingan . " = " . $value->nilai_bobot ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('c1') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Bahasa Inggris (C2)</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="c2" id="c2">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($allBobot as $value) { ?>
                                                <option value="<?= $value->nilai_bobot ?>" <?= ($value->nilai_bobot == $c2) ? "selected" : "" ?>><?= $value->tingkat_kepentingan . " = " . $value->nilai_bobot ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('c2') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">IPA (C3)</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="c3" id="c3">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($allBobot as $value) { ?>
                                                <option value="<?= $value->nilai_bobot ?>" <?= ($value->nilai_bobot == $c3) ? "selected" : "" ?>><?= $value->tingkat_kepentingan . " = " . $value->nilai_bobot ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('c3') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Matematika (C4)</span>
                                    </label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="c4" id="c4">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($allBobot as $value) { ?>
                                                <option value="<?= $value->nilai_bobot ?>" <?= ($value->nilai_bobot == $c4) ? "selected" : "" ?>><?= $value->tingkat_kepentingan . " = " . $value->nilai_bobot ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="text-danger"><?= form_error('c4') ?></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('ControllerSubKriteria'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>