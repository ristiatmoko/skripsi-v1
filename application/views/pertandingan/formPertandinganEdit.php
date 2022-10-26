<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pertandingan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('ControllerPertandingan/insert_pertandingan_action') ?>"
                            enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-12" for="bdate">Pilih Musim</span>
                                        </label>
                                        <div class="col">
                                            <select name="id_musim" id="id_musim" class="form-control" required>
                                                <option value="" disabled selected>--Pilih--</option>
                                                <?php foreach ($musim as $value) { ?>
                                                    <option value="<?= $value['id_musim'] ?>"><?= $value['musim'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="versus">Versus</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="versus" name="versus" class="form-control" value="<?= $pertandingan->versus ?>" placeholder="Ketikkan versus" required>
                                        <span class="text-danger"><?= form_error('versus') ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="tanggal">Tanggal</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $pertandingan->tanggal ?>"  placeholder="Ketikkan tanggal" required>
                                        <span class="text-danger"><?= form_error('tanggal') ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('ControllerPertandingan'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>