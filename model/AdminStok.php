<?php
require('../connect/conn.php');
require('../session/session.php');

//ini buat isi option select2
$sql = "SELECT * from tbl_produk";
$getProduk = mysqli_query($conn, $sql);

//ini buat isi tabel item/bahan
$sql = "SELECT * from tbl_item";
$getItem = mysqli_query($conn, $sql);

if (isset($_POST['insertBahan'])) {
    insertBahan($conn);
}

if (isset($_POST['stok_item'])) {
    getBahan($conn);
}

if (isset($_POST['editBahan'])) {
    editBahan($conn);
}


function insertBahan($conn)
{
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $price = $_POST['price'];
    $produk[] = $_POST['produk'];
    $desc = $_POST['desc'];
    $size = $_POST['size'];

    if ($satuan == 'PCS') { //beda di size klo pcs masukin size
        $sql = "insert into tbl_item (item_name, item_type, item_size, item_qty, item_price, item_desc, create_date)
            values('" . $name . "', '" . $satuan . "', '" . $size . "'," . $qty . ", " . $price . ", '" . $desc . "', now())";
    } else {
        $sql = "insert into tbl_item (item_name, item_type, item_qty, item_price, item_desc, create_date)
        values('" . $name . "', '" . $satuan . "'," . $qty . ", " . $price . ", '" . $desc . "', now())";
    }

    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT LAST_INSERT_ID()";
    $result2 = mysqli_query($conn, $sql2);
    $item_id = mysqli_fetch_row($result2);

    foreach ($produk as $data) {
        foreach ($data as $value) {
            $sql3 = "insert into tbl_relasi (item_id, produk_id)
            values(" . $item_id[0] . ", " . $value . ")";

            $result3 = mysqli_query($conn, $sql3);
        }
    }

    if ($result == 1 && $result3 == 1) {
        msg('Bahan Berhasil ditambahkan!!', '../admin/stok.php');
    } else {
        msg('Bahan gagal ditambahkan!!', '../admin/stok.php');
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
    $satuan = $_POST['satuan'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    // $produk[] = $_POST['produk'];

    die($satuan);
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
