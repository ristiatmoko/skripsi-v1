<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= base_url('controllerAdmin/insert') ?>" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="username">Username </span>
                                        </label>
                                        <input type="text" id="username" name="username"  class="form-control" placeholder="Masukan Username" required>
                                        <span class="text-danger"><?= form_error('username') ?></span>
                                    </div>
                                </div>
                                    
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="password">Password</span>
                                        </label>
                                        <input type="text" id="password" name="password" class="form-control" placeholder="Masukan Password" value="" required>
                                        
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mytable_admin" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Username</th>
                                        <th width="15%">Password</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td style="text-align: ;"><?= $user->username ?></td>
                                            <td style="text-align: ;"><?= $user->password ?></td>
                                            <td><?=
                                            anchor(site_url('ControllerAdmin/edit_admin/'.$user->id),'<i class="fas fa-edit"></i> Edit',
                                                'class="btn btn-danger" title="Edit Data"')." "
                                            .anchor(site_url('ControllerAdmin/hapus_admin/'.$user->id),'<i class="fa fa-archive"></i> Hapus',
                                                'data-user="'.$user->username.'" class="btn btn-primary hapus" title="Hapus Data"') ?></td
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        
    </div>

    <script>
    $(document).ready(function() {
        $('#mytable_admin').dataTable();
    });


    $(document).on('click', '.hapus', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        let user = $(this).data('user');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data " + user + " akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>


   