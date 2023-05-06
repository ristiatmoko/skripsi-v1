<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Musim</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('ControllerMusim/edit_musim_action/' . $musim->id_musim) ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12" for="musim">Musim</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="musim" name="musim" class="form-control" value="<?= $musim->musim ?>" placeholder="Ketikkan Bobot Prefernsi" required>
                                        <span class="text-danger"><?= form_error('musim') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
                                    <a type="button" href="<?= site_url('ControllerMusim'); ?>" class="btn btn-primary waves-effect waves-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>