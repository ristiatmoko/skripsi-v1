<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Bobot</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= $action; ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="tingkat_kepentingan">Tingkat Kepentingan</span>
                                        </label>
                                        <input type="text" id="tingkat_kepentingan" name="tingkat_kepentingan" value="<?= $tingkat_kepentingan; ?>" class="form-control" placeholder="Ketikkan tingkat kepentingan">
                                        <span class="text-danger"><?= form_error('tingkat_kepentingan') ?></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="nilai_bobot">Nilai Bobot</span>
                                        </label>
                                        <input type="number" name="nilai_bobot" value="<?= $nilai_bobot; ?>" class="form-control" placeholder="Ketuk nilai">
                                        <span class="text-danger"><?= form_error('nilai_bobot') ?></span>
                                    </div>
                                </div>                        
                            </div>

                            <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Simpan</button>
                                    <a type="button" href="<?= site_url('ControllerBobot'); ?>" class="btn btn-primary waves-effect waves-light m-r-10">Cancel </a>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>