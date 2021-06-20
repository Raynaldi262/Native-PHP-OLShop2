<?php
require('../model/CustUser.php');
// $item = getDetailProses($_GET['id']);
// $datauser = getDataUser($_GET['idu']);
// $data_onkir = getDataOngkir($datauser['cust_city']);
// $data_order = getDataOrder($_GET['id']);
// $dataproses = getProsesDataDetail($_GET['id']);

$item = getDataDetailProses($_GET['id'], $conn);
$datauser = getDataUser($_GET['idu'], $conn);
$data_order = getDataOrder($_GET['id'], $conn);

// if (isset($_SESSION['cust_id'])) {
// 	$data_cart = getcartCount($_GET['idu']);
// 	$data_check = getcheckCount($_GET['idu']);
// 	$proses_count = getProsesCount($_GET['idu']);
// } else {
// 	$data_cart['juml'] = 0;
// 	$data_check['juml'] = 0;
// 	$proses_count['juml'] = 0;
// }
$totalharga = 0;
// $totalberat = 0;

ob_start();
?>
<style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        padding: 20px;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: gray;
        color: white;
    }

    .harga th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: Orange;
        color: white;
    }
</style>
<div style="text-align:center">
    <!-- <img width="100" src="images/home/logo.png"/> -->
    <table id="example1" class="table table-bordered table-striped" align="center">
        <thead>
            <tr>
                <td>
                    <img width="100" src="../dist/img/logo.jpg" />
                </td>
                <td colspan="5" align="center">
                    <h1><u>Invoice</u></h1>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tanggal invoice : </td>
                <td>Penerima : </td>
            </tr>
            <tr>
                <td colspan="1">No Invoice : </td>
            </tr>
            <tr>
                <td colspan="1">ID Pemesanan : </td>
            </tr>
        </tbody>
    </table>

    <table id="example1" class="table table-bordered table-striped" align="center">
        <thead>
            <tr align="center">
                <th>Nama Produk</th>
                <th>Ukuran</th>
                <th>Bahan</th>
                <th>Finishing</th>
                <th>Qty</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data_detail = mysqli_fetch_assoc($item)) {
                $totalharga += $data_detail['harga']; ?>
                <tr>
                    <td>
                        <?php echo $data_detail['produk_name'] ?>
                    </td>
                    <td>
                        <?php echo $data_detail['ukuran'] ?>
                    </td>
                    <td>
                        <?php echo $data_detail['bahan'] ?>
                    </td>
                    <td>
                        <?php echo $data_detail['finishing'] ?>
                    </td>
                    <td>
                        <?php echo $data_detail['qty'] ?>
                    </td>
                    <td align="right">
                        <?php echo 'Rp ' . number_format($data_detail['harga']) ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td style="background-color: gray; color:white;"><b>Total</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">Rp. <?php echo number_format($data_order['total_price']) ?></td>
            </tr>
        </tfoot>
    </table>
    <br>
</div>
<?php
// $html = ob_get_clean();

// require __DIR__ . '../../vendor/autoload.php';

// use Spipu\Html2Pdf\Html2Pdf;

// $html2pdf = new Html2Pdf('P', 'A4', 'en');
// $html2pdf->writeHTML($html);
// $html2pdf->output('Invoice_Pemesanan.pdf', 'D');

?>