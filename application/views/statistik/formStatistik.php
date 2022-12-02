<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Statistik</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('ControllerStatistik/update_statistik_action/'. $statistik->id_statistik) ?>"
                            enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-12" for="versus">Nama Pemain</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" readonly value="<?= $statistik->nama_lengkap ?>" id="nama_pemain" name="nama_pemain" class="form-control" placeholder="Ketikkan nama pemain" >
                                        <span class="text-danger"><?= form_error('id_pemain') ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-12" for="bdate">Pilih Pertandingan</span>
                                        </label>
                                        <div class="col">
                                            <select name="id_pertandingan" id="id_pertandingan" class="form-control" >
                                                <option value="" disabled selected>--Pilih--</option>
                                                <?php foreach ($pertandingan as $value) { ?>
                                                    <option value="<?= $value->id_pertandingan ?>"><?= $value->versus ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="versus">Gol</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="gol" name="gol" class="form-control"  value="<?= $statistik->gol ?>" placeholder="Ketikkan gol" >
                                        <span class="text-danger"><?= form_error('gol') ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="tanggal">Assist</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="assist" name="assist" class="form-control"  value="<?= $statistik->assist ?>" placeholder="Ketikkan assist" >
                                        <span class="text-danger"><?= form_error('assist') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="tanggal">Main</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="main" name="main" class="form-control" value="<?= $statistik->main ?>" placeholder="Ketikkan main" >
                                        <span class="text-danger"><?= form_error('tanggal') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="tanggal">Kartu Merah</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="kartu_merah" name="kartu_merah" class="form-control" value="<?= $statistik->kartu_merah ?>" placeholder="Ketikkan kartu_merah" >
                                        <span class="text-danger"><?= form_error('kartu_merah') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="tanggal">Kartu Kuning</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="kartu_kuning" name="kartu_kuning" class="form-control" value="<?= $statistik->kartu_kuning ?>" placeholder="Ketikkan kartu_kuning" >
                                        <span class="text-danger"><?= form_error('kartu_kuning') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="tanggal">MOTM</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="motm" name="motm" class="form-control" value="<?= $statistik->motm ?>" placeholder="Ketikkan motm" >
                                        <span class="text-danger"><?= form_error('motm') ?></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit"  class="btn btn-danger waves-effect waves-light">Simpan</button>
                                    <a type="button" href="<?= site_url('ControllerStatistik'); ?>" class="btn btn-primary waves-effect waves-light m-r-10">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>