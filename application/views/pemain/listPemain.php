<!-- <div class="wrapper"> -->
<!-- <div class="container-fluid"><section class="content"> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pemain</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="form-group">
                        <a type="button" href="<?= site_url("ControllerPemain/insert_pemain"); ?>" class="btn btn-success"> </i> Tambah</a>
                    </div>

                    <div class="form-group">
                        <a type="button" href="<?= site_url("ControllerStatistik"); ?>" class="btn btn-danger"></i> Statistik</a>
                    </div>
                    <?php if ($this->session->userdata('message')) : ?>
                        <?= $this->session->flashdata('message'); ?>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table id="mytable_pemain" class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">No Punggung</th>
                                    <th>Nama Pemain</th>
                                    <th>Posisi</th>
                                    <th>TB</th>
                                    <th>BB</th>
                                    <th>Umur</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pemains as $pemain) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td style="text-align: ;"><?= $pemain->no_punggung ?></td>
                                        <td><?= $pemain->nama_lengkap ?></td>
                                        <td><?= $pemain->posisi ?></td>
                                        <td><?= $pemain->tinggi_badan ?></td>
                                        <td><?= $pemain->berat_badan ?></td>
                                        <td><?= $pemain->umur ?></td>
                                        <td><?=
                                            anchor(
                                                site_url('ControllerPemain/edit_pemain/' . $pemain->id_pemain),
                                                '<i class="fas fa-edit"></i> Edit',
                                                'class="btn btn-danger" title="Edit Data"'
                                            ) . " "
                                                . anchor(
                                                    site_url('ControllerPemain/hapus_pemain/' . $pemain->id_pemain),
                                                    '<i class="fa fa-archive"></i> Hapus',
                                                    'data-nama="' . $pemain->nama_lengkap . '" class="btn btn-primary hapus" title="Hapus Data"'
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
<!-- </section>
</div>
</div> -->
<script src="<?= base_url('vendor') ?>/plugins/jquery/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('#mytable_pemain').dataTable();
    });


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