<?php
require('../connect/conn.php');
require('../session/session.php');

$sql = "select a.status_id, a.create_date, id_pesanan, cust_name, cust_address, cust_email, cust_phone, harga, bukti_bayar , status
        from tbl_detailproses a
        left join (select status, status_id, bukti_bayar from tbl_proses) b on a.status_id = b.status_id
        left join tbl_customer c on a.cust_id = c.cust_id
        group by a.status_id
        having status != 'Selesai' and status != 'DiBatalkan'
        order by create_date desc";
$getPesanan = mysqli_query($conn, $sql);


if (isset($_POST['acc_item'])) {
    accPesanan($conn);
}

if (isset($_POST['dec_item'])) {
    decPesanan($conn);
}

if (isset($_POST['get_pesanan'])) {
    getPesanan($conn);
}

function accPesanan($conn)
{
    $id = $_POST['pesan_id'];
    $c = cekStok($conn, $id);   //kalau c = 1 artinya stok kurang
    echo 'hasil cek ' . $c;
    // $sql = "";
    // return $result = mysqli_query($conn, $sql);
}

function decPesanan($conn)
{

    $id = $_POST['pesan_id'];
    $sql = "Update tbl_proses
            set status = 'DiBatalkan'
            where status_id ='" . $id . "'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        msg('Pesanan berhasil dibatalkan!!', '../admin/pesanan.php');
    } else {
        msg('Pesanan gagal dibatalkan!!', '../admin/pesanan.php');
    }
}

function getPesanan($conn)
{
    $id = $_POST['pesananID'];
    $sql = "select * from tbl_detailproses where status_id = " . $id . "";
    $result = mysqli_query($conn, $sql);
    while ($datas = mysqli_fetch_assoc($result)) {
        $results[] = $datas; //assign whole values to array
    }
    echo json_encode($results);
}


function cekStok($conn)
{

    $count = 0;
    $id = $_POST['pesan_id'];
    $sql = "select produk_id, finishing_id, bahan_id, kaki_id, qty, hasil_meter
            from tbl_detailproses where status_id = '" . $id . "'";

    $result = mysqli_query($conn, $sql);
    while ($datas = mysqli_fetch_assoc($result)) {
        $results[] = $datas; //assign whole values to array
    }

    foreach ($results as $datas) {
        $result1 = 0;

        if ($datas['produk_id'] == 1) //kalau kartu nama 
        {   // kalau stok kurang nilainya 1
            $sql1 = "select 1 from tbl_item
                    where item_id = '" . $datas['bahan_id'] . "' and item_qty < " . $datas['qty'] . "*3";

            $result1 = mysqli_query($conn, $sql1);
            $result1 = mysqli_num_rows($result1);
        } else if ($datas['produk_id'] == 2 or $datas['produk_id'] == 3) {  //dokumen hvs && poster
            $sql1 = "select 1 from tbl_item
                    where item_id = '" . $datas['bahan_id'] . "' and item_qty < " . $datas['qty'] . "";

            $result1 = mysqli_query($conn, $sql1);
            $result1 = mysqli_num_rows($result1);
        } else if ($datas['produk_id'] == 4 or $datas['produk_id'] == 8) {  //Banner standart && Sticker
            $sql1 = "select 1 from tbl_item
                    where (item_id = '" . $datas['bahan_id'] . "' or item_id = '" . $datas['finishing_id'] . "') and item_qty < (" . $datas['hasil_meter'] . "/10000)";

            $result1 = mysqli_query($conn, $sql1);
            $result1 = mysqli_num_rows($result1);
        }


        if ($result1) { // kalau stok kurang masuk sini
            $count = 1;
            break;
        }
    }

    return $count;
    // $result = mysqli_fetch_assoc($result);

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
