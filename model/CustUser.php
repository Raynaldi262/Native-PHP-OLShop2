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

if (isset($_POST['checkout'])) {
   AddCheckout($conn);
}
if (isset($_POST['batalcheck'])) {
   BatalCheck($conn);
}
if (isset($_POST['bayar'])) {
   ProsesBayar($conn);
}
if (isset($_POST['UbahPassword'])) {
   UbahPassword($conn);
}

if (isset($_POST['updateprofile'])) {
   UpdateProfile($conn);
}



function getDataUser($cust_id, $conn)
{
   $sql = "SELECT * from tbl_customer where cust_id = '" . $cust_id . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}

function getDataItem($conn)
{
   $sql = "SELECT item_id, item_price from tbl_item ";
   $item = mysqli_query($conn, $sql);
   return $item;
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

function GetDataOrder($id,$conn){
   $sql = "SELECT * from tbl_order where status_id = '".$id."' ";
   $item = mysqli_query($conn, $sql);
   $data  = mysqli_fetch_assoc($item);
   return $data;
}

function GetDataBahan($id,$conn){
   $sql = "SELECT * FROM tbl_item INNER JOIN tbl_relasi on tbl_item.item_id = tbl_relasi.item_id where tbl_relasi.produk_id = '".$id."' && tbl_item.item_desc = 'BAHAN' && item_status = 'ACTIVE'";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetDataFinishing($id, $conn){
   $sql = "SELECT * FROM tbl_item INNER JOIN tbl_relasi on tbl_item.item_id = tbl_relasi.item_id where tbl_relasi.produk_id = '".$id."' && tbl_item.item_desc = 'FINISHING' && item_status = 'ACTIVE' ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetDataKaki($id, $conn){
   $sql = "SELECT * FROM tbl_item INNER JOIN tbl_relasi on tbl_item.item_id = tbl_relasi.item_id where tbl_relasi.produk_id = '".$id."' && tbl_item.item_desc = 'KAKI' && item_status = 'ACTIVE' LIMIT 1;";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}

function getDataProses($cust_id,$conn){
   $sql = "SELECT * from tbl_proses where cust_id = '".$cust_id."' ORDER BY create_date desc";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function getDataProses2($id,$conn){
   $sql = "SELECT * from tbl_proses where status_id = '".$id."' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}

function getDataCart($cust_id,$conn)
{
   $sql = "SELECT * from tbl_cart where cust_id = '" . $cust_id . "' ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function getDataDetailProses($id,$conn)
{
   $sql = "SELECT * from tbl_detailproses where status_id = '" . $id . "' ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function getDataCheckout($cust_id,$conn)
{
   $sql = "SELECT * from tbl_checkout where cust_id = '" . $cust_id . "' ";
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

function BatalCheck($conn){
   $sql = "DELETE FROM tbl_checkout WHERE tbl_checkout . cust_id = '" . $_SESSION['cust_id'] . "' ";
   mysqli_query($conn, $sql);
   header("location: ../mlp_printing/checkout.php");
}

function UbahPassword($conn)
{
   $password = trim($_POST['passlama']);
   $sql = "SELECT * FROM  tbl_customer WHERE cust_pass =  password('" . $password . "')";
   $result = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($result);
   if($data){
      if ($_POST['pass1'] == $_POST['pass2']) {
         $sql = "UPDATE tbl_customer SET cust_pass = password('" . $_POST['pass1'] . "') WHERE cust_id = '" . $_SESSION['cust_id'] . "' ";
         $result = mysqli_query($conn, $sql);

            if ($result) {
         msg('Password berhasil diubah!!', '../mlp_printing/profile.php');
      } else {
         msg('Gagal Mengubah data!!', '../mlp_printing/profile.php');
      }
      } else {
         msg('Password tidak sama!!', '../mlp_printing/profile.php');
      }
   }else{
      msg('Password lama salah!!', '../mlp_printing/profile.php');
   }

}

function UpdateProfile($conn)
{
   $img = $_FILES['img']['name'];
   if ($img) {  // kalau upload gambar
      $nama = $_FILES['img']['name'];
      $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
      $x = explode('.', $nama);   // dpt nama tanpa ekstensi file
      $ekstensi = strtolower(end($x));    // jdiin hruf kecil ekstensinya
      $ukuran    = $_FILES['img']['size'];   //ukuran brp
      $file_tmp = $_FILES['img']['tmp_name'];    //temp filenya apa
      if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {    // kalau ekstensinya bener
         if ($ukuran < 4044070) {        // max 4 mb
            move_uploaded_file($file_tmp, '../mlp_printing/images/Profile/' . $nama);

            $sql = "UPDATE tbl_customer SET cust_name = '" . $_POST['nama'] . "'  , cust_address = '" . $_POST['address'] . "' , cust_email = '" . $_POST['email'] . "', cust_phone = '" . $_POST['nohp'] . "', cust_img = '" . $img . "' WHERE cust_id = '" . $_SESSION['cust_id'] . "' ";
            $result = mysqli_query($conn, $sql);

            if ($result) {
               msg('Data berhasil diubah!!', '../mlp_printing/profile.php');
            } else {
               msg('Gagal Mengubah data!!', '../mlp_printing/profile.php');
            }
         } else {
            msg('Ukuran file max 4mb!!', '../mlp_printing/profile.php');
         }
      } else {
         msg('Ekstensi File yang diupload hanya diperbolehkan png / jpg!!', '../mlp_printing/profile.php');
      }
   } else {
      $sql = "UPDATE tbl_customer SET cust_name = '" . $_POST['nama'] . "' , cust_address = '" . $_POST['address'] . "', cust_email = '" . $_POST['email'] . "', cust_phone = '" . $_POST['nohp'] . "' WHERE cust_id = '" . $_SESSION['cust_id'] . "' ";
      $result = mysqli_query($conn, $sql);

      if ($result) {
         msg('Data berhasil diubah!!', '../mlp_printing/profile.php');
      } else {
         msg('Gagal Mengubah data!!', '../mlp_printing/profile.php');
      }
   }
}




function addChart($conn)
{

   echo $_POST['item_id'];
   if (!isset($_SESSION['cust_id'])) {
      msg('Silakan Login dahulu', '../mlp_printing/login.php');
   } else {
      date_default_timezone_set("Asia/Bangkok");
      $date_id = date("his") . date("Ymd");
      $sql = "SELECT * from tbl_item where item_id = '" . $_POST['item_id'] . "' ";
      $item = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($item);

         if (isset($_POST['finishing_id'])) {
            
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

            $sql = "INSERT INTO tbl_cart (date_id ,produk_id, finishing_id, bahan_id, kaki_id , cust_id, produk_name, ukuran, bahan, finishing, qty, harga, create_date, deskripsi, sisi, hasil_meter, upload_name) 
                   VALUES ('" . $date_id . "','" . $_POST['produk_id'] . "','" . $_POST['finishing_id'] . "','" . $_POST['item_id'] . "' ,'" . $_POST['kaki'] . "', '" . $_SESSION['cust_id'] . "', '" . $_POST['produk_name'] . "', '" .  $ukuran . "', '" . $data['item_name'] . "','" .$data_finishing['item_name'] . "', '" . $_POST['qty'] . "','" . $_POST['total_harga']  . "', now(), '" . $_POST['catatan'] . "','" . $_POST['sisi'] . "','".$hasil_meter."','".$_POST['upload_name']."')";
            $result = mysqli_query($conn, $sql);
   
         if ($result) {
            header("location: ../mlp_printing/cart.php");
         } else {
            msg('Item Gagal Ditambah', '../mlp_printing/cart.php');
         }
      }else {
         if( $_POST['produk_id'] == 1){
          $ukuran_kertas = 'A3+';
         }else{
           $ukuran_kertas = $_POST['ukuran'];
          }
         $sql = "INSERT INTO tbl_cart (date_id ,produk_id, finishing_id, bahan_id, kaki_id, cust_id, produk_name, ukuran, bahan, finishing, qty, harga, create_date, deskripsi, sisi,hasil_meter, upload_name) 
                VALUES ('" . $date_id . "','" . $_POST['produk_id'] . "', null ,'" . $_POST['item_id'] . "', 0 ,'" . $_SESSION['cust_id'] . "', '" . $_POST['produk_name'] . "', '" . $_POST['ukuran'] . "', '" . $data['item_name'] . "',' - ', '" . $_POST['qty'] . "','" . $_POST['total_harga'] . "', now(), '" . $_POST['catatan'] . "', '" . $_POST['sisi'] . "' , '" . $ukuran_kertas . "', '" . $_POST['upload_name'] . "' )";
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


function ProsesBayar($conn)
{  
  if ($_POST['total_harga'] == 0){
    msg('Checkout Tidak ada Isi!!', '../mlp_printing/checkout.php');
  }else{
   date_default_timezone_set("Asia/Bangkok");
   $date_id = date("his") . date("Ymd");
   $nama = $_FILES['img']['name'];
   $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
   $x = explode('.', $nama);   // dpt nama tanpa ekstensi file
   $ekstensi = strtolower(end($x));    // jdiin hruf kecil ekstensinya
   $ukuran    = $_FILES['img']['size'];   //ukuran brp
   $file_tmp = $_FILES['img']['tmp_name'];    //temp filenya apa
   if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {    // kalau ekstensinya bener
      if ($ukuran < 4044070) {        // max 4 mb
         move_uploaded_file($file_tmp, '../mlp_printing/images/bayar/' . $date_id . $nama);
         $name_img = $date_id.$nama;
         $sql = "INSERT INTO tbl_proses (cust_id,status_id,status,bukti_bayar, create_date) VALUES ('" .$_SESSION['cust_id']. "','" . $date_id . "', 'Mengunggu Konfirmasi', '".$name_img."' , now()) ";
         $result = mysqli_query($conn, $sql);


            $sql = "SELECT MAX(SUBSTR(id_pesanan, 5)) as custnum from tbl_detailproses ";
            $check = mysqli_query($conn, $sql); // untuk mencari id terakhir
            $check_data = mysqli_fetch_assoc($check);
            $increment = $check_data['custnum']+1; // tambah id terakhir
            $spktid = "SPK-".$increment;

            $sql = "SELECT * from tbl_checkout where cust_id = '" . $_SESSION['cust_id'] . "' ";
              $item = mysqli_query($conn, $sql);
              while ($data = mysqli_fetch_assoc($item)) {
                    if( !$check_data['custnum'] ){

               $sql = "INSERT INTO tbl_detailproses ( date_id ,produk_id, finishing_id, bahan_id, kaki_id , cust_id, produk_name, ukuran, bahan, finishing, qty, harga, create_date, deskripsi, sisi,hasil_meter, upload_name,status_id,id_pesanan) 
                  VALUES ( '" . $data['date_id'] . "','" . $data['produk_id'] . "', '" . $data['finishing_id'] . "' ,'" . $data['bahan_id'] . "', '" . $data['kaki_id'] . "' ,'" . $data['cust_id'] . "', '" . $data['produk_name'] . "', '" . $data['ukuran'] . "', '" . $data['bahan'] . "', '" . $data['finishing'] . "', '" . $data['qty'] . "','" . $data['harga'] . "', now(), '" . $data['deskripsi'] . "', '" . $data['sisi'] . "', '" . $data['hasil_meter'] . "' , '" . $data['upload_name'] . "', '" . $date_id . "', 'SPK-1')";
                  $result = mysqli_query($conn, $sql);
                 $sql = "DELETE FROM tbl_checkout WHERE tbl_checkout . checkout_id = " . $data['checkout_id'] . "";
                 mysqli_query($conn, $sql);                      
                    }else{
               $sql = "INSERT INTO tbl_detailproses ( date_id ,produk_id, finishing_id, bahan_id, kaki_id , cust_id, produk_name, ukuran, bahan, finishing, qty, harga, create_date, deskripsi, sisi,hasil_meter, upload_name,status_id,id_pesanan) 
                  VALUES ( '" . $data['date_id'] . "','" . $data['produk_id'] . "', '" . $data['finishing_id'] . "' ,'" . $data['bahan_id'] . "', '" . $data['kaki_id'] . "' ,'" . $data['cust_id'] . "', '" . $data['produk_name'] . "', '" . $data['ukuran'] . "', '" . $data['bahan'] . "', '" . $data['finishing'] . "', '" . $data['qty'] . "','" . $data['harga'] . "', now(), '" . $data['deskripsi'] . "', '" . $data['sisi'] . "' , '" . $data['hasil_meter'] . "', '" . $data['upload_name'] . "', '" . $date_id . "', '" . $spktid . "')";
                  $result = mysqli_query($conn, $sql);
                 $sql = "DELETE FROM tbl_checkout WHERE tbl_checkout . checkout_id = " . $data['checkout_id'] . "";
                 mysqli_query($conn, $sql);                

                    }

            }

         if ($result) {
            header("location: ../mlp_printing/pesanan.php");
         } else {
            msg('Gagal Upload data!!', '../mlp_printing/checkout.php');
         }
      } else {
         msg('Ukuran file max 4mb!!', '../mlp_printing/checkout.php');
      }
   } else {
      msg('Ekstensi File yang diupload hanya diperbolehkan png, jpg, Jpeg!!', '../mlp_printing/checkout.php');
   }
  }
}

function AddCheckout($conn)
{  

   $sql = "SELECT * from tbl_cart where cust_id = '" . $_SESSION['cust_id'] . "' ";
   $item = mysqli_query($conn, $sql);

   while ($data = mysqli_fetch_assoc($item)) {
      $sql = "INSERT INTO tbl_checkout ( date_id ,produk_id, finishing_id, bahan_id, kaki_id , cust_id, produk_name, ukuran, bahan, finishing, qty, harga, create_date, deskripsi, sisi,hasil_meter, upload_name) 
          VALUES ( '" . $data['date_id'] . "','" . $data['produk_id'] . "', '" . $data['finishing_id'] . "' ,'" . $data['bahan_id'] . "', '" . $data['kaki_id'] . "' ,'" . $data['cust_id'] . "', '" . $data['produk_name'] . "', '" . $data['ukuran'] . "', '" . $data['bahan'] . "', '" . $data['finishing'] . "', '" . $data['qty'] . "','" . $data['harga'] . "', now(), '" . $data['deskripsi'] . "', '" . $data['sisi'] . "' , '" . $data['hasil_meter'] . "', '" . $data['upload_name'] . "')";
      $result = mysqli_query($conn, $sql);
      $sql = "DELETE FROM tbl_cart WHERE tbl_cart . cart_id = " . $data['cart_id'] . "";
      mysqli_query($conn, $sql);
      }
  
   header("location: ../mlp_printing/checkout.php");
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
            $sql = "INSERT INTO tbl_customer (cust_id,cust_name, cust_address, cust_email, cust_pass, cust_phone, cust_img, create_date) 
            VALUES ('" .$custid. "' ,'" . $_POST['nama'] . "', '" . $_POST['alamat'] . "', '" . $_POST['email'] . "',  password('" . $_POST['password'] . "'), '" . $_POST['nohp'] . "', 'default.jpeg', now()) ";
            $result = mysqli_query($conn, $sql);
                if ($result) {
                    msg('Register Telah Berhasil Silakan Login!!', '../mlp_printing/login.php');
                     } else {
                          msg('Register Gagal', '../mlp_printing/register.php');
                     }
            }else{
                $increment = $check_data['custnum']+1; // tambah id terakhir
                $custid = "cust-".$increment;
                $sql =  "INSERT INTO tbl_customer (cust_id,cust_name, cust_address, cust_email, cust_pass, cust_phone, cust_img, create_date) 
                VALUES ('" .$custid. "' ,'" . $_POST['nama'] . "', '" . $_POST['alamat'] . "', '" . $_POST['email'] . "',  password('" . $_POST['password'] . "'), '" . $_POST['nohp'] . "', 'default.jpeg', now()) ";
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

