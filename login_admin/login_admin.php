<?php require('../session/session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
</head>
<style>
    h1 {
        margin-left: -16px;
        font-size: 52px;
        transform: scale(.8, 1.6);
    }

    body {
        background-image: url("../dist/img/bg_login.jpg") !important;
        background-size: cover !important;
    }

    .card {
        background-color: rgba(242, 242, 242, 0.3) !important;
    }

    p {
        color: white !important;
    }

    .card-header>img {
        max-height: 150px;
        width: auto;
    }
</style>

<?php       // kalau masih login
if (logged_in()) {
?>
    <script type="text/javascript">
        window.location = "../admin/index.php";
    </script>
<?php
}
?>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline">
            <div class="card-header text-center">
                <img src="../dist/img/logo.jpg" class="img-circle elevation-2">
                <div class="row">
                    <div class="col-6" style="text-align: right;">
                        <h3><b>MLP Printing</b></h3>
                    </div>

                    <div class="col-6" style="text-align: left;">
                        <h1><b>Admin</b></h1>
                    </div>
                </div>
                <!-- <h1>Monkers <b>Admin</b></h1> -->
            </div>
            <div class="card-body">
                <p class="login-box-msg"><i>Sign in Here</i></p>

                <form action="login_check.php" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa-user-alt"></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-8 ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-block" name="btnlogin">Sign In
                                <i class="fas fa-sign-in-alt"></i>
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>