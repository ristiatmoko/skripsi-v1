<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('controllerAdmin/edit_admin_action/'. $user->id) ?>" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="username">Username </span>
                                        </label>
                                        <input type="text" id="username" name="username"  class="form-control" placeholder="Masukan Username" value="<?= $user->username ?>">
                                        <span class="text-danger"><?= form_error('username') ?></span>
                                    </div>
                                </div>
                                    
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="password">Password</span>
                                        </label>
                                        <input type="text" id="password" name="password" class="form-control" placeholder="Masukan Password" value="<?= $user->password ?>" >
                                        
                                        <span class="text-danger"><?= form_error('password') ?></span>
                                    </div>
                                </div>
                               
                                <div class="col-md-12 ">
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

   