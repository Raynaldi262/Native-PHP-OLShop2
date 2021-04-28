<?php 
require('../model/CustUser.php');

if (isset($_GET['id'])) {
	$data_detail = getDetailProduk($_GET['id'] , $conn);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce Template</title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

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
                    <div class="col-12 bg-dark py-2 d-md-block d-none">
                        <div class="row">
                            <div class="col-auto mr-auto">
                                <ul class="top-nav">
                                    <li>
                                        <a href="tel:+123-456-7890"><i class="fa fa-phone-square mr-2"></i>+123-456-7890</a>
                                    </li>
                                    <li>
                                        <a href="mailto:mail@ecom.com"><i class="fa fa-envelope mr-2"></i>mail@ecom.com</a>
                                    </li>
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
                            <div class="col-lg-auto text-center text-lg-left header-item-holder">
                                <a href="#" class="header-item">
                                    <i class="fas fa-heart mr-2"></i><span id="header-favorite">0</span>
                                </a>
                                <a href="#" class="header-item">
                                    <i class="fas fa-shopping-bag mr-2"></i><span id="header-qty" class="mr-3">2</span>
                                    <i class="fas fa-money-bill-wave mr-2"></i><span id="header-price">$4,000</span>
                                </a>
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
                                            <a class="nav-link" href="../mlp_printing/index.php">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="electronics" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronics</a>
                                            <div class="dropdown-menu" aria-labelledby="electronics">
                                                <a class="dropdown-item" href="category.html">Computers</a>
                                                <a class="dropdown-item" href="category.html">Mobile Phones</a>
                                                <a class="dropdown-item" href="category.html">Television Sets</a>
                                                <a class="dropdown-item" href="category.html">DSLR Cameras</a>
                                                <a class="dropdown-item" href="category.html">Projectors</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="fashion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fashion</a>
                                            <div class="dropdown-menu" aria-labelledby="fashion">
                                                <a class="dropdown-item" href="category.html">Men's</a>
                                                <a class="dropdown-item" href="category.html">Women's</a>
                                                <a class="dropdown-item" href="category.html">Children's</a>
                                                <a class="dropdown-item" href="category.html">Accessories</a>
                                                <a class="dropdown-item" href="category.html">Footwear</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="books" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Books</a>
                                            <div class="dropdown-menu" aria-labelledby="books">
                                                <a class="dropdown-item" href="category.html">Adventure</a>
                                                <a class="dropdown-item" href="category.html">Horror</a>
                                                <a class="dropdown-item" href="category.html">Romantic</a>
                                                <a class="dropdown-item" href="category.html">Children's</a>
                                                <a class="dropdown-item" href="category.html">Non-Fiction</a>
                                            </div>
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
                                    <?php echo $data_detail['produk_name']?>
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
                                            <h2><u>Spesifikasi</u></h2>
                                        </div>
                                        <div class="col-12" id="details">
                                            <h4><?php echo $data_detail['produk_name']?></h4>
                                            <!-- <p><strong>Available with Windows 10 Home:</strong> -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <?php if($_GET['id'] == 1){ 
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data  = mysqli_fetch_assoc($data_bahan);                                                       
                                                        ?>
                                                        <!-- KArtu Nama -->
                                                    <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                            <label>Ukuran</label>
                                                            <select name="ukuran" class="form-control">
                                                              <option value="9 x 5,5 cm">9 x 5,5 cm</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password-confirm">Jumlah / Box(100pcs)</label>
                                                            <input type="Number" name="qty" class="form-control" min='1' value = '1' required>
                                                            <input type="Hidden" name="item_id" class="form-control" value = '<?php echo $data['item_id']?>' >
                                                            <input type="Hidden" name="finishing" class="form-control" value = ' - ' >
                                                            <input type="Hidden" name="produk_name" class="form-control" value = 'Kartu Nama' >
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="addchart" class="btn btn-outline-dark">Cart</button>
                                                        </div>
                                                    </form>
                                                    <?php } elseif ( $_GET['id'] == 2) {
                                                         $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                         $data  = mysqli_fetch_assoc($data_bahan);                                                        
                                                        ?> 
                                                        <!-- Dokumen HVS -->
                                                        <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                        <label>Ukuran</label>
                                                            <select name="ukuran" class="form-control">
                                                              <option value="A3+">A3+</option>
                                                              <option value="A4">A4</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah</label>
                                                            <input type="Number" name="qty" class="form-control" min='1' value = '1' required>
                                                            <input type="Hidden" name="item_id" class="form-control" value = '<?php echo $data['item_id']?>' >
                                                            <input type="Hidden" name="finishing" class="form-control" value = ' - ' >
                                                            <input type="Hidden" name="produk_name" class="form-control" value = 'Print Dokumen(HVS)' >
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="addchart" class="btn btn-outline-dark">Cart</button>
                                                        </div>
                                                    </form>
                                                    <?php } elseif ($_GET['id'] == 3) { 
                                                         $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                         $data  = mysqli_fetch_assoc($data_bahan);                                                          
                                                        ?>
                                                        <!-- Poster A3+ -->
                                                        <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                        <label>Ukuran</label>
                                                            <select name="ukuran" class="form-control">
                                                              <option value="A3+">A3+</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password-confirm">Jumlah</label>
                                                            <input type="Number" name="qty" class="form-control" min='1' value = '1' required>
                                                            <input type="Hidden" name="item_id" class="form-control" value = '<?php echo $data['item_id']?>' >
                                                            <input type="Hidden" name="finishing" class="form-control" value = ' - ' >
                                                            <input type="Hidden" name="produk_name" class="form-control" value = 'Poster A3+' >
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="addchart" class="btn btn-outline-dark">Cart</button>
                                                        </div>
                                                    </form>
                                                    <?php } elseif ($_GET['id'] == 4) { 
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                        ?>
                                                        <!-- Banner Standard -->
                                                        <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                            <label>Ukuran</label>
                                                            <br>

                                                            <input type="number" name="ukuran"  class="col-md-5"  required> X
                                                            <input type="number" name="ukuran" class="col-5" required> Cm
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bahan</label>
                                                            <select name="Bahan" class="form-control">
                                                        <?php while ($data  = mysqli_fetch_assoc($data_bahan)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                              <input type="Hidden" name="item_id" class="form-control" value = '<?php echo $data['item_id']?>' >
                                                              <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Finishing</label>
                                                            <select name="finishing" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_finish)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                              <input type="Hidden" name="finishing_id" class="form-control" value = '<?php echo $data['item_id']?>' >
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password-confirm">Jumlah</label>
                                                            <input type="Number" name="qty" class="form-control" min='1' value = '1' required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="register" class="btn btn-outline-dark">Cart</button>
                                                        </div>
                                                    </form>
                                                    <?php } elseif ($_GET['id'] == 5) { 
                                                    $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                    $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                        ?>
                                                        <!-- X banner -->
                                                        <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                            <label>Ukuran</label>
                                                            <select name="ukuran" class="form-control">
                                                              <option value="60 x 160 cm">60 x 160 cm</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bahan</label>
                                                            <select name="bahan" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_bahan)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                              <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Finishing</label>
                                                            <select name="finishing" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_finish)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah</label>
                                                            <input type="Number" name="jumlah" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="register" class="btn btn-outline-dark">Cart</button>
                                                        </div>
                                                    </form>
                                                    <?php } elseif ($_GET['id'] == 6) { 
                                                    $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                    $data_finish = GetDataFinishing($_GET['id'], $conn);
                                                        ?>
                                                        <!-- Roll Up Banner -->
                                                        <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                            <label>Ukuran</label>
                                                            <select name="ukuran" class="form-control">
                                                              <option value="60 x 160 cm">60 x 160 cm</option>
                                                              <option value="80 x 200 cm">80 x 200 cm</option>
                                                              <option value="85 x 200 cm">85 x 200 cm</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bahan</label>
                                                            <select name="bahan" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_bahan)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                              <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Finishing</label>
                                                            <select name="finishing" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_finish)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password-confirm">Jumlah</label>
                                                            <input type="Number" name="jumlah" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="register" class="btn btn-outline-dark">Cart</button>
                                                        </div>
                                                    </form>
                                                    <?php } elseif ($_GET['id'] == 7) { 
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);                                                        
                                                        ?>
                                                        <!-- Brosuer / Flyer -->
                                                        <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                            <label>Ukuran</label>
                                                            <select name="ukuran" class="form-control">
                                                              <option value="A3+">A3+</option>
                                                              <option value="A4">A4</option>
                                                              <option value="A5">A5</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bahan</label>
                                                            <select name="bahan" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_bahan)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                              <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah / Rim</label>
                                                            <input type="Number" name="jumlah" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="register" class="btn btn-outline-dark">Cart</button>
                                                        </div>
                                                    </form>
                                                    <?php } elseif ($_GET['id'] == 8) { 
                                                        $data_bahan = GetDataBahan($_GET['id'], $conn);
                                                        $data_finish = GetDataFinishing($_GET['id'], $conn);                                                        
                                                        ?>
                                                        <!-- Sticker Promosi -->
                                                        <form method="post" action="../model/CustUser.php">
                                                        <div class="form-group">
                                                            <label>Ukuran</label>
                                                            <input type="text" name="ukuran" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Bahan</label>
                                                            <select name="ukuran" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_bahan)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                              <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label>Finishing</label>
                                                            <select name="finishing" class="form-control">
                                                            <?php while ($data  = mysqli_fetch_assoc($data_finish)){ ?>
                                                              <option value="<?php echo $data['item_name']?>"><?php echo $data['item_name']?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password-confirm">Jumlah</label>
                                                            <input type="Number" name="jumlah" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="register" class="btn btn-outline-dark">Cart</button>
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
                                        <div class="col-12 mt-md-0 mt-3 text-uppercase">
                                            <h2><u>Ratings & Reviews</u></h2>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-sm-4 text-center">
                                                    <div class="row">
                                                        <div class="col-12 average-rating">
                                                            4.1
                                                        </div>
                                                        <div class="col-12">
                                                            of 100 reviews
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <ul class="rating-list mt-3">
                                                        <li>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                            </div>
                                                            <div class="rating-progress-label">
                                                                5<i class="fas fa-star ml-1"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                                                            </div>
                                                            <div class="rating-progress-label">
                                                                4<i class="fas fa-star ml-1"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                                            </div>
                                                            <div class="rating-progress-label">
                                                                3<i class="fas fa-star ml-1"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100">7%</div>
                                                            </div>
                                                            <div class="rating-progress-label">
                                                                2<i class="fas fa-star ml-1"></i>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-dark" role="progressbar" style="width: 3%;" aria-valuenow="3" aria-valuemin="3" aria-valuemax="100">3%</div>
                                                            </div>
                                                            <div class="rating-progress-label">
                                                                1<i class="fas fa-star ml-1"></i>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Rating -->

                                    <div class="row">
                                        <div class="col-12 px-md-3 px-0">
                                            <hr>
                                        </div>
                                    </div>

                                    <!-- Add Review -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>Add Review</h4>
                                        </div>
                                        <div class="col-12">
                                            <form>
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Give your review"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex ratings justify-content-end flex-row-reverse">
                                                        <input type="radio" value="5" name="rating" id="rating-5"><label
                                                            for="rating-5"></label>
                                                        <input type="radio" value="4" name="rating" id="rating-4"><label
                                                            for="rating-4"></label>
                                                        <input type="radio" value="3" name="rating" id="rating-3"><label
                                                            for="rating-3"></label>
                                                        <input type="radio" value="2" name="rating" id="rating-2"><label
                                                            for="rating-2"></label>
                                                        <input type="radio" value="1" name="rating" id="rating-1" checked><label
                                                            for="rating-1"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-outline-dark">Add Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Add Review -->

                                    <div class="row">
                                        <div class="col-12 px-md-3 px-0">
                                            <hr>
                                        </div>
                                    </div>

                                    <!-- Review -->
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Comments -->
                                            <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong class="mr-2">Steve Rogers</strong>
                                                        <small>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </small>
                                                    </div>
                                                    <div class="col-12">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut ullamcorper quam, non congue odio.
                                                        <br>
                                                        Fusce ligula augue, faucibus sed neque non, auctor rhoncus enim. Sed nec molestie turpis. Nullam accumsan porttitor rutrum. Curabitur eleifend venenatis volutpat.
                                                        <br>
                                                        Aenean faucibus posuere vehicula.
                                                    </div>
                                                    <div class="col-12">
                                                        <small>
                                                            <i class="fas fa-clock mr-2"></i>5 hours ago
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Comments -->

                                            <!-- Comments -->
                                            <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong class="mr-2">Bucky Barns</strong>
                                                        <small>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </small>
                                                    </div>
                                                    <div class="col-12">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut ullamcorper quam, non congue odio.
                                                        <br>
                                                        Aenean faucibus posuere vehicula.
                                                    </div>
                                                    <div class="col-12">
                                                        <small>
                                                            <i class="fas fa-clock mr-2"></i>5 hours ago
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Comments -->

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