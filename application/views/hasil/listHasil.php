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
                                                data-save="<?= $value->save ?>"
                                                data-clean="<?= $value->clean ?>"
                                                data-main="<?= $value->main ?>"
                                                data-kartu_merah="<?= $value->kartu_merah ?>"
                                                data-kartu_kuning="<?= $value->kartu_kuning ?>"
                                                data-bunuh_diri="<?= $value->bunuh_diri ?>"
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
                                    <div class="col-md-1">
                                        C1 (Gol)
                                    </div>
                                    <div class="col-md-1">
                                        C1 (Assist)
                                    </div>
                                    <div class="col-md-1">
                                        C3 (Save)
                                    </div>
                                    <div class="col-md-1">
                                        C4 (Cleansheet)
                                    </div>
                                    <div class="col-md-1">
                                        C5 (Main)
                                    </div>
                                    <div class="col-md-1">
                                        C6 (Kartu Merah)
                                    </div>
                                    <div class="col-md-1">
                                        C7 (Kartu Kuning)
                                    </div>
                                    <div class="col-md-1">
                                        C8 (Bunuh Diri)
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_gol" name="c_gol" value="" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_assist" name="c_assist" value="" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_save" name="c_save" value="" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_clean" name="c_clean" value="" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_main" name="c_main" value="" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_kartu_merah" name="c_kartu_merah" value="" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_kartu_kuning" name="c_kartu_kuning" value="" required>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" class="form-control" id="c_bunuh_diri" name="c_bunuh_diri" value="" required>
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
                                            <th>S</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($nilaiS as $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_lengkap ?></td>
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
                            <h3 class="card-title">Hasil WP </h3>
                        </div>
                        <!-- /.card-header -->
                      
                        <!-- ---------- -->
                        <div class="card-body">
                            <?php
                            $id_pemain = $this->session->data_pemain["id_pemain"];
                            $data_hasil = $this->db->query("SELECT proses_hitung.*, pemain.nama_lengkap FROM proses_hitung join pemain on proses_hitung.id_pemain = pemain.id_pemain ORDER BY proses_hitung.v DESC")->result();
                            // print_r($data_hasil);die;
                            ?>
                                <div class="col-md-12">
                                    <table id="nilaiV" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama</th>
                                                <th>S</th>
                                                <th>V</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($data_hasil as $value) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $value->nama_lengkap ?></td>
                                                    <td><?= $value->s ?></td>
                                                    <td><?= $value->v ?></td>
                                                </tr>
                                            <?php } ?>
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
<?php } ?>
<script src="<?= base_url('vendor') ?>/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#pilih-pemain').change(function(){
            $('#c_gol').val($(this).find(':selected').data('gol'))
            $('#c_assist').val($(this).find(':selected').data('assist'))
            $('#c_main').val($(this).find(':selected').data('main'))
            $('#c_kartu_merah').val($(this).find(':selected').data('kartu_merah'))
            $('#c_kartu_kuning').val($(this).find(':selected').data('kartu_kuning'))
            $('#c_motm').val($(this).find(':selected').data('motm'))
            $('#c_save').val($(this).find(':selected').data('save'))
            $('#c_clean').val($(this).find(':selected').data('clean'))
            $('#c_bunuh_diri').val($(this).find(':selected').data('bunuh_diri'))
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