<?php
// header('Content-type: text/plain');
require('../connect/conn.php');
require('../session/session.php');

$sql = "select a.status_id, a.create_date, id_pesanan, cust_name, cust_address, cust_email, cust_phone, sum(harga) harga, bukti_bayar , status
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

if (isset($_POST['finish_item'])) {
    finPesanan($conn);
}

if (isset($_POST['get_pesanan'])) {
    getPesanan($conn);
}

function accPesanan($conn)
{
    $id = $_POST['pesan_id'];   // isinya gini 08284620210507
    $stok[] = cekStok($conn, 1);   //1 brti return barang kurang atau tidak
    $items[] = cekStok($conn, 2);    // 2 brti item dari pesanan

    if (!empty($stok[0])) { // kalau stok kurang
        $kalimat = '';

        foreach ($stok as $data) {
            foreach ($data as $datas) {
                $kalimat = $kalimat . '\n       ' . $datas['item_name'] . ', ' . $datas['stok'] . '/' . $datas['item_type'];
            }
        }
        msg("Terjadi Kekurangan Stok pada item : " . $kalimat . '\nLakukan penambahan stok atau batalkan pesanan', '../admin/pesanan.php');
    } else {

        // update tbl proses
        $sql = "update tbl_proses
            set status = 'Di Proses'
            where status_id = '" . $id . "'";

        $result = mysqli_query($conn, $sql);

        foreach ($items as $data) {
            foreach ($data as $datas) {
                // update stok item
                $sql2 = "update tbl_item    
                set item_qty = " . $datas['total'] . "
                where item_id = '" . $datas['item_id'] . "'";

                $result2 = mysqli_query($conn, $sql2);

                // update history stok
                $qty = $datas['item_qty'] - $datas['total'];
                $sql3 = "insert into tbl_stockinout(item_id, item_name, stok_qty, stok_desc, total_qty, keterangan,create_date)
                    values(" . $datas['item_id'] . ", '" . $datas['item_name'] . "', " . $qty . ", 'STOCK OUT'
                    , " . $datas['total'] . ", 'Barang dikurangkan otomatis', now())";

                $result3 = mysqli_query($conn, $sql3);
            }
        }

        $inv = getInvId($conn);
        $invData = getInvData($conn, $id);

        // insert tbl order
        $sql4 = "insert into tbl_order (invoice, total_price, order_transfer, order_status, cust_id, status_id, create_date) 
                    values('" . $inv . "', " . $invData['harga'] . ", '" . $invData['bukti_bayar'] . "', '" . $invData['status'] . "', '" . $invData['cust_id'] . "', '" . $invData['status_id'] . "', now())";

        $result4 = mysqli_query($conn, $sql4);

        if ($result == 1 && $result2 == 1 && $result3 == 1 && $result4 == 1) {
            msg('Pesanan berhasil dikonfirmasi!!', '../admin/pesanan.php');
        } else {
            msg('Ada kesalahan pada update !!', '../admin/pesanan.php');
        }
    }
}

function decPesanan($conn)  // tolak pesanan
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

function finPesanan($conn)  // tolak pesanan
{
    $id = $_POST['pesan_id'];
    $sql = "Update tbl_proses
            set status = 'Selesai'
            where status_id ='" . $id . "'";

    $result = mysqli_query($conn, $sql);

    $sql2 = "update tbl_order 
    set order_status = 'Selesai'
    where status_id = '" . $id . "'";

    $result2 = mysqli_query($conn, $sql2);

    if ($result == 1 && $result2 == 1) {
        msg('Status pesanan berhasil diubah!!', '../admin/pesanan.php');
    } else {
        msg('Status pesanan gagal diubah!!', '../admin/pesanan.php');
    }
}

function getPesanan($conn)  // data pesanan
{
    $id = $_POST['pesananID'];
    $sql = "select * from tbl_detailproses where status_id = " . $id . "";
    $result = mysqli_query($conn, $sql);
    while ($datas = mysqli_fetch_assoc($result)) {
        $results[] = $datas; //assign whole values to array
    }
    echo json_encode($results);
}


function cekStok($conn, $flag)
{
    $stok = [];
    $tmp = [];
    $tmp2 = [];
    $id = $_POST['pesan_id'];
    $sql = "select produk_id, finishing_id, bahan_id, kaki_id, qty, hasil_meter
            from tbl_detailproses where status_id = '" . $id . "'";

    $result = mysqli_query($conn, $sql);
    while ($datas = mysqli_fetch_assoc($result)) {  //dpt data sql
        $results[] = $datas; //assign whole values to array
        // var_dump($datas);
        // echo "<br>";
    }

    foreach ($results as $id) { //dpt id yg berbeda
        $item_id[] = $id['bahan_id'];
        $item_id[] = $id['finishing_id'];
        $item_id[] = $id['kaki_id'];
    }

    $item_id = array_values(array_unique($item_id));
    // echo "<br>";
    // var_dump($item_id);
    // echo "<br>";
    // echo "<br>";

    foreach ($item_id as $item) {   // buat array yg isinya id sama nilainya masih 0
        $tmp[] = array('id' => $item, 'total' => 0);
    }

    foreach ($results as $datas) {
        foreach ($tmp as &$id) {
            if ($datas['produk_id'] == 1) {  //kalau kartu nama 
                if ($datas['bahan_id'] == $id['id']) {
                    $id['total'] += ($datas['qty'] * 3);
                }
            } else if ($datas['produk_id'] == 2 or $datas['produk_id'] == 3) {
                if ($datas['bahan_id'] == $id['id']) {
                    $id['total'] += ($datas['qty']);
                }
            } else if ($datas['produk_id'] == 4 or $datas['produk_id'] == 8) {
                if ($datas['bahan_id'] == $id['id']) {
                    $id['total'] += ($datas['hasil_meter'] / 10000) * $datas['qty'];
                } else if ($datas['finishing_id'] == $id['id']) {
                    $id['total'] += ($datas['hasil_meter'] / 10000) * $datas['qty'];
                }
            } else if ($datas['produk_id'] == 5 or $datas['produk_id'] == 6) {
                if ($datas['bahan_id'] == $id['id']) {
                    $id['total'] += ($datas['hasil_meter'] / 10000) * $datas['qty'];
                } else if ($datas['finishing_id'] == $id['id']) {
                    $id['total'] += ($datas['hasil_meter'] / 10000) * $datas['qty'];
                } else if ($datas['kaki_id'] == $id['id']) {
                    $id['total'] += $datas['qty'];
                }
            } else if ($datas['produk_id'] == 7) {
                if ($datas['hasil_meter'] == 'A3+') {
                    $ukuran = 500;
                } else if ($datas['hasil_meter'] == 'A4') {
                    $ukuran = 250;
                } else if ($datas['hasil_meter'] == 'A5') {
                    $ukuran = 125;
                }

                if ($datas['bahan_id'] == $id['id']) {
                    $id['total'] += $ukuran * $datas['qty'];
                }
            }
        }
    }

    // echo "<br>";
    // var_dump($tmp);

    foreach ($tmp as $data) {
        //keluarin data yg kurang aja
        $sql2 = "Select item_id, item_name, (item_qty-" . $data['total'] . ") stok,item_type from tbl_item
                where item_id = " . $data['id'] . " and item_qty <" . $data['total'] . " ";

        $result2 = mysqli_query($conn, $sql2);
        while ($datas = mysqli_fetch_assoc($result2)) {
            $stok[] = $datas; //assign whole values to array
        }

        //keluarin semua data pesanana
        $sql3 = "Select item_id, item_name, item_qty ,item_type, (item_qty-" . $data['total'] . ") total from tbl_item
                where item_id = " . $data['id'] . "";

        $result3 = mysqli_query($conn, $sql3);
        while ($datas = mysqli_fetch_assoc($result3)) {
            $tmp2[] = $datas; //assign whole values to array
        }
    }

    // echo "<br>";
    // echo "<br>";
    // var_dump($stok);
    if ($flag == 1)
        return $stok;
    else if ($flag == 2)
        return $tmp2;
}

function getInvId($conn)
{
    $sql = "SELECT MAX(SUBSTR(invoice, 4)) as inv from tbl_order";
    $check = mysqli_query($conn, $sql); // untuk mencari id terakhir
    $check_data = mysqli_fetch_assoc($check);
    $increment = $check_data['inv'] + 1; // tambah id terakhir
    $invoice = "INV-" . $increment;

    return $invoice;
}

function getInvData($conn, $id)
{
    $sql = "select sum(harga) harga, b.bukti_bayar, status, b.cust_id, b.status_id
            from tbl_detailproses a join
            tbl_proses b on a.status_id = b.status_id
            where b.status_id = '" . $id . "'";
    $result = mysqli_query($conn, $sql); // untuk mencari data invoice
    $data = mysqli_fetch_assoc($result);
    return $data;
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
