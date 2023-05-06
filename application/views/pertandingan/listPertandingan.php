<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pertandingan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a type="button" href="<?= site_url("ControllerPertandingan/insert_pertandingan"); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Musim</th>
                                        <th>Versus</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($matchs as $pertandingan) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $pertandingan->musim ?></td>
                                            <td><?= $pertandingan->versus ?></td>
                                            <td><?= $pertandingan->tanggal ?></td>
                                            <td><?=
                                                anchor(
                                                    site_url('ControllerPertandingan/edit_pertandingan_form/' . $pertandingan->id_pertandingan),
                                                    '<i class="fas fa-edit"></i> Edit',
                                                    'class="btn btn-danger" title="Edit Data"'
                                                ) . " "
                                                    . anchor(
                                                        site_url('ControllerPertandingan/hapus_pertandingan_action/' . $pertandingan->id_pertandingan),
                                                        '<i class="fa fa-archive"></i> Hapus',
                                                        'data-nama="' . $pertandingan->versus . '" class="btn btn-primary hapus" title="Hapus Data"'
                                                    ) ?></td>
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