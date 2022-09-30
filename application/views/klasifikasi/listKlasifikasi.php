<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Data Klasifikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <a type="button" href="<?= site_url("controllerKlasifikasi/insert_klasifikasi"); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table id="mytable_klasifikasi" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Siswa</th>
                                        <th>C1 <br>Absensi</th>
                                        <th>C2 <br> Penghasilan Orang Tua</th>
                                        <th>C3 <br> Nilai Rapot</th>
                                        <th>C4 <br> Prestasi</th>
                                        <th>C5 <br> Hasil Tes</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
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

        var t = $("#mytable_klasifikasi").dataTable({
            "processing": true,
            "serverSide": true,
            "oLanguage": {
                sProcessing: "Loading. . ."
            },
            "ajax": {
                "url": "<?= site_url('ControllerKlasifikasi/json') ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "id_klasifikasi",
                    "orderable": false,
                    "className": "text-center"
                },
                {
                    "data": "nama_lengkap"
                },
                {
                    "data": "absensi"
                },
                {
                    "data": "penghasilan_ortu"
                },
                {
                    "data": "nilai_rapot"
                },
                {
                    "data": "prestasi"
                },
                {
                    "data": "hasil_tes"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [
                [0, 'desc']
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

<script>

    $('#mytable_klasifikasi').on('click', '.hapus', function(e) {

        event.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
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