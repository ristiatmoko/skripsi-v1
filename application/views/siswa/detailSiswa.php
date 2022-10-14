
<!-- <div class="wrapper"> -->
            <div class="container-fluid">

                <!-- Page-Title -->
                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                                    <li class="breadcrumb-item"><a href="#">Components</a></li>
                                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                    <li class="breadcrumb-item active">Datatable</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Datatable</h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Detail Pemain</h4>
                                <!-- <button type="button" class="btn btn-primary btn-lg mb-2">Tambah</button> -->
                                <!-- <a type="button" href="<?= site_url("controllerSiswa/insert_siswa"); ?></a>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a> -->

                                

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>
                                            <button class="btn btn-secondary" type="button">Detail</button>
                                            <button class="btn btn-success" type="button">Edit</button>
                                            <button class="btn btn-primary" type="button">Hapus</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            

            </div> <!-- end container -->
        </div>