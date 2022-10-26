<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Statistik</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a type="button" href="<?= site_url("ControllerStatistik/insert_statistik"); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Gol</th>
                                    <th>Assist</th>
                                    <th>Main</th>
                                    <th>Merah</th>
                                    <th>Kuning</th>
                                    <th>MOTM</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($statistiks as $statistik): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $statistik->nama_lengkap ?></td>
                                        <td><?= $statistik->gol ?></td>
                                        <td><?= $statistik->assist ?></td>
                                        <td><?= $statistik->main ?></td>
                                        <td><?= $statistik->kartu_merah ?></td>
                                        <td><?= $statistik->kartu_kuning ?></td>
                                        <td><?= $statistik->motm ?></td>
                                        <td><?=
                                          anchor(site_url('ControllerStatistik/edit_statistik_form/'.$statistik->id_statistik),'<i class="fas fa-edit"></i> Edit',
                                            'class="btn btn-success" title="Edit Data"')." "
                                          .anchor(site_url('ControllerStatistik/hapus_musim_action/'.$statistik->id_statistik),'<i class="fa fa-archive"></i> Hapus',
                                            'data-nama="'.$statistik->id_statistik.'" class="btn btn-danger hapus" title="Hapus Data"') ?></td>
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