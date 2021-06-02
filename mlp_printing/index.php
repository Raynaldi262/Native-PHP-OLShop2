<?php
require('../connect/conn.php');
require('../model/CustUser.php');

if (isset($_SESSION['cust_id'])) {
    $datauser = getDataUser($_SESSION['cust_id'], $conn);
}
$data_produk = GetdataProduk($conn);

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
    img {
        width: 150px;
    }

    .img-fluid {
        margin-top: 20px;
        max-height: 200px;
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
                                            <a href="../mlp_printing/profile.php"><i class="fas fa-user-edit mr-2"></i>Profile</a>
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
                                    <a href="../mlp_printing/">E-Commerce</a>
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
                                        <li class="nav-item active">
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
                <main class="row">

                    <!-- Slider -->
                    <div class="col-12 px-0">
                        <div id="slider" class="carousel slide w-100" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider" data-slide-to="0" class="active"></li>
                                <li data-target="#slider" data-slide-to="1"></li>
                                <li data-target="#slider" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img src="images/slider-1.jpg" class="slider-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/slider-2.jpg" class="slider-img">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/slider-3.jpg" class="slider-img">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!-- Slider -->

                    <!-- Top Selling Products -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="row">
                                    <div class="col-12 text-center text-uppercase">
                                        <h2>Products</h2>
                                    </div>
                                </div>
                                <div class="row">

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=1">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <img src="images/barang/kartunama.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">Kartu Nama</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=2">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <img src="images/barang/hvs.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">Dokumen (HVS)</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=3">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <img src="images/barang/poster.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">Poster A3+</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=4">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <br><br>
                                                        <img src="images/barang/spanduk.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">Banner Standart</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=5">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <img src="images/barang/banner.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">X Banner</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=6">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <img src="images/barang/rollupbanner.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">Roll Up Banner</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->
                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=7">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <img src="images/barang/brosur.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">Brosur/Flyer</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->

                                    <!-- Product -->
                                    <div class="col-lg-3 col-sm-6 my-3">
                                        <a href="../mlp_printing/product_detail.php?id=8">
                                            <div class="col-12 bg-white text-center h-100 product-item">
                                                <div class="row h-100">
                                                    <div class="col-12 p-0 mb-3">
                                                        <img src="images/barang/sticker.jpeg" class="img-fluid">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <h3 class="product-name">Sticker Promosi</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top Selling Products -->

                    <div class="col-12 py-3 bg-light d-sm-block d-none">
                        <div class="row">
                            <div class="col-lg-3 col ml-auto large-holder">
                                <div class="row">
                                    <div class="col-auto ml-auto large-icon">
                                        <i class="fas fa-money-bill"></i>
                                    </div>
                                    <div class="col-auto mr-auto large-text">
                                        Best Price
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col large-holder">
                                <div class="row">
                                    <div class="col-auto ml-auto large-icon">
                                        <i class="fas fa-truck-moving"></i>
                                    </div>
                                    <div class="col-auto mr-auto large-text">
                                        Fast Delivery
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col mr-auto large-holder">
                                <div class="row">
                                    <div class="col-auto ml-auto large-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="col-auto mr-auto large-text">
                                        Genuine Products
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Main Content -->
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

    <!-- Messages -->
    <!-- <div class="message-holder">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <small><i class="fas fa-times"></i></small>
            </button>
            <i class="fas fa-check-circle mr-2"></i>
            This is a success alert message.
        </div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <small><i class="fas fa-times"></i></small>
            </button>
            <i class="fas fa-times-circle mr-2"></i>
            This is a error alert message.
        </div>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <small><i class="fas fa-times"></i></small>
            </button>
            <i class="fas fa-exclamation-circle mr-2"></i>
            This is a warning alert message.
        </div>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <small><i class="fas fa-times"></i></small>
            </button>
            <i class="fas fa-info-circle mr-2"></i>
            This is a info alert message.
        </div>
    </div> -->
    <!-- Messages -->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>