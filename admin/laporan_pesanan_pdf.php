<?php
require('../connect/conn.php');
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
    <table id="example1" class="table table-bordered table-striped" align="center">
        <thead>
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