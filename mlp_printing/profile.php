<?php
require('../connect/conn.php');
require('../model/CustUser.php');
if (isset($_SESSION['cust_id'])) {
    $datauser = getDataUser($_SESSION['cust_id'], $conn);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Template</title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    #UbahPassword {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-12">
                <header class="row">
                    <!-- Top Nav -->
                    <?php if (isset($_SESSION['cust_id'])) { ?>
                        <div class="col-12 bg-dark py-2 d-md-block d-none">
                            <div class="row">
                                <div class="col-auto mr-auto">
                                    <ul class="top-nav">
                                        <li>
                                            <a href="tel:<?php echo $datauser['cust_phone']; ?>"><i class="fa fa-phone-square mr-2"> +<?php echo $datauser['cust_phone']; ?></i></a>
                                        </li>
                                        <li>
                                            <a href="mailto:<?php echo $datauser['cust_email']; ?>"><i class="fa fa-envelope mr-2"> <?php echo $datauser['cust_email']; ?></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="top-nav">
                                        <li>
                                            <a href="../mlp_printing/register.php"><i class="fas fa-user-edit mr-2"></i>Profile</a>
                                        </li>
                                        <li>
                                            <a href="../login_user/logout_user.php"><i class="fas fa-sign-in-alt mr-2"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-12 bg-dark py-2 d-md-block d-none">
                            <div class="row">
                                <div class="col-auto mr-auto">
                                    <ul class="top-nav">
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="top-nav">
                                        <li>
                                            <a href="../mlp_printing/register.php"><i class="fas fa-user-edit mr-2"></i>Register</a>
                                        </li>
                                        <li>
                                            <a href="../mlp_printing/login.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Top Nav -->

                    <!-- Header -->
                    <div class="col-12 bg-white pt-4">
                        <div class="row">
                            <div class="col-lg-auto">
                                <div class="site-logo text-center text-lg-left">
                                    <a href="index.php">E-Commerce</a>
                                </div>
                            </div>
                        </div>

                        <!-- Nav -->
                        <div class="row">
                            <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                                <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="mainNav">
                                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                                        <li class="nav-item ">
                                            <a class="nav-link" href="../mlp_printing/">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="../mlp_printing/cart.php">Cart</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="../mlp_printing/checkout.php">Checkout</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="../mlp_printing/pesanan.php">Pesanan</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Nav -->

                    </div>
                    <!-- Header -->

                </header>
            </div>

            <div class="col-12">
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 mt-3 text-center text-uppercase">
                        <h2>Profile</h2>
                    </div>
                </div>

                <main class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4">
                        <div class="row">
                            <div class="col-12" align="center">
                                <div style="text-align:center;">
                                    <img src="images/Profile/<?php echo $datauser['cust_img'] ?>" style="object-fit:contain; width:300px;height: 300px; border: solid 1px #CCC; border-radius: 50%;" />
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="name"><b> Nama :</b></label>
                                    <?php echo $datauser['cust_name'] ?>
                                </div>
                                <div class="form-group">
                                    <label for="name"><b> Alamat : </b></label>
                                    <?php echo $datauser['cust_address'] ?>
                                </div>
                                <div class="form-group">
                                    <label for="name"><b> No Hp : </b></label>
                                    <?php echo $datauser['cust_phone'] ?>
                                </div>
                                <div class="form-group">
                                    <label for="email"><b> Email : </b></label>
                                    <?php echo $datauser['cust_email'] ?>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">Ubah Profile</button>
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal1">Ubah Password</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>
            <!--/#do_action-->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Perbarui Profile</h4>
                            <div class="signup-form">
                                <!--sign up form-->
                                <form method="post" action="../model/CustUser.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name"><b> Foto Profile</b></label>
                                        <input type="file" name="img" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name"><b> Name</b></label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo $datauser['cust_name'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"><b>Alamat</b></label>
                                        <input type="text" name="address" class="form-control" value="<?php echo $datauser['cust_address'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"><b> No Hp</b></label>
                                        <input type="number" name="nohp" class="form-control" value="<?php echo $datauser['cust_phone'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b> Email</b></label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $datauser['cust_email'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="updateprofile" class="btn btn-outline-dark">Perbarui</button>
                                    </div>
                                </form>
                            </div>
                            <!--/sign up form-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100" id="pass">Ubah Password</h4>
                        </div>
                        <div class="modal-body">
                            <div class="signup-form">
                                <!--sign up form-->
                                <form action="../model/CustUser.php" method="post">
                                    <div class="form-group">
                                        <label for="password"><b> Password Lama</b></label>
                                        <input type="password" name="passlama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><b> Password Baru</b></label>
                                        <input type="password" name="pass1" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm"><b> Confirm Password</b></label>
                                        <input type="password" name="pass2" class="form-control" required>
                                    </div>
                                    <button type="submit" name="UbahPassword" id="UbahPassword" class="btn btn-outline-success">Simpan</button>
                                </form>
                            </div>
                            <!--/sign up form-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 align-self-end">
                <!-- Footer -->
                <footer class="row">
                    <div class="col-12 bg-dark text-white pb-3 pt-5">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="footer-logo">
                                            <a href="../mlp_printing/">E-Commerce</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <address>
                                            221B Baker Street<br>
                                            London, England
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Quick Links</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="../mlp_printing/">Home</a>
                                            </li>
                                            <li>
                                                <a href="contact.php">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="about.php">About Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer -->
            </div>

        </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>