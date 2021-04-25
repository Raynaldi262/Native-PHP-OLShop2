<?php
require('../connect/conn.php');

if (isset($_POST['register'])) {
    insertUser($conn);
 }


function insertUser($conn)
{
   $sql = "SELECT * from tbl_customer where cust_email = '" . $_POST['email'] . "' ";
   $check = mysqli_query($conn, $sql); // untuk check email agar tidak bisa register dengan email yang sama
   $check_data = mysqli_fetch_assoc($check); 
   if ($check_data) { // untuk check email agar tidak bisa register dengan email yang sama
      msg('Email Sudah Pernah Dipakai', '../mpl_printing/register.php');
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
                    msg('Register Telah Berhasil Silakan Login!!', '../mpl_printing/login.php');
                     } else {
                          msg('Register Gagal', '../mpl_printing/register.php');
                     }
            }else{
                $increment = $check_data['custnum']+1; // tambah id terakhir
                $custid = "cust-".$increment;
                $sql =  "INSERT INTO tbl_customer (cust_id,cust_name, cust_address, cust_province, cust_city, cust_email, cust_pass, cust_phone, cust_total_order, cust_total_price, cust_img, create_date) 
                VALUES ('" .$custid. "' ,'" . $_POST['nama'] . "', '" . $_POST['alamat'] . "', 'null', 'null', '" . $_POST['email'] . "',  password('" . $_POST['password'] . "'), '" . $_POST['nohp'] . "', '0', '0', 'default.jpeg', now()) ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    msg('Register Telah Berhasil Silakan Login!!', '../mpl_printing/login.php');
                     } else {
                          msg('Register Gagal', '../mpl_printing/register.php');
                     }
            }
    }else{
        msg('Password yang anda masukan tidak sama', '../mpl_printing/register.php');
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

