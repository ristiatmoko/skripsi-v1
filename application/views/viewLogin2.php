<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- ------------------ -->

    <link rel="shortcut icon" href="assets/images/wh.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="pb-0">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg">
    
    <div class="content-center">
        <div class="content-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card">
                            <div class="card-body">
        
                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="index.html" class="logo logo-admin"><img src="assets/images/wh.png" height="50" alt="logo"></a>
                                </h3>
        
                                <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>
        
                                <div class="p-2">
                                <form>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>

<!-- jQuery  -->
<!-- jQuery -->
<script src="<?= base_url('vendor/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- <script src="<?= base_url('vendor/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<script src="<?= base_url('vendor/') ?>dist/js/adminlte.min.js"></script>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>


</body>



</html>