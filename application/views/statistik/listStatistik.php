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
                            <!-- <a type="button" href="<?= site_url("ControllerStatistik/insert_statistik"); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th width="">No</th>
                                    <th>Pemain</th>
                                    <th>Gol</th>
                                    <th>Assist</th>
                                    <th>Save</th>
                                    <th>Cleansheet</th>
                                    <th>Main</th>
                                    <th>Merah</th>
                                    <th>Kuning</th>
                                    <th>Bunuh Diri</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($statistiks as $statistik): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $statistik->nama_lengkap ?> <br>
                                            <small>
                                                <?= $statistik->umur ?>th (<?= $statistik->posisi ?>)
                                            </small>        
                                        </td>
                                        <td><?= empty($statistik->gol) ? '-' : $statistik->gol ?></td>
                                        <td><?= empty($statistik->assist) ? '-' : $statistik->assist ?></td>
                                        <td><?= empty($statistik->save) ? '-' : $statistik->save ?></td>
                                        <td><?= empty($statistik->clean) ? '-' : $statistik->clean ?></td>
                                        <td><?= empty($statistik->main) ? '-' : $statistik->main ?></td>
                                        <td><?= empty($statistik->kartu_merah) ? '-' : $statistik->kartu_merah ?></td>
                                        <td><?= empty($statistik->kartu_kuning) ? '-' : $statistik->kartu_kuning ?></td>
                                        <td><?= empty($statistik->bunuh_diri) ? '-' : $statistik->bunuh_diri ?></td>
                                        <td><?=
                                          anchor(site_url('ControllerStatistik/update_statistik/'.$statistik->id_statistik),'<i class="fas fa-edit"></i> Edit',
                                            'class="btn btn-danger" title="Edit Data"')." "
                                          .anchor(site_url('ControllerStatistik/hapus_musim_action/'.$statistik->id_statistik),'<i class="fa fa-archive"></i> Hapus',
                                            'data-nama="'.$statistik->id_statistik.'" class="btn btn-primary hapus" title="Hapus Data"') ?></td>
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