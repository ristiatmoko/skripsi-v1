<!-- <div class="wrapper"> -->
<!-- <div class="container-fluid"><section class="content"> -->
    <div class="container-fluid">
    <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <?php foreach($posisitions as $key => $pos): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat m-b-30">
                                <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-cube-outline float-right mb-0"></i>
                                    </div>
                                    <h6 class="text-uppercase mb-0"><?= $key ?></h6>
                                </div>
                                <div class="card-body">
                                    <div class="border-bottom pb-4">
                                        <span class="badge badge-success"> +11% </span> <span class="ml-2 text-muted">Top Perfom</span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No. Punggung</th>
                                                    <!-- <th>Username</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pos as $k => $player): ?>
                                                <tr>
                                                    <th scope="row"><?= $k + 1 ?></th>
                                                    <td><?= $player->nama_lengkap ?></td>
                                                    <td><?= $player->no_punggung ?></td>
                                                    <!-- <td>@mdo</td> -->
                                                </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Pemain</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- <div class="form-group">
                            <a type="button" href="<?= site_url("controllerSiswa/insert_siswa"); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a>
                        </div> -->
                        <div class="table-responsive">
                            <table id="mytable_siswa" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="">No</th>
                                        <th>Pemain</th>
                                        <!-- <th>Pertandingan</th> -->
                                        <th>Musim</th>
                                        <th>TB</th>
                                        <th>BB</th>
                                        <th>Gol</th>
                                        <th>Assist</th>
                                        <th>Main</th>
                                        <th>Merah</th>
                                        <th>Kuning</th>
                                        <th>MOTM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; ?>
                                <?php foreach ($homes as $home): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $home->nama_lengkap ?> <br>
                                            <small>
                                                <?= $home->umur ?>th (<?= $home->posisi ?>)
                                            </small>        
                                        </td>
                                        <!-- <td><?= empty($home->versus) ? '-' : $home->versus ?></td> -->
                                        <td><?= empty($home->musim) ? '2022' : $home->musim ?></td>
                                        <td><?= empty($home->tinggi_badan) ? '-' : $home->tinggi_badan ?> cm</td> 
                                        <td><?= empty($home->berat_badan) ? '-' : $home->berat_badan ?> kg</td>
                                        <td><?= empty($home->gol) ? '-' : $home->gol ?></td>
                                        <td><?= empty($home->assist) ? '-' : $home->assist ?></td>
                                        <td><?= empty($home->main) ? '-' : $home->main ?></td>
                                        <td><?= empty($home->kartu_merah) ? '-' : $home->kartu_merah ?></td>
                                        <td><?= empty($home->kartu_kuning) ? '-' : $home->kartu_kuning ?></td>
                                        <td><?= empty($home->motm) ? '-' : $home->motm ?></td>
                                        <!-- <td><?=
                                          anchor(site_url('ControllerPertandingan/edit_pertandingan_form/'.$pertandingan->id_pertandingan),'<i class="fas fa-edit"></i> Edit',
                                            'class="btn btn-success" title="Edit Data"')." "
                                          .anchor(site_url('ControllerPertandingan/hapus_pertandingan_action/'.$pertandingan->id_pertandingan),'<i class="fa fa-archive"></i> Hapus',
                                            'data-nama="'.$pertandingan->versus.'" class="btn btn-danger hapus" title="Hapus Data"') ?></td> -->
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