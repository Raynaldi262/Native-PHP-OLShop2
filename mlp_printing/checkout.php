<?php
require('../model/CustUser.php');
require('../connect/conn.php');

if (isset($_SESSION['cust_id'])) {
    $item = getDataCheckout($_SESSION['cust_id'], $conn);
    $datauser = getDataUser($_SESSION['cust_id'], $conn);
    // $datauser = getDataUser($_SESSION['cust_id']);
}
// if (isset($_SESSION['cust_id'])) {
// 	$data_cart = getcartCount($_SESSION['cust_id']);
// 	$data_check = getcheckCount($_SESSION['cust_id']);
// 	$proses_count = getProsesCount($_SESSION['cust_id']);
// } else {
// 	$data_cart['juml'] = 0;
// 	$data_check['juml'] = 0;
// 	$proses_count['juml'] = 0;
// }
$totalharga = 0;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLP Printing</title>

    <link href="//fonts.googleapis.com/css?family">
    <link rel=" stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    table {
        table-layout: fixed;

    }

    td {
        word-wrap: break-word;
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
                                    <a href="../mlp_printing/">Mlp Printing</a>
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
                                        <li class="nav-item active">
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
                        <h2>Checkout</h2>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cust_id'])) {
                                                while ($data_cart = mysqli_fetch_assoc($item)) {
                                                    $totalharga += $data_cart['harga'];
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $data_cart['produk_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_cart['ukuran'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_cart['bahan'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_cart['finishing'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_cart['sisi'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_cart['qty'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_cart['deskripsi'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo number_format($data_cart['harga']) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data_cart['create_date'] ?>
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
                <?php if (isset($_SESSION['cust_id'])) { ?>
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

                                                <li>Alamat : <?php echo $datauser['cust_address'] ?></li>
                                                <li>no Hp : <?php echo $datauser['cust_phone'] ?></li>
                                                <li>Email : <?php echo $datauser['cust_email'] ?></li>

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
                                        </div>
                                        <!-- Comments -->
                                    </div>
                                </div>
                                <!-- Review -->
                            </div>
                            <form action="../model/CustUser.php" method="post" style="text-align:center;">
                            <div class="row">
                                <div class="col-12">

                                    <!-- Comments -->
                                    <h3><u>Opsi Antar / Ambil Sendiri</u></h3>
                                    <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                        <div class="row">
                                            <div class="col-12">
                                            Pilih =
                                                <select name="antar" required>
                                                  <option value="Antar">Antar</option>
                                                  <option value="Ambil Sendiri">Ambil Sendiri</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Comments -->
                                    </div>
                                </div>
                                <!-- Review -->
                            </div>
                            <div class=" text-right">
                            <input type="hidden" name="total_harga" value="<?php echo $totalharga ?>">
                                <button type="submit" name="batalcheck" class="btn btn-outline-danger">Batal</button>
                                <button type="submit" name="pesan" class="btn btn-outline-success">Pesan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Ratings & Reviews -->
                <?php } ?>

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
                                            <a href="../mlp_printing/">MLP Printing</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <address>
                                        Pt media langit persada
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