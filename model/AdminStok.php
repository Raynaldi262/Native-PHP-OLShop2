<?php
require('../connect/conn.php');
require('../session/session.php');

//ini buat isi option select2
$sql = "SELECT * from tbl_produk";
$getProduk = mysqli_query($conn, $sql);

//ini buat isi tabel item/bahan
$sql = "SELECT * from tbl_item where item_status = 'ACTIVE'";
$getItem = mysqli_query($conn, $sql);

$sql = "SELECT a.item_id, item_name, item_qty+ifnull(stock_out,0)+ifnull(stock_out_manual,0) as stok
            , ifnull(stock_out,0) as stock_out, ifnull(stock_out_manual,0) as stock_out_manual,  item_qty from tbl_item a 
        LEFT JOIN (select item_id, sum(stok_qty) as stock_out 
            from tbl_stockinout where stok_desc = 'STOCK OUT' group by item_id) b on a.item_id = b.item_id 
        left join (select item_id, sum(stok_qty) as stock_out_manual 
            from tbl_stockinout where stok_desc = 'STOCK OUT MANUAL' group by item_id) c on a.item_id = c.item_id
        where item_status = 'ACTIVE'";
$getItemStok = mysqli_query($conn, $sql);

if (isset($_POST['insertBahan'])) {
    insertBahan($conn);
}

if (isset($_POST['stok_item']) or isset($_POST['get_item']) or isset($_POST['stok_item'])) {
    getBahan($conn);
}

if (isset($_POST['editBahan'])) {
    editBahan($conn);
}

if (isset($_POST['delete_item'])) {
    deleteBahan($conn);
}

if (isset($_POST['add_stok'])) {
    addStok($conn);
}

if (isset($_POST['dec_stok'])) {
    decStok($conn);
}

function insertBahan($conn)
{
    $name = $_POST['name'];
    $supplier = $_POST['supplier'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $price = $_POST['price'];
    $produk[] = $_POST['produk'];
    $desc = $_POST['desc'];


    $sql = "insert into tbl_item (item_name, supplier, item_type, item_qty, item_price, item_desc, create_date, item_status)
        values('" . $name . "', '" . $supplier . "','" . $satuan . "'," . $qty . ", " . $price . ", '" . $desc . "', now(), 'ACTIVE')";

    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT LAST_INSERT_ID()";
    $result2 = mysqli_query($conn, $sql2);
    $item_id = mysqli_fetch_row($result2);

    // insert ke tbl relasi
    foreach ($produk as $data) {
        foreach ($data as $value) {
            $sql3 = "insert into tbl_relasi (item_id, produk_id)
            values(" . $item_id[0] . ", " . $value . ")";

            $result3 = mysqli_query($conn, $sql3);
        }
    }

    //insert ke pencatatan stok
    $sql4 = "insert into tbl_stockinout (item_id, item_name, stok_qty , create_date, stok_desc, total_qty, keterangan) 
            values(" . $item_id[0] . ", '" . $name . "', 0, now() , 'STOCK IN', " . $qty . ", 'Barang baru diinput')";
    $result4 = mysqli_query($conn, $sql4);

    if ($result == 1 && $result3 == 1 && $result4 == 1) {
        msg('Bahan Berhasil ditambahkan!!', '../admin/bahan.php');
    } else {
        msg('Bahan gagal ditambahkan!!', '../admin/bahan.php');
    }
}

function getProdukWhere($conn, $id)
{
    $sql = "select a.produk_id, produk_name from tbl_produk a 
            join tbl_relasi b on a.produk_id = b.produk_id
            where item_id = " . $id . "";
    $result = mysqli_query($conn, $sql);

    while ($datas = mysqli_fetch_assoc($result)) {
        $results[] = $datas; //assign whole values to array
    }

    return $results;
}

function getBahan($conn)
{
    $id = $_POST['itemId'];

    $sql = "select * from tbl_item a join
            (select item_id, a.produk_id, produk_name from tbl_produk a join tbl_relasi b on a.produk_id = b.produk_id) b
            on a.item_id = b.item_id
            where a.item_id = " . $id . "";
    $result = mysqli_query($conn, $sql);
    $results = [];

    while ($datas = mysqli_fetch_assoc($result)) {
        $results[] = $datas; //assign whole values to array
    }

    echo json_encode($results);
    // echo json_encode('aasd');
}

function editBahan($conn)
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $supplier = $_POST['supplier'];
    $satuan = $_POST['satuan'];
    $qty = $_POST['qty'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $produk[] = $_POST['produk'];

    $sql = "update tbl_item set item_name = '" . $name . "', supplier = '" . $supplier . "', item_type = '" . $satuan . "',
        item_qty = " . $qty . ", item_price = " . $price . ", item_desc = '" . $desc . "' where item_id = " . $id . "";

    $result = mysqli_query($conn, $sql);

    $sql2 = "delete from tbl_relasi where item_id = " . $id . " ";
    $result2 = mysqli_query($conn, $sql2);


    foreach ($produk as $data) {
        foreach ($data as $value) {
            $sql3 = "insert into tbl_relasi (item_id, produk_id)
            values(" . $id . ", " . $value . ")";

            $result3 = mysqli_query($conn, $sql3);
        }
    }

    if ($result == 1 && $result3 == 1) {
        msg('Bahan Berhasil diubah!!', '../admin/bahan.php');
    } else {
        msg('Bahan gagal diubah!!', '../admin/bahan.php');
    }
}

function deleteBahan($conn)
{
    $id = $_POST['id_hapus'];
    $sql = "Update tbl_item set item_status = 'IN-ACTIVE' where item_id = " . $id . "";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        msg('Bahan Berhasil dihapus!!', '../admin/bahan.php');
    } else {
        msg('Bahan gagal dihapus!!', '../admin/bahan.php');
    }
}

function addStok($conn)
{
    $id = $_POST['stok_id'];
    $name = $_POST['stok_name'];
    $stokOld = $_POST['stok_old'];
    $stok = $_POST['stok'];
    $total = $stokOld + $stok;

    $sql = "update tbl_item set item_qty = " . $total . " where item_id = " . $id . "";
    $result = mysqli_query($conn, $sql);

    $sql2 = "insert into tbl_stockinout (item_id, item_name, stok_qty ,stok_desc, create_date, total_qty, keterangan) 
                values(" . $id . ", '" . $name . "', " . $stok . ",'STOCK IN', now(), " . $total . ", 'Barang ditambahkan' )";
    $result2 = mysqli_query($conn, $sql2);

    if ($result2 == 1 && $result == 1) {
        msg('Stok Berhasil ditambahkan!!', '../admin/stok.php');
    } else {
        msg('Stok gagal ditambahkan!!', '../admin/stok.php');
    }
}

function decStok($conn)
{
    $id = $_POST['stok_id2'];
    $name = $_POST['stok_name2'];
    $stokOld = $_POST['stok_old2'];
    $stok = $_POST['stok2'];
    $total = $stokOld - $stok;

    $sql = "update tbl_item set item_qty = " . $total . " where item_id = " . $id . "";
    $result = mysqli_query($conn, $sql);

    $sql2 = "insert into tbl_stockinout (item_id, item_name, stok_qty ,stok_desc, create_date, total_qty, keterangan) 
                values(" . $id . ", '" . $name . "', " . $stok . ",'STOCK OUT MANUAL', now(), " . $total . ", 'Barang dikurangkan manual' )";
    $result2 = mysqli_query($conn, $sql2);

    if ($result2 == 1 && $result == 1) {
        msg('Stok Berhasil dikurangkan!!', '../admin/stok.php');
    } else {
        msg('Stok gagal dikurangkan!!', '../admin/stok.php');
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
