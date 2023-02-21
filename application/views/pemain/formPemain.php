<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pemain</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('controllerPemain/insert_pemain_action') ?>" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="no_pungung">Nomer Punggung </span>
                                        </label>
                                        <input type="number" id="no_punggung" name="no_punggung"  class="form-control" placeholder="Ketikkan No Punggung">
                                        <span class="text-danger"><?= form_error('no_punggung') ?></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Pemain</span>
                                        </label>
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Ketikkan nama lengkap">
                                        <span class="text-danger"><?= form_error('nama_lengkap') ?></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="posisi">Posisi</span>
                                        </label>
                                        <select id="posisi" class="form-control" name="posisi" required> 
                                            <option value="" selected disabled>--Pilih--</option>
                                            <option value="Goalkeeper" >Goalkeeper</option>
                                            <option value="Defenders" >Defender</option>
                                            <option value="Midfielders" >Midfielder</option>
                                            <option value="Attackers" >Attacker</option>
                                        </select>
                                        <span class="text-danger"><?= form_error('posisi') ?></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="tinggi_badan">Tinggi Badan</span>
                                        </label>
                                        <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control" placeholder="Ketikkan Tinggi Badan">
                                        <span class="text-danger"><?= form_error('tinggi_badan') ?></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="berat_badan">Berat Badan</span>
                                        </label>
                                        <input type="number" id="berat_badan" name="berat_badan"  class="form-control" placeholder="Ketikkan Berat Badan">
                                        <span class="text-danger"><?= form_error('berat_badan') ?></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="umur">Umur</span>
                                        </label>
                                        <input type="number" id="umur" name="umur" class="form-control" placeholder="Ketikkan Umur">
                                        <span class="text-danger"><?= form_error('umur') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Simpan</button>
                                    <a type="button" href="<?= site_url('controllerPemain'); ?>" class="btn btn-primary waves-effect waves-light m-r-10">Cancel </a>
                                </div>

                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>