<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pemain</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('controllerPemain/edit_pemain_action/'. $pemain->id_pemain) ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate"></span>
                                    </label>
                                    <!-- <div class="col-md-12">
                                        <input type="text" id="musim" name="musim" class="form-control" value="<?= $musim->musim ?>" placeholder="Ketikkan Bobot Prefernsi" required>
                                        <span class="text-danger"><?= form_error('musim') ?></span>
                                    </div> -->
                                    <div class="col-md-12">
                                        <input type="number" id="no_punggung" name="no_punggung"  class="form-control" value="<?= $pemain->no_punggung ?>" placeholder="Ketikkan No Punggung">
                                        <span class="text-danger"><?= form_error('no_punggung') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Nama Pemain</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $pemain->nama_lengkap ?>"  placeholder="Ketikkan nama lengkap">
                                        <span class="text-danger"><?= form_error('nama_lengkap') ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Posisi</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="posisi" required>
                                            <option value="" selected disabled>--Pilih--</option>
                                            <option <?= $pemain->posisi == 'Goalkeeper' ? 'selected' : '' ?>  value="Goalkeeper" >Goalkeeper</option>
                                            <option <?= $pemain->posisi == 'Defender' ? 'selected' : '' ?>  value="Defenders" >Defender</option>
                                            <option <?= $pemain->posisi == 'Midfielders' ? 'selected' : '' ?>  value="Midfielders" >Midfielder</option>
                                            <option <?= $pemain->posisi == 'Attackers' ? 'selected' : '' ?>  value="Attackers" >Attacker</option>
                                        </select>
                                        <span class="text-danger"><?= form_error('posisi') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Tinggi Badan</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control" value="<?= $pemain->tinggi_badan ?>"   placeholder="Ketikkan Tinggi Badan">
                                        <span class="text-danger"><?= form_error('tinggi_badan') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Berat Badan</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="berat_badan" name="berat_badan"  class="form-control" value="<?= $pemain->berat_badan ?>"   placeholder="Ketikkan Berat Badan">
                                        <span class="text-danger"><?= form_error('berat_badan') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="bdate">Umur</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="number" id="umur" name="umur" class="form-control" val
                                        value="<?= $pemain->umur ?>" placeholder="Ketikkan Umur">
                                        <span class="text-danger"><?= form_error('umur') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('controllerPemain'); ?>" class="btn btn-primary waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>