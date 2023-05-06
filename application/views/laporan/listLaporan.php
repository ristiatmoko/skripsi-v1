<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Laporan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table id="mytable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama Pemain</th>
                                            <th>S</th>
                                            <th>V</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($nilaiS as $i => $row) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->nama_lengkap ?></td>
                                                <td><?= $row->s ?></td>
                                                <td><?= $row->v ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        let t = $('#mytable').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis'],
        });
        t.buttons().container().insertBefore('#mytable_filter');
    });
</script>