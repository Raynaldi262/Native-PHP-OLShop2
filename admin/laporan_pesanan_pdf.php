<?php
require('../connect/conn.php');

$sql = "SELECT admin_name from tbl_admin where admin_id = " . $_GET['user'] . "";
$user = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($user);

if ($_GET['start'] == null) {
    $sql = "SELECT min(create_date) as a, max(create_date) as b FROM tbl_order";
    $getdate = mysqli_query($conn, $sql);
    $date = mysqli_fetch_assoc($getdate);

    $getStart = date("d-m-Y", strtotime($date['a']));
    $getEnd = date("d-m-Y", strtotime($date['b']));
} else {
    $getStart = date("d-m-Y", strtotime($_GET['start']));
    $getEnd = date("d-m-Y", strtotime($_GET['end']));
}

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
    }

    td {
        font-size: 12px;
    }

    th {
        text-align: center;
        background-color: gray;
        padding: 4px;
        color: white;
        font-size: 12px;
    }
</style>
<div style="text-align:center">
    <!-- <img width="100" src="images/home/logo.png"/> -->
    <table id="example1" class="table table-bordered table-striped" align="center" style=" border-bottom-style: none; border-right-style: none; border-left-style: none;">
        <thead>
            <tr>
                <td style="border:none;">
                    <img width="100" src="../dist/img/logo.jpg" />
                </td style="border:none;">
                <td colspan="4" align="center" style="font-size: 20px;" style="border:none;">
                    <h4>Laporan Pesanan</h4>
                    <h4><?php echo 'Periode ' . $getStart . ' s/d ' . $getEnd ?></h4>
                </td>
            </tr>
            <tr align="center">
                <th>No</th>
                <th>Kode</th>
                <th>Nama Customer</th>
                <th>No Invoice</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php $i = 1;
            if ($_GET['start'] != null) {
                $start = $_GET['start'];
                $end = $_GET['end'];

                // ini buat isi tabel pesanan
                $sql = "select * from tbl_order a
                        join (select cust_id, cust_name from tbl_customer )b on a.cust_id = b.cust_id
                        where create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59'";
                $getPesanan = mysqli_query($conn, $sql);

                // ini buat itung omset
                $sql2 = "Select sum(total_price) total from tbl_order
                         where create_date >= '" . $start . " 00:00:00' and create_date <= '" . $end . " 23:59:59'";
                $getTotal = mysqli_query($conn, $sql2);
                $total = mysqli_fetch_assoc($getTotal);
            } else {
                // ini buat isi tabel pesanan
                $sql = "select * from tbl_order a
                        join (select cust_id, cust_name from tbl_customer )b on a.cust_id = b.cust_id";

                $getPesanan = mysqli_query($conn, $sql);

                // ini buat itung omset
                $sql2 = "Select sum(total_price) total from tbl_order";
                $getTotal = mysqli_query($conn, $sql2);
                $total = mysqli_fetch_assoc($getTotal);
            }
            while ($data = mysqli_fetch_array($getPesanan)) { ?>
                <tr align="center">
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['status_id']; ?></td>
                    <td><?php echo $data['cust_name']; ?></td>
                    <td>
                        <?php echo $data['invoice']; ?>
                    </td>
                    <td align="right"><?php echo 'Rp ' . number_format($data['total_price']); ?></td>
                </tr>
            <?php $i++;
            } ?>
        </tbody>

        <tfoot>
            <tr align="center">
                <th></th>
                <th>Total Omset:</th>
                <th></th>
                <th></th>
                <th align="center"><?php echo 'Rp ' . number_format($total['total']); ?></th>
            </tr>

            <tr>
                <td style="border:none;" >&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;" colspan="4"></td>
                <td style="border:none;" align="center">Dibuat Oleh</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;" colspan="4"></td>
                <td style="border:none;" align="center"><?php echo $user['admin_name'] ?></td>
            </tr>
        </tfoot>
    </table>
    <br>
</div>
<?php
$html = ob_get_clean();


require __DIR__ . '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'en');
$html2pdf->writeHTML($html);
$html2pdf->output('laporan_stok.pdf', 'D');
?>