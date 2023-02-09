<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Musim</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a type="button" href="<?= site_url("ControllerMusim/insert_musim"); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Musim</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($musims as $musim): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $musim->musim ?></td>
                                        <td><?=
                                          anchor(site_url('controllerMusim/edit_musim_form/'.$musim->id_musim),'<i class="fas fa-edit"></i> Edit',
                                            'class="btn btn-danger" title="Edit Data"')." "
                                          .anchor(site_url('controllerMusim/hapus_musim_action/'.$musim->id_musim),'<i class="fa fa-archive"></i> Hapus',
                                            'data-nama="'.$musim->musim.'" class="btn btn-primary hapus" title="Hapus Data"') ?></td>
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
</section>
<script src="<?= base_url('vendor') ?>/plugins/jquery/jquery.min.js"></script>

<script>

    $(document).on('click', '.hapus', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        let nama = $(this).data('nama');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data " + nama + " akan dihapus!",
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