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
                            <div class="form-group">
                                <a type="button" target="_BLANK" href="<?= site_url("controllerLaporan/cetak"); ?>" class="btn btn-warning"> <i class="fa fa-print"></i> Cetak</a>
                            </div>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Siswa</th>
                                            <th>Rekomendasi Jurusan</th>
                                        </tr>
                                    </thead>
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
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var u = $("#mytable").dataTable({
            "processing": true,
            "serverSide": true,
            "oLanguage": {
                sProcessing: "Loading. . ."
            },
            "ajax": {
                "url": "<?= site_url('ControllerLaporan/json_hasil') ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "nisn",
                    "orderable": false,
                    "className": "text-center"
                },
                {
                    "data": "nama_lengkap"
                },
                {
                    "data": "rekomendasi_jurusan"
                },
            ],
            order: [
                [1, 'asc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>