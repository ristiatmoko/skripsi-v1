<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Proses WP Hitung Nilai S</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/prosesHitung') ?>" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-md-12" for="bdate">Pilih Pemain</span>
                                    </label>
                                    <div class="col">
                                        <select name="id_pemain" id="pilih-pemain" class="form-control" required>
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach ($allPemain as $value) { ?>
                                            <option value="<?= $value->id_pemain ?>"
                                                data-gol="<?= $value->gol ?>"
                                                data-assist="<?= $value->assist ?>"
                                                data-main="<?= $value->main ?>"
                                                data-kartu_merah="<?= $value->kartu_merah ?>"
                                                data-kartu_kuning="<?= $value->kartu_kuning ?>"
                                                data-motm="<?= $value->motm ?>"
                                            ><?= $value->nama_lengkap ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 5px;">
                                <label for="">Nilai :</label>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        C1 (Gol)
                                    </div>
                                    <div class="col-md-2">
                                        C2 (Assist)
                                    </div>
                                    <div class="col-md-2">
                                        C3 (Main)
                                    </div>
                                    <div class="col-md-2">
                                        C4 (Kartu Merah)
                                    </div>
                                    <div class="col-md-2">
                                        C5 (Kartu Kuning)
                                    </div>
                                    <div class="col-md-2">
                                        C6 (Motm)
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="c_gol" name="c_gol" value="" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="c_assist" name="c_assist" value="" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="c_main" name="c_main" value="" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="c_kartu_merah" name="kartu_merah" value="" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="c_kartu_kuning" name="kartu_kuning" value="" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" id="c_motm" name="motm" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px;">
                                <button type="submit" class="btn btn-primary">Hitung Nilai S</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</section>

<?php if (!empty($this->session->nilaiS)) { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil Hitung Nilai S</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="nilaiS" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama</th>
                                            <th>Kode Jurusan</th>
                                            <th>S</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($nilaiS as $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_lengkap ?></td>
                                                <td > - </td>
                                                <td><?= $value->s ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="<?= site_url('ControllerHasil/sesi_hitung_v') ?>" class="btn btn-primary">Lanjut Proses Hitung Nilai V</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($this->session->nilaiV)) { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hitung Hasil ( Nilai V )</h3>
                        </div>
                        <!-- /.card-header -->
                        
                        <div class="card-body">
                            <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/hitung_nilai_v') ?>" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-12" for="bdate">Pilih Pemain</span>
                                        </label>
                                        <div class="col">
                                            <select name="id_pemain" id="id_pemain" class="form-control" required>
                                                <option value="" disabled selected>--Pilih--</option>
                                                <?php foreach ($allPemain as $value) { ?>
                                                    <option value="<?= $value->id_pemain ?>"><?= $value->nama_lengkap ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 15px;">
                                    <button type="submit" class="btn btn-primary">Lanjutkan Hitung V</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($this->session->data_pemain)) { ?>
    <?php
    $id_pemain = $this->session->data_pemain["id_pemain"];
    $get_nama = $this->db->query("SELECT id_pemain, nama_lengkap FROM pemain WHERE id_pemain='$id_pemain'")->row();
    // dd($get_nama);
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil WP <?= $get_nama->id_pemain . " - " . $get_nama->nama_lengkap ?></h3>
                        </div>
                        <!-- /.card-header -->
                      
                        <!-- ---------- -->
                        <div class="card-body">
                            <?php
                            $id_pemain = $this->session->data_pemain["id_pemain"];
                            $data_hasil = $this->db->query("SELECT * FROM proses_hitung WHERE id_pemain='$id_pemain'")->result();
                            // print_r($data_hasil);die;
                            ?>
                            <!-- <?php foreach ($data_hasil as $value) { ?> -->
                                <div class="col-md-12">
                                    <table id="nilaiS" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama</th>
                                                <th>Kode Jurusan</th>
                                                <th>S</th>
                                                <th>W</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($data_hasil as $value) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $get_nama->nama_lengkap ?></td>
                                                    <td > - </td>
                                                    <td><?= $value->s ?></td>
                                                    <td><?= $value->v ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; background-color:antiquewhite;">Nama Lengkap <?= $value->kode_jurusan ?></td>
                                                <td style="text-align: center; background-color:antiquewhite;">Vektor S <?= $value->kode_jurusan ?></td>
                                                <td style="text-align: center; background-color:antiquewhite;">Vektor V <?= $value->kode_jurusan ?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;"><?= $get_nama->nama_lengkap ?></td>
                                                <td style="text-align: center;"><?= $value->v ?></td>
                                                <td style="text-align: center;"><?= $value->v ?></td>
                                            </tr>
                                        </tbody>
                                    </table> -->
                                </div>
                            <!-- <?php } ?> -->
                            <?php
                        //     $rekomendasi_jurusan = $this->db->query("SELECT MAX(v) nilai_tertinggi, kode_jurusan, (SELECT jurusan FROM jurusan WHERE proses_hitung.kode_jurusan=jurusan.kode_jurusan) as jurusan FROM proses_hitung WHERE nisn='$nisn' GROUP BY kode_jurusan
                        // ORDER BY MAX(v) DESC")->row();
                            // print_r($rekomendasi_jurusan);die;
                            // , (SELECT jurusan FROM alternatif as b WHERE b.kode_jurusan=a.kode_jurusan) as hasil_jurusan 
                            ?>
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-check"></i> Rekomendasi Jurusan</h4>
                                    <?= $rekomendasi_jurusan->jurusan ?>
                                </div>
                            </div>
                            <form class="form-material form-horizontal" method="POST" action="<?= site_url('ControllerHasil/simpanHitung') ?>" enctype="multipart/form-data" id="form1">
                                <input type="hidden" name="nisn_hasil" value="<?= $nisn ?>">
                                <input type="hidden" name="jurusan" value="<?= $rekomendasi_jurusan->jurusan ?>">
                                <div class="col-md-12">
                                    <div class="border border-light p-3 mb-4">
                                        <div class="text-center">
                                            <a href="#" onclick="document.getElementById('form1').submit();" class="btn btn-app">
                                                <i class="fas fa-save"></i> Simpan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<script src="<?= base_url('vendor') ?>/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#pilih-pemain').change(function(){
            console.log($(this).find(':selected').data('gol'))
            console.log($(this).find(':selected').data('assist'))
            console.log($(this).find(':selected').data('main'))
            console.log($(this).find(':selected').data('kartu_merah'))
            console.log($(this).find(':selected').data('kartu_kuning'))
            console.log($(this).find(':selected').data('motm'))
            $('#c_gol').val($(this).find(':selected').data('gol'))
            $('#c_assist').val($(this).find(':selected').data('assist'))
            $('#c_main').val($(this).find(':selected').data('main'))
            $('#c_kartu_merah').val($(this).find(':selected').data('kartu_merah'))
            $('#c_kartu_kuning').val($(this).find(':selected').data('kartu_kuning'))
            $('#c_motm').val($(this).find(':selected').data('motm'))
        })
    })
    const ajax=function(url,params,callback){



                let xhr=new XMLHttpRequest();
                xhr.onload=function(){
                    if( this.status==200 && this.readyState==4 )callback.call( this, this.response )
                };
                xhr.open( 'POST', url, true );
                xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                xhr.send( params );
            };

            document.addEventListener('DOMContentLoaded',()=>{
                document.querySelector('select[id="id_pemain"]').addEventListener('change',function(e){
                    ajax( location.href, 'id='+this.value, function(r){
                        if( !r ){
                            alert( 'Bad foo!' );
                            return;
                        }
                        let json=JSON.parse( r );
                        Object.keys( json ).map( k=>{
                            let field=document.querySelector('input[name="'+k+'"]');
                            if( field )field.value=json[k]
                        })

                    });
                });
            });


    $(document).ready(function() {
        $('#nilaiS').dataTable();
    });
</script>