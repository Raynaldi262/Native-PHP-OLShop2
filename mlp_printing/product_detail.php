<?php
require('../connect/conn.php');
require('../model/CustUser.php');

if (isset($_SESSION['cust_id'])) {
    $datauser = getDataUser($_SESSION['cust_id'], $conn);
}
if (isset($_GET['id'])) {
    $data_detail = getDetailProduk($_GET['id'], $conn);
    $harga_mulai = getHargaMulai($_GET['id'], $conn);
}

$getitem = getDataItem($conn);
while ($datas = mysqli_fetch_assoc($getitem)) {
    $dataitem[] = $datas; //assign whole values to array
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
                                    <a href="../mlp_printing/index.php">E-Commerce</a>
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
                                <div class="col-12">
                                    <?php echo $harga_mulai[0] ?> <p style="color:red">Rp. <?php echo number_format($harga_mulai[1]) ?></p>
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
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Kartu Nama' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='1'>
                                                                <input type="Hidden" name="uk_kertas" class="form-control" value='A3+'>
                                                                <input type="Hidden" name="total_harga" class="form-control" id="total_harga" value='total_harga'>
                                                                <div class="input-group-append">
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                                                <select name="item_iddd" class="form-control col-6" id="bahan" disabled>
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
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Print Dokumen(HVS)' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='2'>
                                                                <input type="Hidden" name="item_id" class="form-control" value='item_id' id="idbahan">
                                                                <input type="Hidden" name="total_harga" class="form-control" id="total_harga" value='total_harga'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Poster A3+' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='3'>
                                                                <input type="Hidden" name="total_harga" class="form-control" id="total_harga" value='total_harga'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                                                <input type="number" name="ukuran1" id="ukuran1" class="col-3" min="0" value="0" required>
                                                                <div class="col-1 input-group-text"><b>X</b></div>
                                                                <input type="number" name="ukuran2" id="ukuran2" class="col-3" min="0" value="0" required>
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
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Banner Standard' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='4'>
                                                                <input type="Hidden" name="total_harga" id="total_harga" class="form-control" value='total_harga'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                                        $data_kaki = GetDataKaki($_GET['id'], $conn);
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
                                                                <input type="Hidden" name="produk_name" class="form-control" value='X Banner' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='5'>
                                                                <input type="Hidden" name="total_harga" class="form-control" id="total_harga" value='total_harga'>
                                                                <input type="Hidden" name="kaki" class="form-control" value='<?php echo $data_kaki['item_id'] ?>' id="kaki">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                                        $data_kaki = GetDataKaki($_GET['id'], $conn);
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
                                                                <input type="Hidden" name="kaki" class="form-control" value='<?php echo $data_kaki['item_id'] ?>' id="kaki">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Roll Up Banner' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='6'>
                                                                <input type="Hidden" name="total_harga" class="form-control" id="total_harga" value='total_harga'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Brosur/Flyer' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='7'>
                                                                <input type="Hidden" name="total_harga" id="total_harga" class="form-control" value='total_harga'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Unggah Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                                                <input type="number" name="ukuran1" id="ukuran1" class="col-3" min="0" value="0" required>
                                                                <div class="col-1 input-group-text"><b> X</b></div>
                                                                <input type="number" name="ukuran2" id="ukuran2" class="col-3" min="0" value="0" required>
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
                                                                <input type="Number" name="qty" id="qty" class="form-control col-6" min='1' value='1' required>
                                                                <!-- kurang sisi -->
                                                                <input type="Hidden" name="sisi" class="form-control" value='-' id="sisi">
                                                                <input type="Hidden" name="produk_name" class="form-control" value='Sticker Promosi' id="produk">
                                                                <input type="Hidden" name="produk_id" class="form-control" value='8'>
                                                                <input type="Hidden" name="total_harga" class="form-control" id="total_harga" value='total_harga'>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="col-3 input-group-text"><b> Upload Berkas : </b></div>
                                                                <input type="url" name="upload_name" class="form-control" required>
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
                                    <div class="row" style="background-color: black;">
                                        <div class="col-12 mt-md-0 mt-3 text-uppercase" style="text-align: center;">
                                            <br>
                                            <h2 style="color: white;"><b>Ringkasan Pesanan</b></h2>
                                            <br>
                                        </div>
                                    </div>
                                    <main class="row">
                                        <div class="col-12 ringkasan">
                                            <br>
                                            <div class="produk">
                                                <label for="name"><b> Produk : &nbsp</b></label>
                                                <p style="text-align: center;display: inline;" id></p>
                                            </div>

                                            <div class="ukuran">
                                                <label for="name"><b> Ukuran : &nbsp</b></label>
                                                <p style="text-align: center;display: inline;"></p>
                                            </div>

                                            <div class="bahan">
                                                <label for="name"><b> Bahan : &nbsp</b></label>
                                                <p style="text-align: center;display: inline;"></p>
                                            </div>

                                            <div class="sisi">
                                                <label for="name"><b> Sisi : &nbsp</b></label>
                                                <p style="text-align: center;display: inline;"></p>
                                            </div>

                                            <div class="finishing">
                                                <label for=" name"><b> Finishing : &nbsp</b></label>
                                                <p style="text-align: center;display: inline;"></p>
                                            </div>

                                            <div class="qty">
                                                <label for=" name"><b> Jumlah : &nbsp</b></label>
                                                <p style="text-align: center;display: inline;"></p>
                                            </div>

                                            <div class="harga">
                                                <label for=" name"><b> Harga : &nbsp</b>Rp </label>
                                                <p style="text-align: center;display: inline;"></p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/ukuran.js"></script>
    <script type="text/javascript" src="js/bahan.js"></script>
    <script type="text/javascript" src="js/finishing.js"></script>
    <script type="text/javascript" src="js/qty.js"></script>
</body>

</html>
<script>
    $(function() {
        var itemid = <?php echo $_GET['id'] ?>;
        var id = 0;
        var harga = 0;
        switch (itemid) {
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


        var produk = $(id + ' > .input-group > #produk').val();
        var ukuran = $(id + ' > .input-group > #ukuran > option:selected').val();
        var bahan = $(id + ' > .input-group > #bahan > option:selected').text();
        var sisi = $(id + ' > .input-group > #sisi').val();
        var kaki = $(id + ' > .input-group > #kaki').val();
        var finishing = $(id + ' > .input-group > #finishing > option:selected').text();
        var qty = $(id + ' > .input-group > #qty').val();

        var idbahan = $(id + ' > .input-group > #bahan').val();
        var idfinishing = $(id + ' > .input-group > #finishing').val();

        $(id + ' > .input-group > #idbahan').val(idbahan);
        if (ukuran == null) {
            ukuran = 0;
        }

        $(".ringkasan > div > p").text('');
        $(".ringkasan > .produk > p").text(produk);
        $(".ringkasan > .ukuran > p").text(ukuran);
        $(".ringkasan > .bahan > p").text(bahan);
        $(".ringkasan > .sisi > p").text(sisi);
        $(".ringkasan > .finishing > p").text(finishing);
        $(".ringkasan > .qty > p").text(qty);

        if (itemid == '1' || itemid == '2' || itemid == '3' || itemid == '4' || itemid == '7' || itemid == '8')
            console.log('msk');
        else {
            ukuran = searchSize(ukuran);
        }

        harga = totalPrice(itemid, ukuran, idbahan, idfinishing, kaki, qty);
        $(id + ' > .input-group > #total_harga').val(harga);
        harga = numeral(harga).format('0,0')
        $(".ringkasan > .harga > p").text(harga);

        // kalau ukuran brubah
        $(id + ' > .input-group > #ukuran').change(function() {
            changeSize(id, itemid);
        })

        //ini khusus id 4  ukurannya custom user
        $(id + ' > .input-group > #ukuran1').change(function() {
            changeSize(id, itemid);
        });

        //ini khusus id 4  ukurannya custom user
        $(id + ' > .input-group > #ukuran2').change(function() {
            changeSize(id, itemid);
        });

        $(id + ' > .input-group > #bahan').change(function() {
            changeBahan(id, itemid);
        });

        $(id + ' > .input-group > #finishing').change(function() {
            changeFinishing(id, itemid);
        });

        $(id + ' > .input-group > #qty').change(function() {
            changeQty(id, itemid);
        })

        $(id + ' > .input-group > #sisi').change(function() {
            var sisi = $(id + ' > .input-group > #sisi > option:selected').text();
            $(".ringkasan > .sisi > p").text(sisi);
        })
    });


    function totalPrice(id, ukuran, bahan, finishing, kaki, qty) {

        var total = 0;
        var hBahan = 0;
        var hFinish = 0;
        var hFooter = 0;
        var items = <?php echo json_encode($dataitem) ?>;

        $.each(items, function(key, value) {
            if (value['item_id'] == bahan) {
                hBahan = value['item_price'];
            }

            if (value['item_id'] == finishing) {
                hFinish = value['item_price'];
            }


            if (value['item_id'] == kaki) {
                hFooter = value['item_price'];
            }
        });


        if (id == 1) { //kalau kartu nama
            total = (3 * hBahan) * qty;
            return total;
        }

        if (id == 2 || id == 3) { //kalau dokumen hvs, poster a3+ 
            total = hBahan * qty;
            return total;
        }

        if (id == 4 || id == 8) { // banner standart
            total = (hBahan * ukuran * qty) + (hFinish * ukuran * qty);
            return total;
        }

        if (id == 5 || id == 6) { // x standart & roll up  
            total = (hBahan * ukuran * qty) + (hFinish * ukuran * qty) + (hFooter * qty);
            return total;
        }

        if (id == 7) { // Brosur
            if (ukuran == 'A3+') {
                ukuran = 500;
            } else if (ukuran == 'A4') {
                ukuran = 250;
            } else if (ukuran == 'A5') {
                ukuran = 125;
            }
            total = hBahan * ukuran * qty;
            return total;
        }
    }

    function searchSize(data) {
        var pattern = /\d+/g;
        var result = data.match(pattern);
        result = (result[0] / 100) * (result[1] / 100);
        return result
    }
</script>