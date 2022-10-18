<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pertandingan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('controllerKriteria/insert_kriteria_action') ?>" 
                            enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-12">Musim</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="tipe" required>
                                            <option value="" selected>--Pilih--</option>
                                            <option value="Benefit">Benefit</option>
                                            <option value="Cost">Cost</option>
                                        </select>
                                        <span class="text-danger"><?= form_error('tipe') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="nama_kriteria">Versus</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control" placeholder="Ketikkan Nama Kriteria" required>
                                        <span class="text-danger"><?= form_error('nama_kriteria') ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="nama_kriteria">Tanggal</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="date" id="nama_kriteria" name="nama_kriteria" class="form-control" placeholder="Ketikkan Nama Kriteria" required>
                                        <span class="text-danger"><?= form_error('nama_kriteria') ?></span>
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