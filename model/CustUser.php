<?php
require('../connect/conn.php');
require('../session/session.php');

if (isset($_POST['register'])) {
    insertUser($conn);
 }

 if (isset($_POST['addchart'])) {
   AddChart($conn);
}

if (isset($_POST['deletecart'])) {
   deleteCart($conn);
}



function getDataUser($cust_id, $conn)
{
   $sql = "SELECT * from tbl_customer where cust_id = '" . $cust_id . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}

function getDetailProduk($id , $conn){
   $sql = "SELECT * from tbl_produk where produk_id = '". $id ."' ";
   $item = mysqli_query($conn, $sql);
   $data  = mysqli_fetch_assoc($item);
   return $data;
 }

function GetdataProduk($conn){
   $sql = "SELECT * from tbl_produk ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetDataBahan($id,$conn){
   $sql = "SELECT * FROM tbl_item INNER JOIN tbl_relasi on tbl_item.item_id = tbl_relasi.item_id where tbl_relasi.produk_id = '".$id."' && tbl_item.item_desc = 'BAHAN' ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetDataFinishing($id, $conn){
   $sql = "SELECT * FROM tbl_item INNER JOIN tbl_relasi on tbl_item.item_id = tbl_relasi.item_id where tbl_relasi.produk_id = '".$id."' && tbl_item.item_desc = 'FINISHING' ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function getDataCart($cust_id,$conn)
{
   $sql = "SELECT * from tbl_cart where cust_id = '" . $cust_id . "' ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function deleteCart($conn)
{
   echo $_POST['cart_id'];
   $sql = "DELETE FROM tbl_cart WHERE tbl_cart . cart_id = '" . $_POST['cart_id'] . "'";
   mysqli_query($conn, $sql);
   header("location: ../mlp_printing/cart.php");
}

function addChart($conn)
{

   if (!isset($_SESSION['cust_id'])) {
      msg('Silakan Login dahulu', '../mlp_printing/login.php');
   } else {
      $date_id = date("his") . date("Ymd");
      $sql = "SELECT * from tbl_item where item_id = '" . $_POST['item_id'] . "' ";
      $item = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($item);
      if ($data['item_qty'] < $_POST['qty']) {
        msg('Stock Barang Kurang', '../mlp_printing/index.php');

      } elseif (isset($_POST['finishing_id'])) {
         if(isset($_POST['ukuran1'])){
            $ukuran = $_POST['ukuran1']." x ".$_POST['ukuran2']. "cm";
            $hasil_meter = $_POST['ukuran1']*$_POST['ukuran2'];
         }else{
            $ukuran = $_POST['ukuran'];
            $ukuran1 = substr($_POST['ukuran'],0 , strpos($_POST['ukuran'], "x")); // untuk mengambil angka
            $ukuran2 = substr($_POST['ukuran'], strpos($_POST['ukuran'], "x")+1 ,strpos($_POST['ukuran'], "cm",)- 4);
            $hasil_meter = (int)$ukuran1*(int)$ukuran2; // mengbubah paksa string ke int
         }
         $sql = "SELECT * from tbl_item where item_id = '" . $_POST['finishing_id'] . "' ";
         $item = mysqli_query($conn, $sql);
         $data_finishing = mysqli_fetch_assoc($item);
         echo  $_POST['catatan'];
         $harga = ($data['item_price'] + $data_finishing['item_price']) * $_POST['qty'];

         $sql = "INSERT INTO tbl_upload ( cust_id, date_id, upload_name) VALUES ('" . $_SESSION['cust_id'] . "','" . $date_id . "', '" . $_POST['upload_name'] . "')";
         $result = mysqli_query($conn, $sql);

            $sql = "INSERT INTO tbl_cart (date_id ,produk_id, finishing_id, bahan_id, cust_id, produk_name, ukuran, bahan, finishing, qty, harga, create_date, deskripsi, sisi, hasil_meter) 
                   VALUES ('" . $date_id . "','" . $_POST['produk_id'] . "','" . $_POST['finishing_id'] . "','" . $_POST['item_id'] . "','" . $_SESSION['cust_id'] . "', '" . $_POST['produk_name'] . "', '" .  $ukuran . "', '" . $data['item_name'] . "','" .$data_finishing['item_name'] . "', '" . $_POST['qty'] . "','" . $harga . "', now(), '" . $_POST['catatan'] . "','" . $_POST['sisi'] . "','".$hasil_meter."')";
            $result = mysqli_query($conn, $sql);
   
         if ($result) {
            header("location: ../mlp_printing/cart.php");
         } else {
            msg('Item Gagal Ditambah', '../mlp_printing/cart.php');
         }
      }else {
         $harga = $data['item_price'] * $_POST['qty'];
         if( $_POST['produk_id'] == 1){
          $ukuran_kertas = 'A3+';
         }else{
           $ukuran_kertas = $_POST['ukuran'];
          }
          $sql = "INSERT INTO tbl_upload ( cust_id, date_id, upload_name) VALUES ('" . $_SESSION['cust_id'] . "','" . $date_id . "', '" . $_POST['upload_name'] . "')";
         $result = mysqli_query($conn, $sql);

         $sql = "INSERT INTO tbl_cart (date_id ,produk_id, finishing_id, bahan_id, cust_id, produk_name, ukuran, bahan, finishing, qty, harga, create_date, deskripsi, sisi, hasil_meter) 
                VALUES ('" . $date_id . "','" . $_POST['produk_id'] . "', null ,'" . $_POST['item_id'] . "','" . $_SESSION['cust_id'] . "', '" . $_POST['produk_name'] . "', '" . $_POST['ukuran'] . "', '" . $data['item_name'] . "',' - ', '" . $_POST['qty'] . "','" . $harga . "', now(), '" . $_POST['catatan'] . "', '" . $_POST['sisi'] . "' , '" . $ukuran_kertas . "' )";
         $result = mysqli_query($conn, $sql);
         if ($result) {
            header("location: ../mlp_printing/cart.php");
         } else {
            echo "gagal";
            // msg('Item Gagal Ditambah', '../mlp_printing/cart.php');
         }
      }
   }
}


function insertUser($conn)
{
   $sql = "SELECT * from tbl_customer where cust_email = '" . $_POST['email'] . "' ";
   $check = mysqli_query($conn, $sql); // untuk check email agar tidak bisa register dengan email yang sama
   $check_data = mysqli_fetch_assoc($check); 
   if ($check_data) { // untuk check email agar tidak bisa register dengan email yang sama
      msg('Email Sudah Pernah Dipakai', '../mlp_printing/register.php');
   } else {

    if ( $_POST['password'] ==  $_POST['password1']){
    $sql = "SELECT MAX(SUBSTR(cust_id, 6)) as custnum from tbl_customer ";
    $check = mysqli_query($conn, $sql); // untuk mencari id terakhir
    $check_data = mysqli_fetch_assoc($check);
            if( !$check_data['custnum'] ){
            $custid = "cust-3";    
            $sql = "INSERT INTO tbl_customer (cust_id,cust_name, cust_address, cust_province, cust_city, cust_email, cust_pass, cust_phone, cust_total_order, cust_total_price, cust_img, create_date) 
            VALUES ('" .$custid. "' ,'" . $_POST['nama'] . "', '" . $_POST['alamat'] . "', 'null', 'null', '" . $_POST['email'] . "',  password('" . $_POST['password'] . "'), '" . $_POST['nohp'] . "', '0', '0', 'default.jpeg', now()) ";
            $result = mysqli_query($conn, $sql);
                if ($result) {
                    msg('Register Telah Berhasil Silakan Login!!', '../mlp_printing/login.php');
                     } else {
                          msg('Register Gagal', '../mlp_printing/register.php');
                     }
            }else{
                $increment = $check_data['custnum']+1; // tambah id terakhir
                $custid = "cust-".$increment;
                $sql =  "INSERT INTO tbl_customer (cust_id,cust_name, cust_address, cust_province, cust_city, cust_email, cust_pass, cust_phone, cust_total_order, cust_total_price, cust_img, create_date) 
                VALUES ('" .$custid. "' ,'" . $_POST['nama'] . "', '" . $_POST['alamat'] . "', 'null', 'null', '" . $_POST['email'] . "',  password('" . $_POST['password'] . "'), '" . $_POST['nohp'] . "', '0', '0', 'default.jpeg', now()) ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    msg('Register Telah Berhasil Silakan Login!!', '../mlp_printing/login.php');
                     } else {
                          msg('Register Gagal', '../mlp_printing/register.php');
                     }
            }
    }else{
        msg('Password yang anda masukan tidak sama', '../mlp_printing/register.php');
        }

   }
}

function msg($pesan, $url)
{
?>
   <script type="text/javascript">
      alert('<?php echo $pesan ?>');
      window.location = '<?php echo $url ?>';
   </script>
<?php
}

