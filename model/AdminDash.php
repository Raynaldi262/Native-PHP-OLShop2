<?php
require('../connect/conn.php');
require('../session/session.php');

$sql = "SELECT count(proses_id) jmlh from tbl_proses where status not in ('Selesai','DiBatalkan','Belum Bayar')";
$result = mysqli_query($conn, $sql);
$pesanan = mysqli_fetch_assoc($result);

$sql1 = "SELECT count(item_id) jmlh from tbl_item where item_qty < 20 and item_status = 'ACTIVE'";
$result1 = mysqli_query($conn, $sql1);
$stok = mysqli_fetch_assoc($result1);


$sql2 = "SELECT count(proses_id) jmlh from tbl_proses 
        where create_date >= CURDATE() and status = 'Selesai'";
$result2 = mysqli_query($conn, $sql2);
$laporan = mysqli_fetch_assoc($result2);


$sql3 = "SELECT count(cust_id) jmlh from tbl_customer";
$result3 = mysqli_query($conn, $sql3);
$cust = mysqli_fetch_assoc($result3);

if (isset($_POST['insert_admin'])) {
    insertAdmin($conn);
}

function updateAdmin($conn)
{
    $id = $_POST['id'];
    $status = $_POST['status'];
    $wewenang = $_POST['wewenang'];
    $phone = $_POST['phone'];

    $sql = "update tbl_admin 
            set admin_status = '" . $status . "' , role_id = " . $wewenang . ", admin_phone = '" . $phone . "'
            where admin_id = " . $id . "";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        msg('Data Berhasil diperbarui!!', '../admin/data_admin.php');
    } else {
        msg('Data gagal diperbarui!!', '../admin/data_admin.php');
    }
}


function check_pass($id, $pass, $conn)
{
    $sql = "select 1 from tbl_admin where admin_id = " . $id . " and password(password_adm) = '" . $pass . "' ";
    return $result = mysqli_query($conn, $sql);
}

function getAdmin($conn)
{
    $sql = "select * from tbl_admin where admin_id = " . $_POST['admin_id'] . "";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    echo json_encode($result);
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
