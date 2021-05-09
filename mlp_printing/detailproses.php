<?php
require('../model/CustUser.php');
require('../connect/conn.php');

if (isset($_SESSION['cust_id'])) {
    $item = getDataDetailProses($_GET['id'], $conn);
    $data_proses = getDataProses2($_GET['id'], $conn);
    $datauser = getDataUser($_SESSION['cust_id'], $conn);
}
$totalharga = 0;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLP Printing</title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

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
                                        <li class="nav-item ">
                                            <a class="nav-link" href="../mlp_printing/">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../mlp_printing/cart.php">Cart</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="../mlp_printing/checkout.php">Checkout</a>
                                        </li>
                                        <li class="nav-item ">
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
                        <h2>Detail pesanan</h2>
                    </div>
                </div>

                <main class="row">
                    <div class="col-12 bg-white py-3 mb-3">
                        <div class="row">
                            <div class=" col-md-10 mx-auto table-responsive">
                                <div class="col-12">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Ukuran</th>
                                                <th>Bahan</th>
                                                <th>Finishing</th>
                                                <th>Sisi</th>
                                                <th>Qty</th>
                                                <th>Catatan</th>
                                                <th>Harga</th>
                                                <th>Tanggal</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cust_id'])) {
                                                while ($data_detail = mysqli_fetch_assoc($item)) {
                                                    $totalharga += $data_detail['harga'];
                                                    $statusid = $data_detail['status_id']
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $data_detail['produk_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_detail['ukuran'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_detail['bahan'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_detail['finishing'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_detail['sisi'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_detail['qty'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_detail['deskripsi'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($data_detail['harga']) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_detail['create_date'] ?>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                    <tr>
                                        <th colspan="3" class="text-right">Total</th>
                                        <th><?php echo  "Rp. ", number_format($totalharga) ?></th>
                                        <th></th>
                                    </tr>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>
            <div class="col-12 mb-3 py-3 bg-white text-justify">
                        <div class="row">

                            <!-- Details -->
                            <div class="col-md-7">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-uppercase">
                                            <h2><u>Data Pribadi</u></h2>
                                            <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong class="mr-2"><?php echo $datauser['cust_name'] ?></strong>
                                                    </div>
					                                <ul>
					                                	<?php if (isset($_SESSION['cust_id'])) { ?>
					                                		<li>Alamat : <?php echo $datauser['cust_address'] ?></li>
					                                		<li>no Hp : <?php echo $datauser['cust_phone'] ?></li>
					                                		<li>Email : <?php echo $datauser['cust_email'] ?></li>
					                                	<?php } ?>
					                                </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Details -->

                            <!-- Ratings & Reviews -->
                            <div class="col-md-5">
                                <div class="col-12 px-md-4 border-top border-left sidebar h-100">

                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Comments -->
                                            <h2><u>Total Harga</u></h2>
                                            <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                <div class="row">
                                                    <div class="col-12">
                                                         <h3><?php echo  "Rp. ", number_format($totalharga) ?></h3>
                                                </div>
                                            <?php if($data_proses['status'] != 'Mengunggu Konfirmasi') {?>
                                                <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                    <div class="row">
                                                        <div class="col-12">
                                                         <a href="invoice.php?id=<?php echo $statusid?>&idu=<?php echo $_SESSION['cust_id']?>">
								                	        <button type="button" class="btn btn-success">
								                		        <i class="fa fa-print"> Print Invoice</i>
								                	        </button>
								                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }else{?>
                                            
                                            <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                <div class="row">
                                                     <div class="col-12">
                                                         <p> Menunggu Konfirmasi</p>
                                                     </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            </div>
                                            <!-- Comments -->
                                        </div>
                                    </div>
                                    <!-- Review -->
                                    </div>
                                </div>
                            </div>
                            <!-- Ratings & Reviews -->

                        </div>
                    </div>
            <div class="col-12 align-self-end">
                <!-- Footer -->
                <footer class="row">
                    <div class="col-12 bg-dark text-white pb-3 pt-5">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="footer-logo">
                                            <a href="index.html">E-Commerce</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <address>
                                            221B Baker Street<br>
                                            London, England
                                        </address>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-8 text-center text-sm-left mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Who are we?</h4>
                                    </div>
                                    <div class="col-12 text-justify">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam imperdiet vel ligula vel sodales. Aenean vel ullamcorper purus, ac pharetra arcu. Nam enim velit, ultricies eu orci nec, aliquam efficitur sem. Quisque in sapien a sem vestibulum volutpat at eu nibh. Suspendisse eget est metus. Maecenas mollis quis nisl ac malesuada. Donec gravida tortor massa, vitae semper leo sagittis a. Donec augue turpis, rutrum vitae augue ut, venenatis auctor nulla. Sed posuere at erat in consequat. Nunc congue justo ut ante sodales, bibendum blandit augue finibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-3 col-5 ml-lg-auto ml-sm-0 ml-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Quick Links</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="#">About Us</a>
                                            </li>
                                            <li>
                                                <a href="#">Privacy Policy</a>
                                            </li>
                                            <li>
                                                <a href="#">Terms & Conditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-2 col-4 mr-auto mb-sm-0 mb-3">
                                <div class="row">
                                    <div class="col-12 text-uppercase text-underline">
                                        <h4>Help</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul class="footer-nav">
                                            <li>
                                                <a href="#">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="#">Shipping</a>
                                            </li>
                                            <li>
                                                <a href="#">Returns</a>
                                            </li>
                                            <li>
                                                <a href="#">Track Order</a>
                                            </li>
                                            <li>
                                                <a href="#">Report Fraud</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 text-center text-sm-left">
                                <div class="row">
                                    <div class="col-12 text-uppercase">
                                        <h4>Newsletter</h4>
                                    </div>
                                    <div class="col-12">
                                        <form action="#">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter your email..." required>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-outline-light text-uppercase">Subscribe</button>
                                            </div>
                                        </form>
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