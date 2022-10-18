<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kriteria</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('controllerKriteria/edit_kriteria_action/'.$kriteria->id_kriteria) ?>" 
                            enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="bobot_preferensi">Bobot Prefernsi</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="bobot_preferensi" name="bobot_preferensi" class="form-control" value="<?= $kriteria->bobot_preferensi ?>" placeholder="Ketikkan Bobot Prefernsi" required>
                                        <span class="text-danger"><?= form_error('bobot_preferensi') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="nama_kriteria">Nama Kriteria</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control" value="<?= $kriteria->nama_kriteria ?>" 
                                         placeholder="Ketikkan Nama Kriteria" required>
                                        <span class="text-danger"><?= form_error('nama_kriteria') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Tipe</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="tipe" required>
                                            <option value="" selected>--Pilih--</option>
                                            <option <?= $kriteria->tipe == 'Benefit' ? 'selected' : '' ?> value="Benefit">Benefit</option>
                                            <option <?= $kriteria->tipe == 'Cost' ? 'selected' : '' ?>  value="Cost">Cost</option>
                                        </select>
                                        <span class="text-danger"><?= form_error('tipe') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('controllerKriteria'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>