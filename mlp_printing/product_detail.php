<?php
require('../connect/conn.php');
require('../model/CustUser.php');

if (isset($_SESSION['cust_id'])) {
    $datauser = getDataUser($_SESSION['cust_id'], $conn);
}
if (isset($_GET['id'])) {
    $data_detail = getDetailProduk($_GET['id'], $conn);
}
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
                                            <a href="tel:+123-456-7890"><i class="fa fa-phone-square mr-2"></i>+<?php echo $datauser['cust_phone']; ?></a>
                                        </li>
                                        <li>
                                            <a href="mailto:mail@ecom.com"><i class="fa fa-envelope mr-2"></i><?php echo $datauser['cust_email']; ?></a>
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
                                    <a href="../mlp_printing/index.php">E-Commerce</a>
                                </div>
                            </div>
                            <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" class="form-control border-dark" placeholder="Search..." required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                            <a class="nav-link" href="../mlp_printing/cart.php">Checkout</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="../mlp_printing/cart.php">Pesanan</a>
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
                    <div class="col-12 bg-white py-3 my-3">
                        <div class="row">

                            <!-- Product Images -->
                            <div class="col-lg-5 col-md-12 mb-3">
                                <div class="col-12 mb-3">
                                    <div class="img-large border" style="background-image: url('images/image-1.jpg')"></div>
                                </div>
                            </div>
                            <!-- Product Images -->

                            <!-- Product Info -->
                            <div class="col-lg-7">
                                <div class="col-12 product-name large">
                                    <?php echo $data_detail['produk_name'] ?>
                                </div>
                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <ul>
                                        <li>Processor 8th Generation Intel Core i9-8950HK (6-Core, 12MB Cache, Overclocking up to 5.0GHz)</li>
                                        <li>Memory 32GB DDR4-2666MHz, 2x16GB Ram Speed Gaming Performance</li>
                                        <li>Hard Drive 1TB SSD RAID 0 (2x 512GB PCIe NVME M.2 SSDs) + 1TB (+8GB SSHD) Hybrid Drive</li>
                                        <li>17.3" Full HD display 1920 x 1080 resolution boasts impressive color and clarity. IPS technology for wide viewing angles.</li>
                                        <li>Video Card NVIDIA® GeForce® RTX 2080 with 8GB GDDR6</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product Info -->
                        </div>
                    </div>

                    <div class="col-12 mb-3 py-3 bg-white text-justify">
                        <div class="row">

                            <!-- Details -->
                            <div class="col-md-7">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-uppercase">
                                            <h2><b><u>Spesifikasi</u></b></h2>
                                        </div>
                                        <br>
                                        <div class="col-12" id="details">
                                            <h4 style="text-align: center;"><b><?php echo $data_detail['produk_name'] ?></b></h4>
                                            <br>
                                            <!-- <p><strong>Available with Windows 10 Home:</strong> -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <?php if ($_GET['id'] == 1) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                    ?>
                                                        <!-- KArtu Nama -->
                                                        <form method="post" action="../model/CustUser.php" class="kartu_nama">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <select name="ukuran" class="form-control col-6" id="ukuran">
                                                                    <option value="9 x 5,5 cm">9 x 5,5 cm</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Sisi : </b></div>
                                                                <select name="sisi" class="form-control col-6" id="sisi">
                                                                    <option value="1 sisi">1 sisi</option>
                                                                    <option value="2 sisi">2 sisi</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Jumlah/Box : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-control col-6" min='1' max="100" value='1' required>
                                                                <div class="col-3 input-group-text"><b> Box(100pcs)</b></div>
                                                                <input type="Hidden" name="finishing" class="form-control" value=' - ' id="finishing">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Kartu Nama'>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" name="addchart" class="btn btn-outline-dark" style="width: 30%;"><b> Cart</b></button>
                                                            </div>
                                                        </form>
                                                    <?php } elseif ($_GET['id'] == 2) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                    ?>
                                                        <!-- Dokumen HVS -->
                                                        <form method="post" action="../model/CustUser.php" class="dokumen_hvs">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <select name="ukuran" class="form-control col-6" id="ukuran">
                                                                    <option value="A3+">A3+</option>
                                                                    <option value="A4">A4</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Sisi : </b></div>
                                                                <select name="sisi" class="form-control col-6" id="sisi">
                                                                    <option value="1 sisi Black & White">1 sisi Black & White</option>
                                                                    <option value="2 sisi Full Color">2 sisi Full Color</option>
                                                                    <option value="1 sisi Black & White">1 sisi Black & White</option>
                                                                    <option value="2 sisi Full Color">2 sisi Full Color</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Jumlah : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-control col-6" min='1' value='1' required>
                                                                <input type="Hidden" name="finishing" class="form-control" value=' - ' id="finishing">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Print Dokumen(HVS)'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" name="addchart" class="btn btn-outline-dark" style="width: 30%;">Cart</button>
                                                            </div>
                                                        </form>
                                                    <?php } elseif ($_GET['id'] == 3) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                    ?>
                                                        <!-- Poster A3+ -->
                                                        <form method="post" action="../model/CustUser.php" class="poster">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <select name="ukuran" class="form-control col-6" id="ukuran">
                                                                    <option value="A3+">A3+</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Jumlah : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-control col-6" min='1' value='1' required>
                                                                <input type="Hidden" name="finishing" class="form-control" value=' - ' id="finishing">
                                                                <input type="Hidden" name="sisi" class="form-control" value=' - ' id="sisi">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Poster A3+'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" name="addchart" class="btn btn-outline-dark" style="width: 30%;">Cart</button>
                                                            </div>
                                                        </form>
                                                    <?php } elseif ($_GET['id'] == 4) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                    ?>
                                                        <!-- Banner Standard -->
                                                        <form method="post" action="../model/CustUser.php" class="banner_standart">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <br>
                                                                <input type="number" name="ukuran1" id="ukuran1" class="col-3" required>
                                                                <div class="col-1 input-group-text"><b>X</b></div>
                                                                <input type="number" name="ukuran2" id="ukuran2" class="col-3" required>
                                                                <div class="col-1 input-group-text"><b> CM</b></div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Finishing : </b></div>
                                                                <select name="finishing_id" class="form-control col-6" id="finishing">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_finish)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Jumlah : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-control" min='1' value='1' required>
                                                                <!-- kurang sisi -->
                                                                <input type="Hidden" name="sisi" class="form-control" value='-' id="sisi">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Banner Standard'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" id="button" name="addchart" class="btn btn-outline-dark" style="width: 30%;">Cart</button>
                                                            </div>
                                                        </form>
                                                    <?php } elseif ($_GET['id'] == 5) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                    ?>
                                                        <!-- X banner -->
                                                        <form method="post" action="../model/CustUser.php" class="x_banner">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <select name="ukuran" class="form-control col-6" id="ukuran">
                                                                    <option value="60x160 cm">60 x 160 cm</option>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Finishing : </b></div>
                                                                <select name="finishing_id" class="form-control col-6" id="finishing">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_finish)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Jumlah : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-controlcol6" min='1' value='1' required>
                                                                <!-- kurang sisi -->
                                                                <input type="Hidden" name="sisi" class="form-control" value='-' id="sisi">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='X Banner'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" name="addchart" class="btn btn-outline-dark" style="width: 30%;">Cart</button>
                                                            </div>
                                                        </form>
                                                    <?php } elseif ($_GET['id'] == 6) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                    ?>
                                                        <!-- Roll Up Banner -->
                                                        <form method="post" action="../model/CustUser.php" class="roll_up">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <select name="ukuran" class="form-control col-6" id="ukuran">
                                                                    <option value="60x160 cm">60 x 160 cm</option>
                                                                    <option value="80x200 cm">80 x 200 cm</option>
                                                                    <option value="85x200 cm">85 x 200 cm</option>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Finishing : </b></div>
                                                                <select name="finishing_id" class="form-control col-6" id="finishing">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_finish)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Jumlah : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-control col-6" min='1' value='1' required>
                                                                <!-- kurang sisi -->
                                                                <input type="Hidden" name="sisi" class="form-control" value='-' id="sisi">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Roll Up Banner'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" name="addchart" class="btn btn-outline-dark" style="width: 30%;">Cart</button>
                                                            </div>
                                                        </form>
                                                    <?php } elseif ($_GET['id'] == 7) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                    ?>
                                                        <!-- Brosur/Flyer -->
                                                        <form method="post" action="../model/CustUser.php" class="brosur">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <select name="ukuran" class="form-control col-6" id="ukuran">
                                                                    <option value="A3+">A3+</option>
                                                                    <option value="A4">A4</option>
                                                                    <option value="A5">A5</option>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Sisi : </b></div>
                                                                <select name="sisi" class="form-control col-6" id="sisi">
                                                                    <option value="1 sisi Full Color">1 sisi Full Color</option>
                                                                    <option value="2 sisi Full Color">2 sisi Full Color</option>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Jumlah/Rim : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-control col-6" min='1' value='1' required>
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Brosur/Flyer'>
                                                                <input type="Hidden" name="finishing" class="form-control" value='-' id="finishing">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" name="addchart" class="btn btn-outline-dark" style="width: 30%;">Cart</button>
                                                            </div>
                                                        </form>
                                                    <?php } elseif ($_GET['id'] == 8) {
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                    ?>
                                                        <!-- Sticker Promosi -->
                                                        <form method="post" action="../model/CustUser.php" class="stiker">
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Ukuran : </b></div>
                                                                <input type="number" name="ukuran1" id="ukuran1" class="col-3" required>
                                                                <div class="col-1 input-group-text"><b> X</b></div>
                                                                <input type="number" name="ukuran2" id="ukuran2" class="col-3" required>
                                                                <div class="col-1 input-group-text"><b> CM</b></div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Bahan : </b></div>
                                                                <select name="item_id" class="form-control col-6" id="bahan">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_bahan)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Finishing : </b></div>
                                                                <select name="finishing_id" class="form-control col-6" id="finishing">
                                                                    <?php while ($data  = mysqli_fetch_assoc($data_finish)) { ?>
                                                                        <option value="<?php echo $data['item_id'] ?>"><?php echo $data['item_name'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Finishing : </b></div>
                                                                <input type="Number" name="qty" id="qty" class="form-control col-6" min='1' value='1' required>
                                                                <!-- kurang sisi -->
                                                                <input type="Hidden" name="sisi" class="form-control" value='-' id="sisi">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Sticker Promosi'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Upload Berkas : </b></div>
                                                                <a class="form-control" href="https://www.w3schools.com/html/html_links.asp">https://www.w3schools.com/html/html_links.asp</a>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Catatan : </b></div>
                                                                <textarea name="catatan" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group" style="text-align: center;">
                                                                <button type="submit" name="addchart" class="btn btn-outline-dark" style="width: 30%;">Cart</button>
                                                            </div>
                                                        </form>
                                                    <?php } ?>
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

                                    <!-- Rating -->
                                    <div class="row">
                                        <div class="col-12 mt-md-0 mt-3 text-uppercase" style="text-align: center;">
                                            <h2><b><u>Ringkasan Pesanan</u></b></h2>
                                        </div>
                                    </div>
                                    <br>
                                    <main class="row">
                                        <div class="col-12">
                                            <div class="produk">
                                                <label for="name"><b> Produk:</b></label>
                                                <h4 style="text-align: center;"> asdasddsa</h4>
                                            </div>

                                            <div class="ukuran">
                                                <label for="name"><b> Ukuran:</b></label>
                                                <h4 style="text-align: center;"> asdasddsa</h4>
                                            </div>

                                            <div class="bahan">
                                                <label for="name"><b> Bahan:</b></label>
                                                <h4 style="text-align: center;"> asdasddsa</h4>
                                            </div>

                                            <div class="sisi">
                                                <label for="name"><b> Sisi:</b></label>
                                                <h4 style="text-align: center;"> asdasddsa</h4>
                                            </div>

                                            <div class="finishing">
                                                <label for="name"><b> Finishing:</b></label>
                                                <h4 style="text-align: center;"> asdasddsa</h4>
                                            </div>
                                        </div>
                                    </main>
                                    <!-- Review -->
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                    <!-- Review -->

                                </div>
                            </div>
                            <!-- Ratings & Reviews -->

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
<script>
    $(function() {
        var id = 0;
        switch (<?php echo $_GET['id'] ?>) {
            case 1:
                id = ".kartu_nama";
                break;
            case 2:
                id = ".dokumen_hvs";
                break;
            case 3:
                id = ".poster";
                break;
            case 4:
                id = ".banner_standart";
                break;
            case 5:
                id = ".x_banner";
                break;
            case 6:
                id = ".roll_up";
                break;
            case 7:
                id = ".brosur";
                break;
            case 8:
                id = ".stiker";
                break;
        }

        var ukuran = $(id + ' > .input-group > #ukuran');
        var ukuran = $(id + ' > .input-group > #ukuran');


    });
</script>